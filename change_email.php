<!DOCTYPE html>
<html lang = "en">
<center>
<body bgcolor="#f4d6a0">
<?php include 'database.php'; ?>
<br/>
<?php

// collecting posted values from html form
$uid = $_POST['uid'];
$email_id = $_POST['email_id'];

// writing query to update email 
$query11 = "UPDATE student SET email_id = '$email_id' WHERE uid = '$uid' ";
    
// executing above query and storing result in a variable
$result11 = mysql_query($query11);

// checking to see that no empty fields were submitted
if (empty($uid) || empty($email_id)){
	echo "<h3>Error has occured. Please enter both UID and new Email address to update.</h3><br/>";	
}
    
//displaying success message for email id update
else{
	echo "<h3>Email address of student (University ID: " . "<i>$uid</i>" . ") has been successfully changed to ". "$email_id" . "</h3><br/>" ;
	//echo "<b>Database output</b><br/><br/>";
}
    
//closing mysql
mysql_close();

?>
<br/>

<!-- links to go to prev page and homepage -->
<a href="update.html">Go back to previous page</a><br/>
<a href="homepage.html">Go back to homepage</a>
</body>
</center>
</html>