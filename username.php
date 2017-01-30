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
<?php include 'database.php'; ?>
<br/>
<br/>
<br/>
<?php

$username = $_POST['username'];

$query17 = "select username, first_name, last_name, dept, status from student where username = '$username' ";

$result17 = mysql_query($query17);
$num17 = mysql_num_rows($result17);

if (mysql_affected_rows() > 0){
	echo "<h3>The student (username " . "<i>$username</i>" . ") has the following details:</h3><br/>";
//echo "<b>Database output</b><br/><br/>";
?>
<table border="1" cellspacing="4" cellpadding="10">
<tr>
<td><font face="Arial, Helvetica, sans-serif"><b>Username<b/></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Name</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Department</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Status<b/></font></td>
</tr>
<?php
$i = 0;
while($i < $num17){
	$username = mysql_result($result17, $i, "username");
	$first_name = mysql_result($result17, $i, "first_name"); 
	$last_name = mysql_result($result17, $i, "last_name");
	$dept = mysql_result($result17, $i, "dept");
	$status = mysql_result($result17, $i, "status");
?>
	<tr>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $username; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo "$first_name $last_name"; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $dept; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $status; ?></font></td>
	</tr>
</table>
<?php $i++;}?>
<?php mysql_close(); ?>

<br/>
<br/>
<br/>
<a href="username_search.html">Go back to previous page</a><br/>
<a href="homepage.html">Go back to homepage</a>
<?php
}
else{
	echo "<h3>This username does not exist in SIS. Please enter a valid username.</h3>";
	echo "<a href='username_search.html'>Go back to previous page</a></br>";
	echo "<a href='homepage.html'>Go back to homepage</a>";
}
?>

</body>
</center>
</html>