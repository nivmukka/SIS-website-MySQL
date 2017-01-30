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
<?php

// collecting value from html form
$uid = $_POST['uid'];

// writing query to select data using uid
$query10 = "SELECT * FROM student WHERE uid = '$uid' ";

//
$result10 = mysql_query($query10);
$num10 = mysql_num_rows($result10);

if(mysql_affected_rows() > 0){
echo "<b>Please note that only Email-ID, Phone Number, and Address can be updated!</b><br/><h3>Student with University ID " ."<i>$uid</i>". " has the following details in SIS:</h3>";
?>
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
<td><font face="Arial, Helvetica, sans-serif"><b>Address</b></font></td>
</tr>

<?php
$i = 0;
while($i < $num10){
	$uid = mysql_result($result10, $i, "uid");
	$username = mysql_result($result10, $i, "username");
	$first_name = mysql_result($result10, $i, "first_name");
	$last_name = mysql_result($result10, $i, "last_name");
	$status = mysql_result($result10, $i, "status");
	$dept = mysql_result($result10, $i, "dept");
	$gender = mysql_result($result10, $i, "gender");
	$birth_day = mysql_result($result10, $i, "birth_day");
	$birth_month = mysql_result($result10, $i, "birth_month");
	$birth_year = mysql_result($result10, $i, "birth_year");
	$email_id = mysql_result($result10, $i, "email_id");
	$phone_number = mysql_result($result10, $i, "phone_number");
	$address = mysql_result($result10, $i, "address");
	$city = mysql_result($result10, $i, "city");
	$zip_code = mysql_result($result10, $i, "zip_code");
	$state = mysql_result($result10, $i, "state");
?>
	<tr>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $uid; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $username; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo "$first_name $last_name"; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $status; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $dept; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $gender; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo "$birth_day $birth_month $birth_year"; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $email_id; ?><?php echo "<br/>" ;?><?php echo ("<button onclick=\"window.location.href='email_change.html'\">Update email address</button><br/>");?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $phone_number; ?><?php echo "<br/>" ;?><?php echo ("<button onclick=\"window.location.href='phone_change.html'\">Update phone number</button><br/>"); ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo "$address, $city, $state $zip_code"; ?><?php echo "<br/>" ;?><?php echo ("   <button onclick=\"window.location.href='address_change.html'\">Update address</button><br/>");?></font></td>
	</tr>
<?php $i++; }?>
<?php mysql_close();?>
</table>
<br/>
<br/>
<a href="update.html">Go back to previous page</a>
<br/>
<a href="homepage.html">Go back to homepage</a>	
<?php
}
else{
	echo "<h3>This University ID does not exist in SIS. Please enter a valid UID.</h3>";
	echo "<a href='update.html'>Go back to previous page</a></br>";
	echo "<a href='homepage.html'>Go back to homepage</a>";
}
?>
</body>
</center>
</html>