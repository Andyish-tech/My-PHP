<?php

$t= date("H"); //current Time

if ($t < "10") {
    echo "Have a good night!";
} elseif($t < "20"){
    echo "Have a good day!";
} else {
    echo "Have a good night!";
}
