<?php
include("dbconn.php");
include("file_write_log.php");
session_start();
if(isset($_SESSION['email']))
{
	header("location:feedback.php");
}
if(!empty($_POST))
{
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$pass=mysqli_real_escape_string($conn,$_POST['pass']);
	$sql=mysqli_query($conn,"select * from userinfo where email='$email' and password='$pass'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['email']=$_POST['email'];
		header("location:feedback.php");
		write_log("Login success for $email");
	}
	else
	{
		?>
        <script type="text/javascript">
		alert("Incorrect E-mail or Password");
		</script>
      <?php
      write_log("Incorrect E-mail or Password");
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
		<span class="SubHead">Patient Login</span>
		<form method="post" action="" >
		<div id="table">
			<div class="tr">
				<div class="td">
		        	<label>E-mail: </label>
		        </div>
		        <div class="td">
					<input type="text" name="email" size="25" required/>
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
		<span class="SubHead" style="font-weight:120;">You don't have an account <a href="newReg.php" class="link">Sign Up Now</a></span>
		<br>
		<span class="SubHead" style="font-weight:120;">For Admin Login <a href="index.php" class="link">Click Here</a></span>

		</center>
	</body>
</html>