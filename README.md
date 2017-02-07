# SIS-website-MySQL
Web-based MySQL Database for Student Information System

This system is built using PHP and MySQL database. Tools used include WAMP server, HTML5, CSS3, phpMyAdmin. This web-based database stores student information which can be dynamically altered from the website. Features of the website include enrolling a student, updating existing student information, finding and deleting student data.

The following explains the naming of the HTML and PHP files, the complete website flow and redirections:
Homepage is an HTML page and it has four buttons for the functions: 
                  1. ENROLL a student
                  2. SEARCH for a student
                  3. UPDATE student information
                  4. DELETE a student
                  
1. homepage.html
homepage.html is an HTML page which has four buttons which open the following html pages
  - enroll.html 
  - search.html
  - update.html
  - delete.html
  
2. enroll.html > form1.php
enroll.html is an HTML page with a form. The form, when submitted, is processed by form1.php
  
3. search.html > form2.php
search.html is an HTML page with search option using ID number. When ID number is entered and submitted, it is processed by form1.php
It also has alternate ways of searching using username, status, department, city, state. There are links for each type of search that, when clicked on, redirect to the following HTML pages respectively. Those HTML pages have forms which when submitted are processed by the corresponding PHPs.
  - username_search.html > username.php
  - status_search.html > status.php
  - dept_search.html > dept.php
  - city_search.html > city.php
  - state_search.html > state.php
  
4. update.html > form3.php
update.html is an HTML page which is used to update student information (eg. email, phone, address). The ID of student, whose information needes to updated, is entered and this form is processed by form3.php
Following HTML links are clicked to update student information and those HTML forms are processed by the corresponding PHPs.
  - email_change.html > change_email.php
  - phone_change.html > change_phone.php
  - address_change.html > change_address.php
  
5. delete.html > form4.php > student_delete.php
delete.html is an HTML page used to delete a student's data by entering ID number. This form, when submitted, is handled by form4.php. Because this is used to delete a given student's data permanently, the process is made two-step by adding a confirmation question and redirecting that to student_delete.php.


The following are the SQL queries used in this project:

###Query to insert data into student table###
INSERT INTO student (uid, username, first_name, last_name, status, dept, gender, birth_day, birth_month, birth_year, email_id, phone_number, address, city, zip_code, state)
VALUES ('$uid','$username','$first_name','$last_name','$status','$dept','$gender','$birth_day','$birth_month','$birth_year','$email_id','$phone_number','$address','$city','$zip_code','$state')

###Queries to update address###
UPDATE student SET address = '$address' WHERE uid = '$uid'
UPDATE student SET zip_code = '$zip_code' WHERE uid = '$uid'
UPDATE student SET state = '$status' WHERE uid = '$uid'
UPDATE student SET city = '$city' WHERE uid = '$uid'

###Query to update email address###
UPDATE student SET email_id = '$email_id' WHERE uid = '$uid'

###Query to update phone number###
UPDATE student SET phone_number = '$phone_number' WHERE uid = '$uid'

###Query to list of students from a chosen city###
SELECT username, first_name, last_name, status, zip_code FROM student WHERE city = '$city'

###Query to display list of students in a chosen department###
SELECT uid, username, first_name, last_name, status FROM student WHERE dept = '$dept'

###Query to display student information using UID###
SELECT * FROM student WHERE uid = '$uid'

###Query to display list of students from a chosen state###
SELECT username, first_name, last_name, status, dept, city, zip_code FROM student WHERE state = '$state'

###Query to display list of students having a chosen status###
SELECT uid, username, first_name, last_name, dept FROM student WHERE status = '$status'

###Query to delete a student from the database###
DELETE FROM student WHERE uid = '$uid'

###Query to display student information using username###
SELECT username, first_name, last_name, dept, status, FROM student WHERE username = '$username'
