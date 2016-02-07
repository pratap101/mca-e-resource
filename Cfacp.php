<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create Password</title>
<link rel="stylesheet" href="css/login.css"/>
<script type="text/javascript">
function Validate(){
	var mnlen = 8;
    var mxlen = 15; 
	var faculty = document.getElementById("faculty").value;
	var pass = document.getElementById("pass").value;
	var conpass=document.getElementById("conpass").value;
	if(faculty == ""){
		   document.getElementById("faculty").focus();
		   document.getElementById("error").innerHTML="Please Select Faculty Name";
		   return false;
		}
	if(pass == ""){
		document.getElementById("pass").focus();
		document.getElementById("error").innerHTML="Please Enter Password";
		return false;
		}else if(pass.length<8 || pass.length> 15){ 
		 document.getElementById("pass").focus();
		 document.getElementById("error").innerHTML="Password Must Be Between 8 to 15 Character";
		 return false;
         }	 
		
	if(conpass==""){
		 document.getElementById("conpass").focus();
		 document.getElementById("error").innerHTML="Please Confirm Password";
		 return false;
		 }
		 	 
      if(pass != conpass){
		  document.getElementById("pass").focus();
		  document.getElementById("error").innerHTML="Password Does Not Match";
		  return false;
		  }
		  
	
	}

</script>
<style type="text/css">
.Errormsg{
	margin-bottom:10px;
	color:#F00;
	text-align:center;
	}
</style>

</head>


<body>
<?php
/*
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
echo $facname;
$sql="INSERT INTO reg_faculty(faculty_name,faculty_pass) VALUES('$facname','$facpass')";
//$insert_query=mysql_query($sql);
if(mysql_query($sql)){
  /*echo"<script>alert('Registration successfully')</script>";*/
  /*echo "<script>window.open('RegSucc.php','_self');</script>";*/
  //$Errormsg="Password Submitted Successfully";
//}
// Mysql_num_row is counting table row
//$count=mysql_num_rows($result);
// If result matched $username and $password, table row must be 1 row
//echo $count;
/*if ($count==1) {
	echo "hello";
	echo "<script>window.open('Faclogsucc.php','_self');</script>"; */

	
	 // mysql_close($connect);
	//exit();
/* else {
 
	 //$Errormsg ="Faculty Name or Password Does Not Match";	 
}
  }*/
   
   

?>


<header>

  <h1><img src="images/eresources (2).jpg" style="height:80px; width:200px;"></img>WelcOme To MCA-E-Resource</h1>
</header>
<section>
</br></br>
<div class="form1">
<h1>Create Password For Faculty Member</h1>
<center><div id="error" style="color:red; margin-bottom:10px;"> </div></center>
<div class="Errormsg"><?php // echo $Errormsg ?></div>
<form action="c.php" method="post" enctype="application/x-www-form-urlencoded">
<select name="faculty" id="faculty">
<option value="">----Select Faculty Name---- *</option>
<option value="Dr. Naveen Kr. Singh">Dr. Naveen Kr. Singh</option>
<option value="Prof. (Brig.) Jagdish Singh">Prof. (Brig.) Jagdish Singh</option>
<option value="Dr. Arjun Kr. Singh">Dr. Arjun Kr. Singh</option>
<option value="Surendra Kr. Pathak">Surendra Kr. Pathak</option>
<option value="Renu Garg">Renu Garg</option>
<option value="R.K. Maurya">R.K. Maurya</option>
<option value="Tarun Kr. Sharma">Tarun Kr. Sharma</option>
<option value="Dr. Devendra Kumar">Dr. Devendra Kumar</option>
<option value="Vinod Kumar">Vinod Kumar</option>
<option value="Dr. Rakesh Kumar">Dr. Rakesh Kumar</option>
<option value="Vikas Kumar">Vikas Kumar</option>
<option value="Parul Kundra">Parul Kundra</option>
<option value="Reena Agarwal">Reena Agarwal</option>
<option value="Neetu Sharma">Neetu Sharma</option>
<option value="Esmita Singh">Esmita Singh</option>
<option value="Kitty Ahuja">Kitty Ahuja</option>
<option value="Heena Dangey">Heena Dangey</option>
<option value="Shweta Agarwal">Shweta Agarwal</option>
<option value="Priyanka Jain">Priyanka Jain</option>
<option value="Saumya Batham">Saumya Batham</option>
</select>
<input type="password" name="pass" placeholder="Password *" id="pass" />
<input type="password" name="conpass" placeholder="Confirm Password *" id="conpass" />
<input type="submit" value="Send"  onclick="return Validate();" name="submit"/>
</form>
</div>
</br></br>
</section>

<footer>
<img src="uploadedwebclientlogo.jpg" style="height:40px; width:30px" />
  Copyright © EResource.com
</footer>
</body>
</html>