<?php
session_start();

if(isset($_SESSION["email"]) && ($_SESSION["email"])){

    echo "Sesion Email data1: " . $_SESSION["email"];
    echo "Sesion Password data1: " . $_SESSION["password"];
} else {
    echo "Session data not available";
}
// echo "session Email data:" .$_SESSION['email'];
// echo "Session Password :" .$_SESSION['password'];
?>