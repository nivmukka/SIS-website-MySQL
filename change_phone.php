<!DOCTYPE html>
<html lang = "en">
<center>
<body bgcolor="#f4d6a0">

<!-- including file for database connection -->
<?php include 'database.php'; ?>
<br/>
<?php

// collecting posted values from html form
$uid = $_POST['uid'];
$phone_number = $_POST['phone_number'];

//writing query to update phone number
$query12 = "UPDATE student SET phone_number = '$phone_number' WHERE uid = '$uid' ";

//executing above query and storing the result in a variable
$result12 = mysql_query($query12);

//checking to see that no fields were empty
if (empty($uid) || empty($phone_number)){
	echo "<h3>Error has occured. Please enter both UID and new phone number to update.</h3><br/>";
	
}

//displaying success message for phone number update
else{
	echo "<h3>Phone number of student (University ID: " . "<i>$uid</i>" . ") has been successfully changed to ". $phone_number . "</h3><br/>" ;
	//echo "<b>Database output</b><br/><br/>";
	
}

// closing mysql
mysql_close();

?>
<br/>

<!-- links to go to prev page and homepage -->
<a href="update.html">Go back to previous page</a><br/>
<a href="homepage.html">Go back to homepage</a>
</body>
</center>
</html>