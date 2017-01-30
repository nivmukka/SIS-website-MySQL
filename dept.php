<!DOCTYPE html>
<html lang = "en">
<center>
<body bgcolor="#f4d6a0">
<!-- css styling block -->
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
<!-- including file for database connection -->
<?php include 'database.php'; ?>

<?php

//collecting value from html form
$dept = $_POST['dept'];

//writing query to display results based on dept
$query5 = "select uid, username, first_name, last_name, status from student where dept= '$dept' ";

//executing above query and storing result in variable
$result5 = mysql_query($query5);
$num5 = mysql_num_rows($result5);

// checking if rows are affected to display results
if(mysql_affected_rows() > 0 ){
	echo "<h3>List of students in" . " " . "<i>$dept</i>" . " " . "department: </h3>";
//echo "<b>Database output</b><br/><br/>";
?>
<table border = "1" cellspacing="4" cellpadding="10">
<tr>
<td><font face="Arial, Helvetica, sans-serif"><b>University ID</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Username</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Name</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Status</b></font></td>
</tr>
<?php 
$i = 0;
while($i < $num5){
	$uid = mysql_result($result5, $i, "uid");
	$username = mysql_result($result5, $i, "username"); 
	$first_name = mysql_result($result5, $i, "first_name");
	$last_name = mysql_result($result5, $i, "last_name");
	$status = mysql_result($result5, $i, "status");
?>
	<tr>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $uid; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $username; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo "$first_name $last_name"; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $status; ?></font></td>
	</tr>
<?php $i++;} ?>
<?php mysql_close(); ?>
</table>
<br/>
<br/>
<a href="dept_search.html">Go back to previous page</a><br/>
<a href="homepage.html">Go back to homepage</a>
<?php
}
//displaying error message if error or no rows to display
else{
	echo "<br/>";
	echo "<b>Error has occured due to one of the following reasons:</b><br/>1. You did not choose a code. Please choose a department from the drop down list.<br/>2. There are no students in the choosen department.<br/><br/><br/>";
	echo "<a href='dept_search.html'>Go back to previous page</a></br>";
	echo "<a href='homepage.html'>Go back to homepage</a>";
}
?>
</body>
</center>
</html>