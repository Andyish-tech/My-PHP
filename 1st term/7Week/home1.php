<?php
session_start();
if(isset($_SESSION["email"]) && isset($_SESSION["password"])){
    
echo "session Email data:" .$_SESSION['email'];
echo "<br>Session Password :" .$_SESSION['password'];
} else {
    echo "Session Email or password not found!";
}

session_unset();

session_destroy();
?>