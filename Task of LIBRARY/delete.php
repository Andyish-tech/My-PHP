<?php
//include db connection
include("connection.php");

if (isset($_GET["deleteId"])){
    $id = $_GET["deleteId"];
    $sqlDelete = "DELETE FROM users WHERE Id ='$id'";
    $sql = mysqli_query($cnx, $sqlDelete);

    if($sql==true){
        // echo" Successfully deleted";
        header("Location: register.php"); // redirect to users.php after deletion
    }else{
        echo "Error deleting record". mysqli_error($cnx);
    }
}


?>