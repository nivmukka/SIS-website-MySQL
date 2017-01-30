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

<?php

$state = $_POST['state'];

$query7 = "select username, first_name, last_name, status, dept, city, zip_code from student where state = '$state' ";

$result7 = mysql_query($query7);
$num7 = mysql_num_rows($result7);

if(mysql_affected_rows() > 0){
	echo "<h3>List of students in" . " " . $state . " state:</h3>";
?>
<table border = "1" cellspacing="4" cellpadding="10">
<tr>
<td><font face="Arial, Helvetica, sans-serif"><b>Username</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Name</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Status</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Department</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>City</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Zip Code</b></font></td>
</tr>
<?php
$i = 0;
while($i < $num7){
	$username = mysql_result($result7, $i, "username"); 
	$first_name = mysql_result($result7, $i, "first_name");
	$last_name = mysql_result($result7, $i, "last_name");
	$status = mysql_result($result7, $i, "status");
	$dept = mysql_result($result7, $i, "dept");
	$city = mysql_result($result7, $i, "city");	
	$zip_code = mysql_result($result7, $i, "zip_code");
?>
	<tr>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $username; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo "$first_name $last_name"; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $status; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $dept; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $city; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $zip_code; ?></font></td>
	</tr>
<?php $i++; } ?>
<?php mysql_close();?>
</table>
<br/>
<br/>
<a href="state_search.html">Go back to previous page</a><br/>
<a href="homepage.html">Go back to homepage</a>

<?php 
}
else{
	echo "<br/>";
	echo "<b>Error has occured due to one of the following reasons:</b><br/>1. You did not choose a state. Please choose a state from the drop down list.<br/>2. There are no students from the choosen state.<br/><br/>";
	echo "<a href='state_search.html'>Go back to previous page</a></br>";
	echo "<a href='homepage.html'>Go back to homepage</a>";
}
?>
<br/>
<br/>
</body>
</center>
</html>