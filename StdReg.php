<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/StdReg.css" />
<title>Student Registration</title>

<script type="text/javascript">
function Validate(){
	var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
	var letters = /^[A-Za-z ]+$/; 
	var mnlen = 8;
    var mxlen = 15; 
    var name=document.getElementById("stdname").value;
	//var name=document.form1.stdname1.value;
	var admno=document.getElementById("admno").value;
	var course=document.getElementById("course").value;
	var sem=document.getElementById("sem").value;
	var emailid=document.getElementById("emailid").value;
	var pass=document.getElementById("pass").value;
	var pass1=document.getElementById("pass").value.lenght;
	var conpass=document.getElementById("conpass").value;
	
	if(name==""){
		document.getElementById("stdname").focus();
		document.getElementById("error").innerHTML = "Please Enter Name";
		

                return false;
		}
		else if(!letters.test(name)){
			document.getElementById("stdname").focus();
		document.getElementById("error").innerHTML = "Please Enter Only Character";
		

                return false;
			
			}
		if(admno==""){
		document.getElementById("admno").focus();
		//alert("Please enter your name");
		document.getElementById("error").innerHTML = "Please Enter Admission Number";
	    return false;
		}
		if (course == "") {
        document.getElementById("course").focus();
		document.getElementById("error").innerHTML = "Please Select Course ";
        return false;
     }
	 if (sem == "") {
        document.getElementById("sem").focus();
		document.getElementById("error").innerHTML = "Please Select Semester";
        return false;
     }

		
		if (emailid == "" )
	{
		document.getElementById("emailid").focus();
		document.getElementById("error").innerHTML = "Please Enter Email";
		return false;
	 }else if(!emailRegex.test(emailid)){
		document.getElementById("emailid").focus();
		document.getElementById("error").innerHTML = "Please Enter Valid Email";
		return false;
	 }
	 if(pass==""){
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
	  	
</head>
<?php
$Errormsg="";
include("connect.php");

$success="";
$stdname = $admno = $course = $sem = $emailid = $pass = $conpass = ""; 
if(isset($_POST['submit']))
{
$stdname = $_POST['stdname'];
$admno = $_POST['admno'];
$course = $_POST['course'];
$sem= $_POST['sem'];
$emailid = $_POST['emailid'];
$pass = $_POST['pass'];
$conpass = $_POST['conpass'];

if($stdname=="" or $admno=="" or $course=="" or $sem=="" or $emailid==
"" or $pass=="" or $conpass =="" )
{
/*echo"<script>alert('Important field is empty')</script>";*/
exit();
}
else 
   {
	$admno = stripslashes($admno);
$emailid = stripslashes($emailid);
$admno = mysql_real_escape_string($admno);
$emailid = mysql_real_escape_string($emailid);

$sql="SELECT * FROM reg_user WHERE adm_no='$admno' and email='$emailid'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $username and $password, table row must be 1 row
if ($count==1) {
	//echo 'Hello';
    //echo "Success! $count";
	/*print"<script>alert('Admission Number or Email-Id Already Exist')</script>";*/
	/*echo"<script>document.write('Admission Number or Email-Id Already Exis');</script>";*/
	$Errormsg ="Admission Number or Email-Id Already Exist";
	//exit();
} else {
 	 
		 
		 
 
	   
  $insert_query="insert into reg_user(std_name,adm_no,course,sem,email,pass,conpass) values('$stdname','$admno','$course',$sem,'$emailid','$pass','$conpass')";
  if(mysql_query($insert_query)){
  /*echo"<script>alert('Registration successfully')</script>";*/
  echo "<script>window.open('RegSucc.php','_self');</script>";
   $stdname = $admno = $course = $sem = $emailid = $pass = $conpass = ""; 
   /*$success = "Registration Successfully";*/
  
  mysql_close($connect);
  }
  }
   
   }
}

?>


<body>
<header>

  <h1><img src="images/eresources (2).jpg" style="height:80px; width:200px;"></img>WelcOme To MCA-E-Resource</h1>
</header>

<nav>
<div id="nav1">
<a href="Mainpage.html"><h4 class="h">Home</h4></a></br>
<a href="Faculty.html"><h4 class="h">Faculty</h4></a></br>
<a href=""><h4 class="h">Contact Us</h4></a></br>
<a href=""><h4 class="h">About Us</h4></a></br>
<a href="index.php"><h4 class="h">Admin LogIn</h4></a>
</div>
</nav>

<section>
</br></br></br>
<div class="form1" name="form1">
<h1>Student Registration</h1>
<center><div id="error" style="color:red; margin-bottom:10px;"></div>

</center>
<form action="StdReg.php" method="post" onsubmit=" return Validate()">
<div class="Errormsg"><?php echo $Errormsg ?></div> 
<input type="text" name="stdname" placeholder="STUDENT NAME *" value=""  id="stdname" maxlength="20"/> 
<input type="text" name="admno" placeholder="ADMISSION NUMBER *" id="admno" maxlength="11" /> 

<select name="course" id="course" >
<option value="" selected="selected" >---Select Course---- *</option>
<option value="MCA">MCA</option>
</select>

<select name="sem" id="sem" >

<option selected="selected" value="">---Select Semester----*</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
</select>

<input type="text" name="emailid" placeholder="EMAIL-Id *" id="emailid" maxlenght="25"/>
<input type="password" name="pass" placeholder="PASSWORD *"  id="pass" maxlength="16"/>
<input type="password" name="conpass" placeholder="CONFIRM PASSWORD *"id="conpass" maxlength="16"/>

<input type="submit" value="Send" name="submit" />
</form>
</div>

</section>
<aside>
<div id="h">
<a href="StdReg.php"><h4>Student Registration</h4></a></br>
<a href="FacultyLogin.php"><h4>Faculty Login</h4></a></br>
<a href="StdLogin.php"><h4>Student Login</h4></a></br>
<a href="StdLogin.php"><h4>Download Notes</h4></a></br>
<a href="StdLogin.php"><h4>Download Question Paper</h4></a>



<div></aside>
<footer>
<img src="uploadedwebclientlogo.jpg" style="height:40px; width:30px" />
  Copyright © EResource.com
</footer>


</body>
</html>

