<!DOCTYPE html>
<html>
<body>

<h1>Create Job page</h1>

<?php
// define variables and set to empty values
$usernameErr = $Err = "";
$name = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST["user"];
  echo $name;
}
?>


</body>
</html>
