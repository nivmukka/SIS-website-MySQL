<!DOCTYPE html>
<html lang = "en">
<center>
<body bgcolor="#f4d6a0">
<?php include 'database.php'; ?>

<?php

//collecting values from html form
$uid = mysql_real_escape_string($_POST['uid']);
$username = mysql_real_escape_string($_POST['username']);
$first_name = mysql_real_escape_string($_POST['first_name']);
$last_name = mysql_real_escape_string($_POST['last_name']);
$status = mysql_real_escape_string($_POST['status']);
$dept = mysql_real_escape_string($_POST['dept']);
$gender = mysql_real_escape_string($_POST['gender']);
$birth_day = mysql_real_escape_string($_POST['birth_day']);
$birth_month = mysql_real_escape_string($_POST['birth_month']);
$birth_year = mysql_real_escape_string($_POST['birth_year']);
$email_id = mysql_real_escape_string($_POST['email_id']);
$phone_number = mysql_real_escape_string($_POST['phone_number']);
$address = mysql_real_escape_string($_POST['address']);
$city = mysql_real_escape_string($_POST['city']);
$zip_code = mysql_real_escape_string($_POST['zip_code']);
$state = mysql_real_escape_string($_POST['state']);	

//query to check if uid already exists
$imp_query = "select first_name, last_name from student where uid = '$uid' ";
//executing above query and storing results in variable
$uid_check = mysql_query($imp_query);
$num = mysql_num_rows($uid_check);
//loop tp check that no empty fields are present
if(empty($uid) || empty($username) || empty($first_name) || empty($last_name) || empty($_POST['status']) || empty($dept) || empty($gender) || empty($birth_day) || empty($birth_month) || empty($birth_year) || empty($email_id) || empty($phone_number) || empty($address) || empty($city) || empty($zip_code) || empty($state)){
	//header('Location: enroll.html');
	echo "<h3>Error has occured. Please check all fields.</h3>";
	echo "<a href='enroll.html'>Go back to previous page</a><br/>";
	echo "<a href='homepage.html'>Go back to homepage</a><br/>";
	
}else{
    //if uid exists, display error message and dont enroll student
    if($num > 0){
    echo "<br/>Error: Already enrolled. The University ID you entered exists in the SIS database.<br/>";
        $first_name = mysql_result($uid_check, 0, "first_name"); 
        $last_name = mysql_result($uid_check, 0, "last_name");
        echo "<h3>The student ". "<i>$first_name $last_name</i>" . " was enrolled with the University ID " .$uid . ".</h3>";
    echo "<a href='enroll.html'>Go back to previous page</a><br/>";
	echo "<a href='homepage.html'>Go back to homepage</a><br/>";
    mysql_close();
}
else
{
    //no error, enroll student and display success message
	$query1 = "INSERT INTO student (uid, username, first_name, last_name, status, dept, gender, birth_day, birth_month, birth_year, email_id, phone_number, address, city, zip_code, state)
	VALUES ('$uid','$username','$first_name','$last_name','$status','$dept','$gender','$birth_day','$birth_month','$birth_year','$email_id','$phone_number','$address','$city','$zip_code','$state')";

	$result = mysql_query($query1);
	if($result){
		echo "<h2><b>Student (". "$first_name $last_name" .") was successfully added to the SIS database.<b></h2>";
	}
	else{
		echo "<p>Unable to add student to SIS database";
	}	
	echo "<br/>";
	echo "<a href='enroll.html'>Add another student</a><br/>";
	echo "<a href='homepage.html'>Go back to homepage</a>";
} 
}
?>
</body>
</center>
</html>