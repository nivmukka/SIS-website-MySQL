<!DOCTYPE html>
<html lang = "en">
<body bgcolor="#f4d6a0">
<center>
<?php include 'database.php'?>

<?php
$uid = $_POST['uid'];
$query9 = "DELETE FROM student WHERE uid = '$uid' ";

mysql_query($query9);

if(mysql_affected_rows() > 0){
	echo "<h3>Student with University ID " ."<i>$uid</i>". " has been successfully deleted from SIS. </h3></br>";	
	echo "<a href='delete.html'>Delete another student</a></br>";
	echo "<a href='homepage.html'>Go back to homepage</a>";
}
else
{
	echo "<h3>Univeristy ID does not match. Please re-enter a UID that is valid.</h3>";
	echo "<a href='delete.html'>Delete another student</a></br>";
	echo "<a href='homepage.html'>Go back to homepage</a>";
}

?>

</body>
</center>
</html>