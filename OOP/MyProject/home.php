<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" href="css/style.css">
</head>
	<body style="background-color:#9370DB">
		<div id="main-wrapper">
			<center>
			<h2>Home Page</h2></br>
			<?php echo '<img class = "avatar" src ="'.$_SESSION["imglink"].'">'; ?></br></br>
			<label><b>Name: </b></label>
			<?php echo $_SESSION['fullname'] ?></br>
			<label><b>Gender: </b></label>
			<?php echo $_SESSION['gender'] ?></br>
			<label><b>Qualification: </b></label>
			<?php echo $_SESSION['qualification'] ?></br>
			</center>
		
			<form class="myform" action="home.php" method="post">
			<input name= "logout"type="submit" id="logout-btn" value="Log Out"/></br>
		</form>
		<?php
			if(isset($_POST['logout']))
			{
			session_destroy();
			header('location:index.php');
			}
			?>
		</div>
	</body>	
</html>
