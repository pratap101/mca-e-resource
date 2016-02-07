<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/login.css" />
<title>DownLoad File</title>

<script type="text/javascript">

function populate(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
	
		
	
	if(s1.value == "one"){
		
		var optionArray = ["|----Select First Semester Subject---- *","pc|Professional Communication(NAS-104)","afm|Accounting and Financial Management(NMCA-112)","ccp|Computer Concepts and Programming(NMCA-113)","dm|Discrete Mathematics(NMCA-114)","dld|Digital Logic Design(NMCA-115)"];
		
	} else if(s1.value == "two"){
		
		var optionArray = ["|----Select Second Semester Subject---- *","ee|Environment and Ecology(NAS-105/NAS-205)","cbnst|Computer based Numerical and Statistical(NMCA-212)","ds|Data Structure Using 'C'(NMCA-213)","automata|Introduction to Automata Theory and Languages(NMCA-214)","co|Computer Organization(NMCA-215)"];
	
	} else if(s1.value == "three"){
		
		var optionArray = ["|----Select Third Semester Subject---- *","os|Operating Systems(NMCA-311)","daa|Design & Analysis of Algorithms(NMCA-312)","dbms|Database Management System(NMCA-313)","java|Internet & Java Programming(NMCA-314)","cbot|Computer Based Optimization Techniques(NMCA-315)","cs|Cyber Security(AUC-002)"];
	}
	
	else if(s1.value == "four"){
		
		var optionArray = ["|----Select Fourth Semester Subject---- *","mis|Management Information Systems(NMCA-411)","wt|Web Technology(NMCA-412)","csc|Client Server Computing(Elective(NMCA-012))","dwhm|Data Warehousing & Mining(Elective(NMCA-013))","dts|Distributed system(Elective(NMCA-015))","ai|Artificial Intelligence(NMCA-413)","mc|Mobile Computing(NMCA-414)","hv|Human Values & Professional Ethics(AUC-001)"];
	}
	else if(s1.value == "five"){
		
		var optionArray = ["|----Select Fifth Semester Subject---- *","mustang|Mustang","shelby|Shelby"];
	}
	else if(s1.value == "six"){
		var optionArray = ["|----Select Sixth Semester Subject---- *","mustang|Mustang","shelby|Shelby"];
	}
	for(var option in optionArray){
		var pair = optionArray[option].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}
	
	
	
}



</script>
<script type="text/javascript">
function Validate(){
	var course =  document.getElementById("course").value;
	var slct1 = document.getElementById("slct1").value;
	var slct2 =  document.getElementById("slct2").value;
	if(course==""){
		 document.getElementById("course").focus();
		  document.getElementById("error").innerHTML = "Please Select Course";
		   return false;
		}
	if(slct1==""){
		 document.getElementById("slct1").focus();
		  document.getElementById("error").innerHTML = "Please Select Semester";
		   return false;
		}
	if(slct2==""){
		 document.getElementById("slct2").focus();
		  document.getElementById("error").innerHTML = "Please Select Subject";
		   return false;
		}
	
	}
</script>


</head>


<body>

<header>

  <h1><img src="images/eresources (2).jpg" style="height:80px; width:200px;"></img>WelcOme To MCA-E-Resource</h1>
</header>
<section>
</br></br>
<div class="form1">
<h1>DownLoad File</h1>
<div id="error" style="margin-bottom:10px; color:#F00; text-align:center;"></div>
<form action="Result.php" method="post" target="_blank" >
<select id="course" name="course"> 
<option value="">----Select Course---- *</option>
<option value="MCA">MCA</option>
</select>
<select id="slct1" name="slct1" onchange="populate(this.id,'slct2')">
<option value="">----Select Semester---- *</option>
<option value="one">1</option>
<option value="two">2</option>
<option value="three">3</option>
<option value="four">4</option>
<option value="five">5</option>
<option value="six">6</option>
</select>
<select id="slct2" name="slct2">
<option id="subject" value="">----Select Subject--- *</option>
</select>
<input type="submit" value="DOWNLOAD NOTES" onclick="return Validate();" name="submit" />
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
