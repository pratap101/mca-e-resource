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

$course = stripslashes($course);
$sem = stripslashes($sem);
$sub = stripslashes($sub);
$course = mysql_real_escape_string($course);
$sem = mysql_real_escape_string($sem);
$sub = mysql_real_escape_string($sub);
 
// Query for a list of all existing files
$sql = "SELECT `id`, `name`, `mime`, `size`, `created` FROM `file`  WHERE course='$course' and sem='$sem' and sub='$sub'";
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
                    <td><a href='get_file.php?id={$row['id']}'>Download</a></td>
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
