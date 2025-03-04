<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c3e50;
        }

        .home-icon {
            font-size: 1.2rem;
            color: #2c3e50;
            text-decoration: none;
        }

        main {
            padding: 2rem 0;
        }

        .register-container {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }

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
        table{
            width: 100%;
            display: block;
            justify-content: center;
            align-items: center;
            top: 0;
            margin-top: 50px;
            border-collapse: collapse;
        }
        thead{
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
        }
        table th {
            gap: 3.5rem;
           /*  padding: 0 2.5rem 0 2.5rem ;
            border: solid 1px black; */
        }
        table td{
            font-size: 14px;
            padding: 7.75px;
        }
        table a{
            color: #3498db;
            text-decoration: none;
            transition: blue 0.3s ease;
        }

        .additional-info {
            background-color: #ecf0f1;
            padding: 2rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .info-item {
            text-align: center;
        }

        .info-item i {
            font-size: 2rem;
            color: #3498db;
            margin-bottom: 0.5rem;
        }

        footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 2rem 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .social-links a {
            color: #ecf0f1;
            text-decoration: none;
            margin-right: 1rem;
            font-size: 1.2rem;
        }

        .newsletter {
            display: flex;
            align-items: center;
        }

        .newsletter input {
            padding: 0.5rem;
            border: none;
            border-radius: 4px 0 0 4px;
        }

        .newsletter button {
            padding: 0.5rem 1rem;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .footer-content {
                flex-direction: column;
                gap: 1rem;
            }

            .newsletter {
                width: 100%;
            }

            .newsletter input {
                flex-grow: 1;
            }
        }
    </style>

<?php
// Database connection details
$hostName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "library2025";

// Create connection
$cnx = mysqli_connect($hostName, $userName, $userPassword, $dbName);

// Check connection
if (!$cnx) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form submission
if (isset($_POST['save'])) {
    $name = mysqli_real_escape_string($cnx, $_POST['fullname']);
    $email = mysqli_real_escape_string($cnx, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($cnx, $_POST['phoneNumber']);
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $password = $_POST['password'];
    $query = "INSERT INTO users (Name, Email, PhoneNumber, Password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($cnx, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phoneNumber, $password);

    if (mysqli_stmt_execute($stmt)) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}

// Fetch and display users
$sql = "SELECT Id, Name, Email, PhoneNumber, Time FROM users";
$result = mysqli_query($cnx, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['Id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['PhoneNumber']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Time']) . "</td>";
        echo "<td><a href='edit.php?editId=" . $row['Id'] . "'>Edit</a> | <a href='delete.php?deleteId=" . $row['Id'] . "'>Delete</a></td>";
        echo "</tr>";
    }
    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($cnx);
}

mysqli_close($cnx);
?>

</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">Library Logo</div>
                <a href="index.html" class="home-icon"><i class="fas fa-home"></i></a>
            </div>
        </div>
    </header>
   

    <main>
        <div class="container">
            <div class="register-container">
                <div class="register-form">
                    <h1>Create Your Account</h1>
                    <form  method="POST">
                        <div class="input-group">
                            <input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="input-group">
                            <input type="email" id="email" name="email" placeholder="Email" required>
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="input-group">
                            <input type="text" id="phonenumber" name="phoneNumber" placeholder="Phone Number" required>
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="input-group">
                            <input type="password" id="password" name="password" placeholder="Confirm Password" required>
                            <i class="fas fa-lock"></i>
                        </div>
                        <button type="submit" name="save">Register</button>
                    </form>

                    <table border="1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </tr>
                        </thead>
                   
                    <?php
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($cnx, $sql);
                    while ($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>". $row['Id']. "</td>";
                        echo "<td>". $row['Name']. "</td>";
                        echo "<td>". $row['Email']. "</td>";
                        echo "<td>". $row['Email']. "</td>";
                        echo "<td>". $row['Time']. "</td>";
                        echo "<td><a href='edit.php?editId=" .$row['Id'] . "'>Edit</a> | <a href='delete.php?deleteId=" .$row['Id'] . "'>Delete</a></td>";
                    }
                    ?> </table>

                </div>
                <div class="additional-info">
                    <div class="info-grid">
                        <div class="info-item">
                            <i class="fas fa-book"></i>
                            <h3>Borrow Books Online</h3>
                            <p>Access our extensive digital library</p>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-star"></i>
                            <h3>Exclusive Content</h3>
                            <p>Enjoy member-only articles and resources</p>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-thumbs-up"></i>
                            <h3>Personalized Recommendations</h3>
                            <p>Discover books tailored to your interests</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
                <div class="newsletter">
                    <input type="email" placeholder="Enter your email">
                    <button><i class="fas fa-envelope"></i> Subscribe</button>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>