<?php
include('connection.php');
?>


<style>
     .register-form {
            padding: 2rem;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #2c3e50;
        }

        .input-group {
            margin-bottom: 1rem;
            position: relative;
        }

        .input-group input {
            width: 100%;
            padding: 0.8rem 2.5rem 0.8rem 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .input-group i {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #7f8c8d;
        }

        button {
            width: 100%;
            padding: 0.8rem;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }
</style>
<div class="register-form">
                    <h1>Edit User</h1>
                    <?php
                    $id = $_GET['editId'];
                    $sql = "SELECT * FROM users WHERE Id='$id'";
                    $result = mysqli_query($cnx, $sql);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <form  method="POST">
                        <div class="input-group">
                            <input type="text" id="fullname" name="fullname" value="<?php
                            echo $row['Name'];
                            ?>" placeholder="Full Name" required>
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="input-group">
                            <input type="email" id="email" name="email" value="<?php
                            echo $row['Email'];
                            ?>" placeholder="Email" required>
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="input-group">
                            <input type="text" id="phonenumber" name="phoneNumber" value="<?php
                            echo $row['PhoneNumber'];
                            ?>" placeholder="Phone Number" required>
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="input-group">
                            <input type="password" id="password" name="password" value="<?php
                            echo $row['Password'];
                            ?>" placeholder="Confirm Password" required>
                            <i class="fas fa-lock"></i>
                        </div>
                        <button type="submit" name="update">Edit</button>
                    </form>
</div>

<?php
if(isset($_POST['update'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];
    $sqlupdate = "UPDATE users SET Name='$name', Email='$email', PhoneNumber='$phoneNumber', Password='$password' WHERE Id='$id'";

    $sql = mysqli_query($cnx, $sqlupdate);
    if(!$sql) {
        echo "Error updating record: " . mysqli_error($cnx);
    } else {
        header("Locate: index.php");
        exit;
    }
}
?>