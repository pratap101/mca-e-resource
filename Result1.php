<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Result</title>
<link rel="stylesheet" href="css/login.css" />
</head>

<body>
<header>

  <h1><img src="images/eresources (2).jpg" style="height:80px; width:200px;"></img>WelcOme To MCA-E-Resource</h1>
</header>
<section style="height:508px; width:1000px; margin-left:160px;">
<?php


// Connect to the database
$dbLink = new mysqli('localhost', 'root', '', 'std_info');
if(mysqli_connect_errno()) {
    die("MySQL connection failed: ". mysqli_connect_error());
}
if(isset($_POST['submit'])){
	$course = $_POST['course'];
$sem = $_POST['slct1'];
$sub = $_POST['slct2'];
$year = $_POST['year'];

$course = stripslashes($course);
$sem = stripslashes($sem);
$sub = stripslashes($sub);
$year = stripslashes($year);

$course = mysql_real_escape_string($course);
$sem = mysql_real_escape_string($sem);
$sub = mysql_real_escape_string($sub);
$year = mysql_real_escape_string($year);
 
// Query for a list of all existing files
$sql = "SELECT `id`, `name`, `mime`, `size`, `created` FROM `up_notes`  WHERE course='$course' and sem='$sem' and sub='$sub' and year='$year'";
$result = $dbLink->query($sql);
 
// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo '<p style="text-align:center; color:red; margin-top:200px; font-size:20px;">There are no files in the database</p>';
    }
    else {
        // Print the top of a table
        echo '<table width="100%" border="1" style="margin-top:50px;">
                <tr>
                    <td align="center"><b>Name</b></td>
                    <td align="center"><b>Mime</b></td>
                    <td align="center"><b>Size(bytes)</b></td>
                    <td align="center"><b>Created</b></td>
                    <td><b>&nbsp;</b></td>
                </tr>';
 
        // Print each file
        while($row = $result->fetch_assoc()) {
            echo "
                <tr>
                    <td>{$row['name']}</td>
                    <td>{$row['mime']}</td>
                    <td>{$row['size']}</td>
                    <td>{$row['created']}</td>
                    <td><a href='get_file1.php?id={$row['id']}'>Download</a></td>
                </tr>";
        }
 
        // Close table
        echo '</table>';
    }
 
    // Free the result
    $result->free();
}
else
{
    echo '<p style="text-align:center; color:red; margin-top:200px; font-size:20px;">Error! SQL query failed:</p>';
    echo "<pre>{$dbLink->error}</pre>";
}
}
// Close the mysql connection
$dbLink->close();
?>

</section>
<footer>
<img src="uploadedwebclientlogo.jpg" style="height:40px; width:30px" />
  Copyright © EResource.com
</footer>
</body>
</html>