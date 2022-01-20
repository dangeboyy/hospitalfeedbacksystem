<?php
include("dbconn.php");
session_start();
if(!isset($_SESSION['email']))
{
    header("location:user.php");
}
$email=$_SESSION['email'];
$x=mysqli_query($conn,"select * from userinfo where email='$email'");
$y=mysqli_fetch_array($x);
$photo=$y['image'];

?>
<!doctype html>
<html><!-- İ. Mert İnan 250201038 -->
    <head>
        <meta charset="utf-8">
        <title>Hospital Feedback System</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="topHeader">
            <span class="tag">HOSPITAL FEEDBACK SYSTEM</span>
        </div>
       
        <img src="uploaded_images/<?=$photo?>" alt="Your profile photo" width=300>

        <div id="content" align="center">
            

            <br>
            <br>
            <span class="SubHead">Hospital Feedback Step I</span>
            <form method="post" action="feedback_step_2.php" >
            <div id="table">
            <div class="tr">

        		<div class="td">
                	<label>Roll No : </label>
                </div>
                <div class="td">
        			<select name="roll" required>
                    <option value="NA" disabled> - - Select Roll No. - -</option>
                    <?php
        			for($x=1;$x<=200;$x++)
        			{
        				?>
                        <option value="<?php echo $x;?>"><?php echo $x;?></option>
                    <?php } ?>
                    </select>
                </div>
            </div>
        </div>	
                <div class="tdd">
                	<input type="button" onClick="window.location='index.php'" value="BACK">&nbsp;&nbsp;&nbsp;&nbsp;

                    <input type="submit" value="NEXT" />&nbsp;&nbsp;&nbsp;&nbsp;

                    <input type="button" onClick="window.location='logout.php'" value="Log out">
                </div>
            
            <br>
        </div>
        </form>
        <br>

    </body>
</html>