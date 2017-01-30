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

// collecting posted value from html form
$city = $_POST['city'];

// writing query to get data using city name
$query6 = "select username, first_name, last_name, status, zip_code from student where city = '$city'";

// executing above query and storing result in variable
$result6 = mysql_query($query6);
$num6 = mysql_num_rows($result6);

// checking if any rows affected to display
if(mysql_affected_rows() > 0){
	echo "<h3>List of students from" . " " . "<i>$city</i>" . " " . ": </h3>";
//echo "<b>Database output</b><br/><br/>";
?>
<table border = "1" cellspacing="4" cellpadding="10">
<tr>
<td><font face="Arial, Helvetica, sans-serif"><b>Username</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Name</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Status</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Zip Code</b></font></td>
</tr>
<?php
$i = 0;
while($i < $num6){
	$username = mysql_result($result6, $i, "username"); 
	$first_name = mysql_result($result6, $i, "first_name");
	$last_name = mysql_result($result6, $i, "last_name");
	$status = mysql_result($result6, $i, "status");
	$zip_code = mysql_result($result6, $i, "zip_code");
?>
	<tr>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $username; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo "$first_name $last_name"; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $status; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $zip_code; ?></font></td>
	</tr>
<?php $i++; }?>
<?php mysql_close();?>
</table>
<br/>
<br/>
<br/>
<a href="city_search.html">Go back to previous page</a><br/>
<a href="homepage.html">Go back to homepage</a>
<?php
}
//if no rows are affected display error message
else{
	echo "<br/>";
	echo "<b>Error has occured due to one of the following reasons:</b><br/>1. You did not enter a name. Please enter a valid city name in the field.<br/>2. There are no students from the city " ."<i>$city</i>".".<br/><br/>";
	echo "<a href='city_search.html'>Go back to previous page</a></br>";
	echo "<a href='homepage.html'>Go back to homepage</a>";
}

?>

</body>
</center>
</html>