<?php
include("dbconn.php");
$id=$_GET['del'];
mysqli_query($conn,"delete from faculty where id='$id'");
?>
<script type="text/javascript">
	alert("Successfully deleted");
	window.location='manageFaculty.php';
</script>
