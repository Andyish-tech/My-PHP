<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body >
    <main>
        <section>
            <h1>Login Form</h1>
    <form action="processLogin.php" method="POST">
        <label for="username">User Name:</label><br>
        <input type="text" name="name"><br>
        <label for="username">Password</label><br>
        <input type="password" name="password"><br>
        <input type="submit" name="Login" value="Login">
    </form>
        </section>
    </main>
</body>
</html><?php 
if (isset($_POST['Login'])) {
    $username = $_POST['email']; //get username input from form
    $password = $_POST['password']; //get password input from form
    echo "Enter Username is: " .$username ."<br>"; 
    echo " Password is: " .$password;

    $db_username = 'admin';
    $db_password = 'password';
    
    if($username == $db_username && $password == $password){
        echo"\nLogin Successful";
    }else{
        echo"\nInvalid username or Password";
    }
}
?>