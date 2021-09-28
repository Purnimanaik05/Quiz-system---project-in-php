<?php
include_once 'dbConnection.php';
ob_start();
$name     = $_POST['name'];
$name     = ucwords(strtolower($name));
$gender   = $_POST['gender'];
$college   = $_POST['college'];
$email   = $_POST['email'];
$username = $_POST['username'];
$phno     = $_POST['phno'];
$password = $_POST['password'];


$name     = stripslashes($name);
$name     = addslashes($name);
$name     = ucwords(strtolower($name));
$gender   = stripslashes($gender);
$gender   = addslashes($gender);
$college = stripslashes($college);
$college = addslashes($college);
$email = stripslashes($email);
$email = addslashes($email);
$username = stripslashes($username);
$username = addslashes($username);
$phno     = stripslashes($phno);
$phno     = addslashes($phno);
$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);

$q3 = mysqli_query($con, "INSERT INTO user VALUES  (NULL,'$name','$gender','$college' ,'$email','$username' ,'$phno', '$password')");
if ($q3) {
    session_start();
    $_SESSION["username"] = $username;
    $_SESSION["name"]     = $name;
    
    header("location:account.php?q=1");
} else {
    header("location:index.php?q7=Username already exists. Please choose another&name=$name&gender=$gender&college=$college&email=$email&username=$username&phno=$phno");
}
ob_end_flush();
?>