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
$address = $_POST['address'];
$city = $_POST['city'];
$zip_code = $_POST['zip_code'];
$state = $_POST['state'];

//writing queries to update address
$query13 = "UPDATE student SET address = '$address' WHERE uid = '$uid' ";
$query14 = "UPDATE student SET zip_code = '$zip_code' WHERE uid = '$uid' ";
$query15 = "UPDATE student SET state = '$state' WHERE uid = '$uid' ";
$query16 = "UPDATE student SET city = '$city' WHERE uid = '$uid' ";

//executing the above queries and storing the result in variable
$result13 = mysql_query($query13);
$result14 = mysql_query($query14);
$result15 = mysql_query($query15);
$result16 = mysql_query($query16);

//checking to see that no fields were empty
if(empty($uid) || empty($address) || empty($city) || empty($zip_code) || empty($state) )
{
	echo "<h3>Error has occured. Please fill all the fields to update address.</h3><br/>";
		
}
//displaying success message for address update
else{

	echo "<h3>Address of the student (University ID: " . "<i>$uid</i>" . ") has been successfully changed to " . "<i>$address, $city, $state $zip_code</i></h3>" ;
	//echo "<b>Database output</b><br/><br/>";
	
}
//closing mysql
mysql_close();
?>
<br/>

<!-- link to go to prev page and homepage -->
<a href="update.html">Go back to previous page</a><br/>
<a href="homepage.html">Go back to homepage</a>
</body>
</center>
</html>