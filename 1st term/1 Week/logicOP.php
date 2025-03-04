<?php

$y= 2;
$x= 3;

//OR OPERATOR

$result=(($y> 10) || ($x > 1));
echo var_dump($result); //The output will true because one of the value is true

//AND OPERATOR
// $result=(($y> 10) && ($x > 1));
// echo var_dump($result);//The output will false because one of the value is not true
$inputPassword = "user123";
$storePassword = "user123";
if ($inputPassword== $storePassword ) {
    echo "Login successful";
} else {
    echo "Login failed";
}
$isLoggedIn = true;
$permission = true;
if ($isLoggedIn && $permission) {
    echo "Access granded";
}else{
    echo "Access denied";
}
?>