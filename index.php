<?php
include("dbconn.php");
include("file_write_log.php");
session_start();
if(isset($_SESSION['aid']))
{
	header("location:home.php");
}
if(!empty($_POST))
{
	$aid=mysqli_real_escape_string($conn,$_POST['aid']);
	$pass=mysqli_real_escape_string($conn,$_POST['pass']);
	$sql=mysqli_query($conn,"select * from admin where aid='$aid' and password='$pass'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['aid']=$_POST['aid'];
		write_log("Admin login success");
		header("location:home.php");
	}
	else
	{
		?>
        <script type="text/javascript">
		alert("Incorrect Admin ID or Password");
		</script>
      <?php
         write_log("Incorrect admin ID or Password");
	}
}
?>
<!doctype html>
<html><!-- İ. Mert İnan 250201038 -->
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
		<span class="SubHead">Admin Login</span>
		<form method="post" action="" >
		<div id="table">
			<div class="tr">
				<div class="td">
		        	<label>Admin Username : </label>
		        </div>
		        <div class="td">
					<input type="text" name="aid" size="25" required />
		        </div>
		    </div>
		    <div class="tr">
				<div class="td">
		        	<label>Password : </label>
		        </div>
		        <div class="td">
					<input type="password" name="pass" size="25" required />
		        </div>
		    </div>
		</div>
				
		        <div class="tdd">
		        	<input type="submit" value="Login" />
		        </div>
		    
		    <br>
		</div>
		</form>
		<br>

		<center>
		<span class="SubHead" style="font-weight:120;">For Patient Login <a href="user.php" class="link">Click Here</a></span>
		</center>
	</body>
</html>