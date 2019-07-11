<?php
session_start();

  $con = mysqli_connect("localhost", "root", "");
if(!$con){
	die("Connection Failed".mysqli_error());
}
$db = mysqli_select_db($con,"ears");
if(!$db){
	die("Database Not Connected".mysqli_error());
}
	$search = 'Biplob';
		
	$query = "SELECT * from `committee` WHERE chairman =$search";
	$query_run = mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					//valid
					$row = mysqli_fetch_assoc($query_run);
					$_SESSION['chairman']=$row['chairman'];
					$_SESSION['members']=$row['members'];
					$_SESSION['sdate']=$row['sdate'];
					$_SESSION['edate']=$row['edate'];
					header('location:show_committee.php');
				}
				else
				{
					//invalid
					echo '<script type="text/javascript"> alert("Invalid credentials")</script>';
				}

?>