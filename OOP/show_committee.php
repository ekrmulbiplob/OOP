
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<title> HOME PAGE</title>
</head>
<style>
h2{
	font-size: 28px;
	font-famil: Arial;
	color:orange;
	text-align: center;
	padding-top:30px;
}

label{
	font-size: 20px;
	font-famil: Arial;
	color:white;
	text-align: center;
	margin-bottom: 10px;
}
.committee{
	width: 500px;
	height: 500px;
	margin-top: 50px;
	margin-left: 320px;
	background: rgba(15,15,88,0.7);
	border-radius: 15px;
	text-align: center;
}

input[type="text"],input[type="date"]{
	width:  220px;
	height: 33px;
	margin-bottom: 10px;
	font-size: 18px;
    border: 1px solid #000;
	padding-left: 45px;
	border-radius: 7px;
}

input[type="submit"]{
	width:  110px;
	height: 45px;
	margin-right:80px;
	margin-left:25px;
	margin-top: 25px;
	padding: 10px 15px;
	background: orange;
	font-size: 18px;
	color: #fff;
	border: none;
	margin-bottom: 20px;
	cursor: pointer;
	border-radius: 7px;
}
</style>
<body>
	
	<div class = "container">
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a>Faculty</a>
				<ul>
					<li><a>Add Faculty</a></li>
					<li><a>Show Faculty</a></li>
					<li><a>Delete Faculty</a></li>
				</ul>
				</li>
			<li><a>Application</a>
				<ul>
					<li><a>Add Account</a></li>
					<li><a>View Profile</a></li>
					<li><a>Delete Account</a></li>
				</ul>
				</li>
			<li><a>Committee</a>
				<ul>
					<li><a>Add Committee</a></li>
					<li><a>Search Committee</a></li>
					<li><a>Delete Committee</a></li>
				</ul>
				</li>
			<li><a href="contact.html">Contact</a></li>
			<li><a>About Us</a></li>
		</ul>
		<marquee>Welcome to Daffodil International School</marquee>
	
		</div>
<?php

  $con = mysqli_connect("localhost", "root", "");
if(!$con){
	die("Connection Failed".mysqli_error());
}
$db = mysqli_select_db($con,"ears");
if(!$db){
	die("Database Not Connected".mysqli_error());
}
	$search = $_GET['search1'];
		
	$query = "SELECT * from `committee` WHERE sdate ='$search' or edate ='$search'";
	$query_run = mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					//valid
					$row = mysqli_fetch_assoc($query_run);
					$_GET['chairman']=$row['chairman'];
					$_GET['members']=$row['members'];
					$_GET['sdate']=$row['sdate'];
					$_GET['edate']=$row['edate'];
					header('location:show_committee.php');
				}
				else
				{
					//invalid
					echo '<script type="text/javascript"> alert("Invalid credentials")</script>';
				}

?>
		    <div class = "committee">
			<h2>Committee Information</h2>
			<label><b>Chairman:</b></label>
			<?php echo $_GET['chairman'] ?></br>
			<label><b>Members:</b></label>
			<?php echo $_GET['members'] ?></br>
			<label><b>Staring Date:</b></label>
			<?php echo $_GET['sdate'] ?></br>
			<label><b>Ending Date:</b></label>
			<?php echo $_GET['edate'] ?></br>
			</div>

</body>
</html>	

