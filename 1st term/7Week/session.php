<?php
session_start();

$_SESSION['email'] = 'example@example.com';
$_SESSION['password'] = '123456';
echo "Echo session data is set correctly";
echo "Email" .$_SESSION["email"] . "<br>Password " . $_SESSION["password"];
echo "<br>";

// Redirect the user to the home page 

$_SESSION['email'] = 'example@example.com';
$_SESSION['password'] = 'test@123';

echo"Modified Email:" . $_SESSION['email'] ."<br>Modified Password:" . $_SESSION['password'];
?>