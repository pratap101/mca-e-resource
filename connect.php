<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="std_info"; // Database name 
$tbl_name="reg_faculty"; // Table name 

// Connect to server and select databse.
$connect=mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB" . mysql_error());
?>