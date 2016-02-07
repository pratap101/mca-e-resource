<?php
session_start()
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Administrative Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script type="text/javascript">
function Validate(){
	var username = document.getElementById("username").value;
	var pass = document.getElementById("pass").value;
	
	if(username == ""){
		   document.getElementById("username").focus();
		   document.getElementById("error").innerHTML="Please Enter User ID";
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

<body>
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
section {
	margin-bottom:0px;
    width:800px;
    float:left;
    /*padding:10px;*/
	 background-color:white;
	 margin-left:200px;
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
.Errormsg{
	margin-bottom:10px;
	color:#F00;
	text-align:center;
	}
</style>
<?php

$Errormsg="";
include("connect.php");
$facname=$facpass= ""; 
if(isset($_POST['submit']))
{

$username = $_POST['username'];
$pass = $_POST['pass'];

	$username = stripslashes($username);
$pass = stripslashes($pass);
$username = mysql_real_escape_string($username);
$pass = mysql_real_escape_string($pass);

$sql="SELECT * FROM admin WHERE loginid='$username' and admin_pass='$pass'";
$result=mysql_query($sql);
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $username and $password, table row must be 1 row
//echo $count;
if ($count==1) {
	echo "hello";
	echo "<script>window.open('admin.php','_self');</script>"; 

	
	 // mysql_close($connect);
	//exit();
} else {
 
	 $Errormsg ="Login Id or Password Does Not Match";	 
}
  }
   
   

?>
<header>

  <h1><img src="images/eresources (2).jpg" style="height:80px; width:200px;"></img>WelcOme To MCA-E-Resource</h1>
</header>



<section style="margin-bottom:0px; height:505px;"></br></br></br></br></br></br></br></br>
<p class="head1">Adminstrative Login </p>
<form name="form1" method="post" action="index.php">

<table width="490" border="0">
  <tr>
    <td width="106"><span class="style2"></span></td>
    <td width="132"><span class="style2"><span class="head1"><img src="login.jpg" width="131" height="155"></span></span></td>
    <td width="238"><table width="219" border="0" align="center">
  <tr>
<div id="error" style="color:red; margin-bottom:10px;"> </div>
<div class="Errormsg"><?php echo $Errormsg ?></div>
    <td width="163" class="style2">Login ID </td>
    <td width="149"><input name="username" type="text" id="username"></td>
  </tr>
  <tr>
    <td class="style2">Password</td>
    <td><input name="pass" type="password" id="pass"></td>
  </tr>
  <tr>
    <td class="style2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="style2">&nbsp;</td>
    <td><input name="submit" type="submit" id="submit" value="Login" onClick="return Validate();"></td>
  </tr>
</table></td>
  </tr>
</table>

</form>
</section>
<footer>
<img src="uploadedwebclientlogo.jpg" style="height:40px; width:30px" />
  Copyright © EResource.com
</footer>

</body>
</html>
