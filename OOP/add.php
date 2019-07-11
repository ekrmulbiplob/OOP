<?php
  $con = mysqli_connect("localhost", "root", "");
if(!$con){
	die("Connection Failed".mysqli_error());
}
$db = mysqli_select_db($con,"ears");
if(!$db){
	die("Database Not Connected".mysqli_error());
}
    $chairman = $_GET['chairman'];
	$members = $_GET['members'];
	$sdate = $_GET['sdate'];
	$edate = $_GET['edate'];
		
	$query = "INSERT INTO `committee`(`chairman`, `members`, `sdate`, `edate`) VALUES ('$chairman','$members','$sdate','$edate')";
	$result = mysqli_query($con,$query);
	if($result ==1){
		echo '<script type="text/javascript"> alert("Value Saved...")</script>';
		header('location:home.php');
	}
	else
	{
		echo '<script type="text/javascript"> alert("Error!")</script>';
	}

?>