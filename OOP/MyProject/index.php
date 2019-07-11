<?php
session_start();
require 'dbconfi/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="css/style.css">
</head>
	<body style="background-color:#9370DB">
		<div id="main-wrapper">
			<center>
			<h2>Login Form</h2>
			<img src="imgs/images.png" class="avatar"/>
			</center>
		
		<form class="myform" action="index.php" method="post">
			<label><b>Username:</b></label></br>
			<input name= "username"type="text" class="inputvalues" placeholder="Ender Username"/></br>
			<label><b>Password:</b></label></br>
			<input name="password" type="password" class="inputvalues" placeholder="Ender Password"/></br>
			<input name="login" type="submit" id="login-btn" value="Login"/></br>
			<a href="register.php"><input type="button" id="register-btn" value="Register"/></br>
		</form>
		<?php
			if(isset($_POST['login']))
			{
				$username = $_POST['username'];
				$password = $_POST['password'];
				
				$query ="select * from user WHERE username='$username' AND password = '$password'";
				
				$query_run = mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					//valid
					$row = mysqli_fetch_assoc($query_run);
					$_SESSION['imglink']=$row['imglink'];
					$_SESSION['fullname']=$row['fullname'];
					$_SESSION['gender']=$row['gender'];
					$_SESSION['qualification']=$row['quallification'];
					header('location:home.php');
				}
				else
				{
					//invalid
					echo '<script type="text/javascript"> alert("Invalid credentials")</script>';
				}
			}
		?>
		</div>
	</body>	
</html>
