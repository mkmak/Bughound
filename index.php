<!DOCTYPE html>

<?php 
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
	  $con = mysqli_connect("localhost","root");
	  mysqli_select_db($con, "bughound");
	  
      $myusername = mysqli_real_escape_string($con,$_POST['username']);
      $mypassword = mysqli_real_escape_string($con,$_POST['password']); 
	  
      $query = "SELECT * FROM employees WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_row($result);
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
	
      if($count == 1) {
		 $userlevel = $row[4];
		 $name = $row[1];
		 
		 if($userlevel == 3) {
			 $_SESSION['user'] = $myusername;
			 $_SESSION['userlevel'] = $userlevel;
			 $_SESSION['name'] = $name;
			 header("location: db-menu.php");
		 }
		else {
			$error ="Access restricted to level 3 users.";
		}  
      }else {
         $error = "Your login or password is incorrect.";
      }
   }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Bughound - Login Page</title>
		<link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
	<div class="login-content">
		<h2 class="title">Bughound Login</h2>
		<br>
		<form class="login-form" action="" method="POST">
			<input type="text" name="username" placeholder="username" />
			<input type="password" name="password" placeholder="password" />
			<button type="submit" class="btn">Login</button>
			<p style="color:#FF3361;"><?php 
					if(!empty($error))
						echo $error;
				?>
			</p>
		</form>
	</div>
  
    </body>
</html>
