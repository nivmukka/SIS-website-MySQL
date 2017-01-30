<!DOCTYPE html>
<html lang = "en">
<center>
<body bgcolor="#f4d6a0">
<style type="text/css">
table
	{
		font-family: Calibri;
		color: black;
		font-size: 12pt;
		font-style: normal;
		background-color: #eff3f6;
		border: 2px solid black
	}
	table.inner{border: 0px}
	
</style>
<style type="text/css">
table
	{
		font-family: Calibri;
		color: black;
		font-size: 15pt;
		font-style: normal;
		background-color: #eff3f6;
		border: 2px solid black
	}
	table.inner{border: 0px}
</style>
<?php include 'database.php'; ?>

<?php

$uid = $_POST['uid'];	
$query8 = "SELECT username, first_name, last_name, status, dept FROM student where uid = '$uid' ";

$result8 = mysql_query($query8);
$num8 = mysql_num_rows($result8);
if(mysql_affected_rows()>0)
{
echo "<h3>The student (<i>University ID: " .$uid. "</i>) with the following information will be PERMANENTLY deleted from the SIS database.</h3>";
?>
<table border = "1" cellspacing="4" cellpadding="10">
<tr>
<td><font face="Arial, Helvetica, sans-serif"><b>Username</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Name</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Status</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Department</b></font></td>
</tr>

<?php
$i = 0;
while($i < $num8)
{
	$username = mysql_result($result8, $i, "username");
	$first_name = mysql_result($result8, $i, "first_name");
	$last_name = mysql_result($result8, $i, "last_name");
	$status = mysql_result($result8, $i, "status");
	$dept = mysql_result($result8, $i, "dept");
?>
<tr>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $username; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo "$first_name $last_name"; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $status; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $dept; ?></font></td>
</tr>
<?php $i++; }?>
<?php mysql_close(); ?>
</table>
<br/>
<br/>
<br/>
<form action = "student_delete.php" method = "POST" >
<table cellpadding = "10">
<tr>
<td>Re-enter University ID:</td>
<td><input type="text" name="uid" maxlength="10"/></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type = "submit" value = "Confirm delete" tabindex = "4"></td></tr>
</table>
</form>
<br/>

<button onclick="window.location.href='delete.html'">Cancel</button>

<br/>
<br/>
<br/>
<a href="homepage.html">Go back to homepage</a>
<?php	
}
else{
	echo "<br/>";
	echo "<h3>Please enter a valid University ID. This UID does not exist in SIS.</h3>";
	echo "<a href='delete.html'>Go back to previous page</a><br/>";
	echo "<a href='homepage.html'>Go back to homepage</a><br/>";
}
?>


</body>
</center>
</html>