<?php
include("dbconn.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$x=mysqli_query($conn,"select * from admin where aid='$aid'");
$y=mysqli_fetch_array($x);
$name=$y['name'];

?>
<!doctype html>
<html><!-- İ. Mert İnan 250201038-->
	<head>
		<meta charset="utf-8">
		<title>Hospital Feedback System</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
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
			<span class="SubHead">Welcome Admin Panel</span>
			<br>
			<br>
			<a href="feeds.php" class="button">Feedback</a>
			<a href="manageFaculty.php" class="button">Manage Faculty</a>
			<a href="changePass.php" class="button">Change Password</a>
			<br>
			<br>
			<br>
			<br>
			<a href="logout.php" class="button" style="color: rebeccapurple;">Logout</a>
			<br>
			<br>

		</div>
	</body>
</html>