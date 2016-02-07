<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/login.css" />
<title>UpLaod Question Paper </title>

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
	var year =  document.getElementById("year").value;
	var uploadfile = document.getElementById("uploadfile").value;
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
	if(year==""){
		 document.getElementById("year").focus();
		  document.getElementById("error").innerHTML = "Please Select Year";
		   return false;
		}
	if(uploadfile==""){
		document.getElementById("uploadfile").focus();
		document.getElementById("error").innerHTML = "Please Select File To Upload";
		return false;
		}	
	}
</script>


</head>

<?php
// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'std_info');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        // Gather all required data
		 $course = $dbLink->real_escape_string($_POST['course']);
		  $sem = $dbLink->real_escape_string($_POST['slct1']);
		   $sub = $dbLink->real_escape_string($_POST['slct2']);
		    $year = $dbLink->real_escape_string($_POST['year']);
		   
        $name = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
        $mime = $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
        $data = $dbLink->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size = intval($_FILES['uploaded_file']['size']);
 
        // Create the SQL query
		if($size>104857600){
			echo "File Size must be Less Than 100mb";
			 $dbLink->close();
			}
			else{
        $query = "
           INSERT INTO `up_notes` (
                course,sem,sub, year,name, mime, size, data, created
            )
            VALUES (
                '{$course}','{$sem}','{$sub}','{$year}','{$name}', '{$mime}', {$size}, '{$data}', NOW()
            )";
 
        // Execute the query
        $result = $dbLink->query($query);
			}
 
        // Check if it was successfull
        if($result) {
            //echo 'Success! Your file was successfully added!';
			
			echo "<script>window.open('UploadSucc.php','_self');</script>";
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre>{$dbLink->error}</pre>";
        }
    }
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }
 
    // Close the mysql connection
    $dbLink->close();
}
else {
    //echo 'Error! A file was not sent!';
}
 
// Echo a link back to the main page
//echo '<p>Click <a href="index.html">here</a> to go back</p>';
?>


<body>

<header>

  <h1><img src="images/eresources (2).jpg" style="height:80px; width:200px;"></img>WelcOme To MCA-E-Resource</h1>
</header>
<section>
</br></br>
<div class="form1">
<h1>UpLoad Queston Paper</h1>
<div id="error" style="margin-bottom:10px; color:#F00; text-align:center;"></div>
<form action="Upqu.php" method="post" enctype="multipart/form-data" >
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
<select id="year" name="year">
<option value="">----Select Year----*</option>
<option value="2006-2007">2006-2007</option>
<option value="2007-2008">2007-2008</option>
<option value="2008-2009">2008-2009</option>
<option value="2009-2010">2009-2010</option>
<option value="2010-2011">2010-2011</option>
<option value="2011-2012">2011-2012</option>
<option value="2012-2013">2012-2013</option>
<option value="2013-2014">2013-2014</option>
<option value="2014-2015">2014-2015</option>
</select>
<input type="file" name="uploaded_file" id="uploadfile">
<input type="submit" value="UPLOAD QUESTION PAPER" onclick="return Validate();" name="submit" />
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
