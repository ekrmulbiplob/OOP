<!DOCTYPE html>
<html>
	<head>
		<title>Add</title>
<style>
body{
	background:skyblue;
	
}
table{
	margin-left: 80px;
}
select{
	width:  100px;
	height: 33px;
	font-size: 18px;
	margin-left: -170px;
	border-radius: 5px;
}
label{
	font-size: 22px;
	font-famil: Arial;
	color:white;
	text-align: center;
	margin-bottom: 10px;
}
.container{
	width: 550px;
	height: 500px;
	margin-top: 150px;
	margin-left: 320px;
	background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
	background:-webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%);
	border-radius: 15px;
	text-align: center;
}

input[type="text"],input[type="email"]{
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
</head>

	<body>
	<div class ="container">
		<div class ="form.input">
		<form method = "post" action ="">
		</br></br></br>\<table>
		<tr>
		<td>
		<label>First Name:</label>
		</td>
		<td>
		<input name= "firstname"type="text" />
		</td>
		</tr>
		<tr>
		<td>
		<label>Last Name:</label>
		</td>
		<td>
		<input name= "lastname"type="text" />
		</td>
		</tr>
		<tr>
		<td>
		<label>Mobile:</label>
		</td>
		<td>
		<input name= "mobile"type="text" />
		</td>
		</tr>
		<tr>
		<td>
		<label>Email:</label>
		</td>
		<td>
		<input name= "email"type="email" />
		</td>
		</tr>
		<tr>
		<td>
		<label>Adress:</label>
		</td>
		<td>
		<input name= "adress"type="text" />
		</td>
		</tr>
		<tr>
		<td>
		<label>Catagory:</label>
		</td>
		<td>
		<select name ="catagory">
						<option value="Home">Home</option>
						<option value="Friend">Friend</option>
						<option value="Office">Office</option>
						<option value="Family">Family</option>
						<option value="Emergency">Emergency</option>
					</select>
		</td>
		</tr>
		</table>
		<input type= "submit" name = "submit" value ="Save" />
		</form>
		</div>
	</div>
	</body>
</html>
<?php
$con = mysqli_connect("localhost", "root", "");
if(!$con){
	die("Connection Failed".mysqli_error());
}
$db = mysqli_select_db($con,"adressbook");
if(!$db){
	die("Database Not Connected".mysqli_error());
}
if(isset($_POST['submit'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$adress = $_POST['adress'];
	$catagory = $_POST['catagory'];
	
	$query = "INSERT INTO `adress`(`firstname`, `lastname`, `mobile`, `email`, `adress`, `catagory`) VALUES ('$firstname','$lastname','$mobile','$email','$adress','$catagory')";
	$result = mysqli_query($con,$query);
	if($result ==1){
		echo '<script type="text/javascript"> alert("Value Saved...")</script>';
		header('location:main.php');
	}
	else
	{
		echo '<script type="text/javascript"> alert("Error!")</script>';
	}
}
?>