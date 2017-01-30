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
<?php include 'database.php'; ?>
<br/>
<br/>
<?php

//collecting value from html form
$uid = $_POST['uid'];
    
//writing query to display results using uid
$query2 = "SELECT * FROM student WHERE uid = '$uid' ";
    
// executing query and storing results in a variable
$result1 = mysql_query($query2);	
$num1 = mysql_num_rows($result1);

// checking to see if any rows are affected and displaying results
if(mysql_affected_rows() > 0){
	echo "<b>The student (University ID: " .$uid. ") has the following details:</b><br/><br/>";
?>
<br/>
<table border = "1" cellspacing="4" cellpadding="10">
<tr>
<td><font face="Arial, Helvetica, sans-serif"><b>University ID</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Username</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Name</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Status</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Department</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Gender</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Date of Birth</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Email Address</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Phone Number</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>St. Address</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>City</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>Zip Code</b></font></td>
<td><font face="Arial, Helvetica, sans-serif"><b>State</b></font></td>
</tr>
<?php
$i=0; 
while($i < $num1){
	$uid = mysql_result($result1, $i, "uid");
	$username = mysql_result($result1, $i, "username");
	$first_name = mysql_result($result1, $i, "first_name");
	$last_name = mysql_result($result1, $i, "last_name");
	$status = mysql_result($result1, $i, "status");
	$dept = mysql_result($result1, $i, "dept");
	$gender = mysql_result($result1, $i, "gender");
	$birth_day = mysql_result($result1, $i, "birth_day");
	$birth_month = mysql_result($result1, $i, "birth_month");
	$birth_year = mysql_result($result1, $i, "birth_year");
	$email_id = mysql_result($result1, $i, "email_id");
	$phone_number = mysql_result($result1, $i, "phone_number");
	$address = mysql_result($result1, $i, "address");
	$city = mysql_result($result1, $i, "city");
	$zip_code = mysql_result($result1, $i, "zip_code");
	$state = mysql_result($result1, $i, "state");
?>
	<tr>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $uid; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $username; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo "$first_name $last_name"; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $status; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $dept; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $gender; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo "$birth_day $birth_month $birth_year"; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $email_id; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $phone_number; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $address; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $city; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $zip_code; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $state; ?></font></td>
	</tr>
<?php $i++;} ?>

<?php mysql_close(); ?>
</table>
<br/>
<br/>
<br/>
<br/>
<a href="search.html">Go back to previous page</a>
<br/>
<a href="homepage.html">Go back to homepage</a>
<?php 
}
// displaying error message if no rows are affected due to the query
else{
	echo "<h3>This University ID does not exist in SIS. Please enter a valid UID.</h3>";
	echo "<a href='search.html'>Go back to previous page</a></br>";
	echo "<a href='homepage.html'>Go back to homepage</a>";
}
?>

</body>
</center>
</html>