<?php

if(isset($_POST['Login'])){
$username = $_POST['name'];
$password = $_POST['password'];
echo "Username: " . $username . " <br> Password: " . $password;
}
?>