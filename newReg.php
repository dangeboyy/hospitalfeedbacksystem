<?php
include("dbconn.php");
include("file_write_log.php");
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['pass'];

$img_name=$_FILES['upload_img']['name'];
$img_size=$_FILES['upload_img']['size'];
$tmp_dir=$_FILES['upload_img']['tmp_name'];
$error=$_FILES['upload_img']['error'];
$img_extension=pathinfo($img_name, PATHINFO_EXTENSION);//image uzantısını döndürür
$img_extension_lc=strtolower($img_extension);
$allowed_exs=array("jpeg","png","jpg",".jfif");

if($name!=NULL && $email!=NULL && $password!=NULL)
{	

	if(in_array($img_extension_lc, $allowed_exs)){
		$img_name=uniqid("IMG-",true).".".$img_extension_lc;
		$uploaded_path='uploaded_images/'.$img_name;
		move_uploaded_file($tmp_dir, $uploaded_path);
		$sql=mysqli_query($conn, "INSERT INTO userinfo(name,email,password,image) VALUES('$name','$email','$password','$img_name')");
		if($sql)
		{
			$info="Successfully Registered. Please go to Login page to enter the system by clicking the Home button";
			write_log("Register success for $email with photo");
		}
		else
		{	
			$info="Email Already Exists";
			write_log("Email Already Exists for $email");
		}
	}elseif ($img_name==NULL) {
		$sql=mysqli_query($conn, "INSERT INTO userinfo(name,email,password) VALUES('$name','$email','$password')");
		if($sql)
		{
			$info="Successfully Registered. Please go to Login page to enter the system by clicking the Home button";
			write_log("Register success for $email without Photo");
		}
		else
		{	
			$info="Email Already Exists";
			write_log("Email Already Exists for $email");
		}
	}
	else{

		$info = "Only .jpg , .png .jpeg allowed";
		write_log("Extension Error while uploading photo");
	}
}
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Hospital Feedback System</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
	</head>

	<body>
		<div id="topHeader">
		    <span class="tag">HOSPITAL FEEDBACK SYSTEM</span>
		</div>
		<br>
		<br>
		<br>
		<br>

		<div id="content" align="center">
		<br>
		<br>
		<span class="SubHead">Sign Up</span>

		<form method="post" action="" enctype="multipart/form-data">
		<table border="0" align="center" cellpadding="5" cellspacing="5" class="design">
		<tr><td colspan="2" class="info" align="center"><?php echo $info;?></td></tr>
		<tr><td class="labels">Name : </td><td><input type="text" size="25" name="name" class="fields" placeholder="Enter Full Name" required="required" autocomplete="off" /></td></tr>
		<tr><td class="labels">Email : </td><td><input type="text" size="25" name="email" class="fields" placeholder="Enter Email" required="required" autocomplete="off" /></td></tr>
		<tr><td class="labels">Password : </td><td><input type="password" size="25" name="pass" class="fields" placeholder="Enter Password" required="required" /></td></tr>
		<tr><td class="labels">Upload File (Optional) : </td><td><input type="file" name="upload_img" class="fields" /></td></tr>
		<tr><td colspan="2" align="center"><input type="submit" value="Register" class="fields" /></td></tr>
		</table>
		</form>
		<br />
		
		<a href="user.php" class="link">HOME</a>
		</div>
	</body>
	<!-- 
	İ. Mert İnan 250201038
	-->
</html>