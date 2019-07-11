<?php
require 'dbconfi/config.php';
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Registation Page</title>
	<link rel="stylesheet" href="css/style.css">
	
	<script type="text/javascript">
		function PreviewImage(){
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById("imglink").files[0]);
			
			oFReader.onload = function (oFREvent) {
				document.getElementById("uploadPreview").src = oFREvent.target.result;
			};
		};
		
	</script>
</head>
	<body style="background-color:#9370DB">
		<form class="myform" action="register.php" method="post" enctype="multipart/form-data">
		<div id="main-wrapper">
			<center>
			<h2>Registation Form</h2>
			<img id ="uploadPreview" src="imgs/images.png" class="avatar"/></br></br>
			<input type="file" id= "imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>
			</center>
		
		
			<label><b>Full Name:</b></label></br>
			<input name="fullname" type="text" class="inputvalues" placeholder="Ender Full Name" required/></br>
			<label><b>Gender: </b></label>
			<input type="radio" class="radiobtns" name="gender" value="Male" checked required/> Male
			<input type="radio" class="radiobtns" name="gender" value="Female" required/> Female</br>
			<label><b>Qualification: </b></label>
			<select class="qualification" name="qualification">
				<option value="BSC"> BSC</option>
				<option value="BA"> BA</option>
				<option value="BBA"> BBA</option>
				<option value="MSC"> MSC</option>
				<option value="MA"> MA</option>
				<option value="MBA"> MBA</option>
			</select></br>
			<label><b>Username:</b></label></br>
			<input name="username" type="text" class="inputvalues" placeholder="Ender Username" required/></br>
			<label><b>Password:</b></label></br>
			<input name="password" type="password" class="inputvalues" placeholder="Ender Password" required/></br>
			<label><b>Confirm Password:</b></label></br>
			<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm Password"required/></br>
			<input name="submit_btn" type="submit" id="signup-btn" value="Sign Up"/></br>
			<a href="index.php"><input type="button" id="back-btn" value="<<Back to Login"/></br>
		</form>
		<?php
			if(isset($_POST['submit_btn']))
			{
				$fullname = $_POST['fullname'];
				$gender = $_POST['gender'];
				$qualification = $_POST['qualification'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				
				$img_name = $_FILES['imglink']['name'];
				$img_size = $_FILES['imglink']['size'];
				$img_tmp = $_FILES['imglink']['tmp_name'];
				
				$directory ='uploads/';
				$target_file = $directory.$img_name;
				if($password==$cpassword)
				{
					$query ="select * from user WHERE username='$username' AND password = '$password'";
				
					$query_run = mysqli_query($con,$query);
					if(mysqli_num_rows($query_run)>0)
					{
						echo '<script type="text/javascript"> alert("User already exists... try another username")</script>';
					}
					else if(file_exists($target_file))
					{
							echo '<script type="text/javascript"> alert("Image file already exists... try another image file")</script>';
					}
					else if($img_size>2097152)
					{
						echo '<script type="text/javascript"> alert("Image file size larger than 2 MB... try another image file")</script>';
					}
					else
					{
						move_uploaded_file($img_tmp,$target_file);
						$query = "insert into user values('','$username','$fullname','$gender','$qualification','$password','$target_file')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User Registered... Go to login page to login")</script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!")</script>';	
						}
					}
				}
				else
				{
					echo '<script type="text/javascript"> alert("Password and Confirm Password does not match")</script>';
				}
			}
			?>
				</div> 
	</body>	
</html>
