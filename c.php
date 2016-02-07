<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Success</title>
</head>
<style type="text/css">
*{
	margin:0px;
	padding:0px;
	}
body{
	height:100%;
	width:100%;
	}	
h1{
	/*color:#099;*/
	margin-left:280px;
	}
#img1{
	margin-left:50px;
	float:left;
	}
	
header {
    background-color: #109177;
    color:white;
    padding:5px;	 
}
nav {
    line-height:30px;
    background-color:#eeeeee;
    height:300px;
    width:100px;
    float:left;
   padding:5px;
	text-align:center;	      
}
section {
    width:800px;
    float:left;
    /*padding:10px;*/
	 background-color:#eeeeee;
	 margin-left:250px;
	 position:relative;	 	 
}
footer {
    background-color: #109177;
    color:white;
    clear:both;
    text-align:center;
    padding:5px;
	position:relative;	 	 
}
a{
	cursor:pointer;
	text-decoration:none;
	/*margin-left:300px;
	margin-bottom:100px;*/
	}
a:hover{
	
	}	
h4{
	border:1px solid  #109177;
	padding: 1px;
	border-radius:10px;
	background-color: #109177;
	color:white;
}	
#nav1{
	margin-bottom: 0px;
	vertical-align: bottom;
	}
aside{
	
    line-height:30px;
    background-color:#eeeeee;
    height:300px;
    width:200px;
    float:right;
   padding:5px;
	text-align:center;
	      
}
h2{
    text-align:center;
	font: 95% Arial, Helvetica, sans-serif;
	color:green;
	
	
	}
	
.h2{
	color:#060;
	margin-top:60px;
	margin-bottom:126px;
	}	
</style>


</head>

<body>
<header>

  <h1><img src="images/eresources (2).jpg" style="height:80px; width:200px;"></img>WelcOme To MCA-E-Resource</h1>
</header>
<!---
<nav>
<div id="nav1">
<a href="Mainpage.html"><h4 class="h">Home</h4></a></br>
<a href="Faculty.html"><h4 class="h">Faculty</h4></a></br>
<a href="Contactus.html"><h4 class="h">Contact Us</h4></a></br>
<a href=""><h4 class="h">About Us</h4></a>
</div>
</nav>-->

<section style="height:506px;">
<a href="admin.php">Click here to go main menu</a>
</br></br></br>
<div class="h2">

<center><img src="images/success.png" style=""><img></center>
<h1 >Password Successfully Submitted</h1></br>
<h1>Thank You For Submitting Password</h1></br>

<?php

$Errormsg="";
include("connect.php");
$facname=$facpass= ""; 
if(isset($_POST['submit']))
{

$facname = $_POST['faculty'];
$facpass = $_POST['pass'];

	$facname = stripslashes($facname);
$facpass = stripslashes($facpass);
$facname = mysql_real_escape_string($facname);
$facpass = mysql_real_escape_string($facpass);
//echo $facname;
$sql="INSERT INTO reg_faculty(faculty_name,faculty_pass) VALUES('$facname','$facpass')";
//$insert_query=mysql_query($sql);
if(mysql_query($sql)){
  /*echo"<script>alert('Registration successfully')</script>";*/
  /*echo "<script>window.open('RegSucc.php','_self');</script>";*/
  //$Errormsg="Password Submitted Successfully";
}
// Mysql_num_row is counting table row
//$count=mysql_num_rows($result);
// If result matched $username and $password, table row must be 1 row
//echo $count;
/*if ($count==1) {
	echo "hello";
	echo "<script>window.open('Faclogsucc.php','_self');</script>"; */

	
	 // mysql_close($connect);
	//exit();
 else {
 
	 //$Errormsg ="Faculty Name or Password Does Not Match";	 
}
  }
   
   

?>

</section>
<!---
<aside>
<div id="h">
<a href="StdReg.php"><h4>Student Registration</h4></a></br>
<a href="FacultyLogin.php"><h4>Faculty Login</h4></a></br>
<a href="StdLogin.php"><h4>Student Login</h4></a></br>
<a href="StdLogin.php"><h4>Download Notes</h4></a></br>
<a href="StdLogin.php"><h4>Download Question Paper</h4></a>

--->

<div></aside>
<footer>
<img src="uploadedwebclientlogo.jpg" style="height:40px; width:30px" />
  Copyright © EResource.com
</footer>


</body>
</html>