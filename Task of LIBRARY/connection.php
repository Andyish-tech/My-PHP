<?php
//db connection
$hostName="localhost";
$userName="root";
$userPassword="";
$dbName="library2025";
$cnx=mysqli_connect($hostName,$userName,$userPassword,$dbName);
if (!$cnx) {
    die("Could not connect to database due to"). mysqli_error($cnx);
}else{
    //echo "Connecting to Library Database";
}