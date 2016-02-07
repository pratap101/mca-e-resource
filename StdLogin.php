<html>
<head>
<link rel="stylesheet" href="css/login.css"/>
<title>Student LogIn Session</title>

<script type="text/javascript">
function Validate(){
	var emailid = document.getElementById("emailid").value;
	var pass = document.getElementById("pass").value;
	
	if(emailid == ""){
		   document.getElementById("emailid").focus();
		   document.getElementById("error").innerHTML="Please Enter Admission Number";
		   return false;
		}
	if(pass == ""){
		document.getElementById("pass").focus();
		document.getElementById("error").innerHTML="Please Enter Password";
		return false;
		}
	
	}

</script>

</head>
<style type="text/css">
.Errormsg{
	margin-bottom:10px;
	color:#F00;
	text-align:center;
	}
</style>

<?php
$Errormsg="";
include("connect.php");
$admno=$pass= ""; 
if(isset($_POST['submit']))
{

$admno = $_POST['admno'];
$pass = $_POST['pass'];

$admno = stripslashes($admno);
$pass = stripslashes($pass);

$admno = mysql_real_escape_string($admno);
$pass = mysql_real_escape_string($pass);

$sql="SELECT * FROM reg_user WHERE adm_no='$admno' and pass='$pass'";
$result=mysql_query($sql);
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $username and $password, table row must be 1 row
//echo $count;
if ($count==1) {
	echo "hello";
	echo "<script>window.open('Stdsucc.php','_self');</script>"; 

	
	 // mysql_close($connect);
	//exit();
} else {
 
	 $Errormsg ="Admission Number or Password Does Not Match";	 
}
  }
 else{
	// $Errormsg= "Somethings is wrong";
	 }  
   

?>

<body>
<header>

  <h1><img src="images/eresources (2).jpg" style="height:80px; width:200px;"></img>WelcOme To MCA-E-Resource</h1>
</header>
<section>
</br></br>
<div class="form1">
<h1>LogIn Portal For Student</h1>
<center><div id="error" style="color:red; margin-bottom:10px;"> </div></center>
<div class="Errormsg"><?php echo $Errormsg ?></div>
<form action="StdLogin.php" method="post" enctype="multipart/form-data">
<input type="text" name="admno" placeholder="Your Admission Number *" id="emailid" />
<input type="password" name="pass" placeholder="Password *"  id="pass"/>
<input type="submit" name="submit" value="Send"  onClick="return Validate();" />
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