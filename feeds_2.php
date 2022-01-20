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

if(!empty($_POST))
{
	$faculty_id=$_POST['faculty_id'];
	//Fetch Name
	$name = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM faculty WHERE faculty_id='".$faculty_id."'"));
	$subject=$_POST['subject'];
	$sql=mysqli_query($conn,"select * from feeds where faculty_id='$faculty_id' AND subject='$subject'");
	while($z=mysqli_fetch_array($sql))
	{
		$q1 = $q1 + $z['q1'];
		$q2 = $q2 + $z['q2'];
		$q3 = $q3 + $z['q3'];
		$q4 = $q4 + $z['q4'];
		$q5 = $q5 + $z['q5'];
		$q6 = $q6 + $z['q6'];
		$q7 = $q7 + $z['q7'];
		$q8 = $q8 + $z['q8'];
		$q9 = $q9 + $z['q9'];
		$q10 = $q10 + $z['q10'];
		$total = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10;
		$s++;
		
	}
}
?>
<!doctype html>
<html><!--İ. Mert İnan 250201038 -->
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

<div id="content" align="center" style="width:600px;">
<br>
<br>
<span class="SubHead">Patient Feedback</span>
<br>
<br>

<table border="0" cellpadding="4" cellspacing="4">
<tr><td style="font-weight:bold;">Faculty Name : </td><td><?php echo $name['name'];?></td></tr>
<tr><td style="font-weight:bold;">Doctor : </td><td><?php echo $subject;?></td></tr>
<tr><td style="font-weight:bold;">1. I had no difficulty in reaching the hospital :</td><td><?php echo $q1;?></td></tr>
<tr><td style="font-weight:bold;">2. I could easily reach the units I needed to reach within the hospital : </td><td><?php echo $q2;?></td></tr>
<tr><td style="font-weight:bold;">3. I chose the doctor I would examine myself : </td><td><?php echo $q3;?></td></tr>
<tr><td style="font-weight:bold;">4. The time I waited to be examined was appropriate : </td><td><?php echo $q4;?></td></tr>
<tr><td style="font-weight:bold;">5. The time my doctor allocated for me was enough : </td><td><?php echo $q5;?></td></tr>
<tr><td style="font-weight:bold;">6. Sufficient information was given by my doctor about my disease and treatment : </td><td><?php echo $q6;?></td></tr>
<tr><td style="font-weight:bold;">7. During the examination and examinations, my personal privacy was taken care of : </td><td><?php echo $q7;?></td></tr>
<tr><td style="font-weight:bold;">8. The hospital was generally clean : </td><td><?php echo $q8;?></td></tr>
<tr><td style="font-weight:bold;">9. I can easily get service from this hospital without needing anyone's help : </td><td><?php echo $q9;?></td></tr>
<tr><td style="font-weight:bold;">10. Overall rating : </td><td><?php echo $q10;?></td></tr>
<tr><td style="font-weight:bold;">Total Patients :</td><td><?php echo $s;?></td></tr>
<tr><td style="font-weight:bold;">Total :</td><td><?php echo $total;?></td></tr>

</table>
<br>
<br>
<input type="button" onClick="window.print();" value="PRINT">&nbsp;<input type="button" onClick="window.location='feeds.php'" value="BACK">
<br>
<br>

</div>
</body>
</html>