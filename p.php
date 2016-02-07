<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
// Initialize variables and set to empty strings
$firstName=$lastName="";
$firstNameErr=$lastNameErr="";

// Validate input and sanitize
if ($_SERVER['REQUEST_METHOD']== "POST") {
   if (empty($_POST["firstName"])) {
      $firstNameErr = "First name is required";
   }
   else {
      $firstName = test_input($_POST["firstName"]);
   }
   if (empty($_POST["lastName"])) {
      $lastNameErr = "Last name is required";
   }
   else {
      $lastName = test_input($_POST["lastName"]);
   }
}

// Sanitize data
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>Find Customer</h2>
<p><span class="error">* required</span></p>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
First Name: <input type="text" name="firstName" value=""><span class="error">* <?php echo $firstNameErr; ?></span><br><br>
Last Name: <input type="text" name="lastName" value="<?php echo $lastName; ?>"><span class="error">* <?php echo $lastNameErr; ?><br><br>
<input type="submit">
</form>

</body>
</html>