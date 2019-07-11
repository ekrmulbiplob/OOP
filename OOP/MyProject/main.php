<?php
	if(isset($_POST['search'])){
		$search1 = $_POST['search1'];
		$query = "SELECT * FROM `adress` WHERE CONCAT (firstname,mobile,adress,catagory) LIKE '%".$search1."%'";

	}
else
{
	$query = "Select * from adress";
	$search_result = filterTable($query);
}
function filterTable($query)
{
	$connect = mysqli_connect("localhost", "root", "");
	$fresult = mysqli_select_db($connect,"adressbook");
	return $fresult;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel ="stylesheet" href ="style.css">
		<title>Adress Book</title>	
		
<style>
body{
	background:skyblue;
	
}
h2{
	font-size: 36px;
	font-famil: Arial;
	color:Black;
	text-align: center
}
.main{
	max-width: 700px;
	margin: auto;
	
}
input[type=text]{
	padding: 12px;
	width: 70%;
	border-collapse: collaspe;
	font-size: 18px;
	font-famil: Arial;
	border: 1px solid #3c3c3c;
	border-radius:5px; 0 0 5px;
	margin-left: -440px;
	margin-bottom: 10px;

	
}
input[type=button]{
	padding: 12px;
	width: 20%;
	border-collapse: collaspe;
	font-size: 18px;
	font-famil: Arial;
	border: 1px solid #3c3c3c;
	border-radius:5px; 0 0 5px;
	margin-bottom: 10px;
	background:orange;
	color:#fff;
	margin-left: -16px;

	
}
input[type=submit]{
	position: absolute;
	padding: 12px;
	width: 12%;
	border-collapse: collaspe;
	font-size: 18px;
	font-famil: Arial;
	text-shadow; 0 0 1px #000;
	cursor: pointer;
	color:#fff;
	background:orange;
	border: 1px solid #3c3c3c;
	margin-left: 290px;
}
table{
	width :1100px;
	margin:auto;
	text-align: center;
	table-layout: fixed;
}
table, tr{
	padding: 20px;
	color: white;
	border-collapse: collaspe;
	font-size: 18px;
	font-famil: Arial;
	background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
	background:-webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%); 
}
td,th{
	padding: 20px;
	color: white;
	text-align: center;
	border-collapse: collaspe;
	font-size: 17px;
	font-famil: Arial;
	background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
	background:-webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%); 
}
a{
	color:red;
}
td:hover{
	background:orange;
}

</style>
		
		
	</head>
	<body>
		<div class ="container">
			<br/><br/><br/>
			<h2> Adress Book <h2> <br/>
			<div class = "main">
				<input type = "text" name = "search1" placeholder = "Search...">
				<input type = "button" name = "search" value = "Search">
				<a href="add.php"><input type = "submit" name = "add" value = "Add"></a>
			</div>
		<table>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Mobile</th>
				<th>Email</th>
				<th>Adress</th>
				<th>Catagory</th>
				<th>Delete</th>
			</tr>
<?php
$connect = mysqli_connect("localhost", "root", "");
mysqli_select_db($connect,"adressbook");
$run = mysqli_query($connect,"Select * from adress");
while($row = mysqli_fetch_array($run)){
	$show_firstname = $row[0];
	$show_lasttname = $row[1];
	$show_mobile = $row[2];
	$show_email = $row[3];
	$show_adress = $row[4];
	$show_catagory = $row[5];
	
	echo "<tr>
			<td>$show_firstname</td>
			<td>$show_lasttname</td>
			<td>$show_mobile</td>
			<td>$show_email</td>
			<td>$show_adress</td>
			<td>$show_catagory</td>";
	echo "<td><a href= delete.php?m=".$row[2].">Delete</a></td>";
		echo "</tr>";
}
	?>		</table>
			</div>
		</div>
	</body>
</html>