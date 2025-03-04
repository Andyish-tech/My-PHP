<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php
    
    session_start();
    include 'connection.php';

    if (!$cnx) {
        $_SESSION['error'] = 'Database connection failed';
        header('Location: login.php');
        exit;
    }

    if (isset($_POST['login'])) {
        $email = mysqli_real_escape_string($cnx, $_POST['Email']);
        $password = $_POST['Password'];

        // Check if the user exists
        $query = mysqli_query($cnx, "SELECT * FROM users WHERE Email = '$email' AND Password = '$password'");
        $result = mysqli_num_rows($query);
        if ($result > 0) {

            $user = mysqli_fetch_assoc($query);
                $_SESSION['user'] = $user['email'];
                header('Location: Books.php');
          
            
        }else {
            $_SESSION['error'] = 'Invalid email or password';
            header('Location: login.php');
            
            exit;
        } 
    }
?>


   
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
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 120px);
            padding: 2rem 0;
        }

        .login-container {
            display: flex;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
        }

        .login-form {
            flex: 1;
            padding: 2rem;
        }

        .login-image {
            flex: 1;
            background-image: url('SRC/DALL');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .login-image::after {
            content: 'S';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            font-size: 4rem;
            color: rgba(255, 255, 255, 0.8);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
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

        .forgot-password {
            display: block;
            text-align: right;
            margin-top: 1rem;
            color: #7f8c8d;
            text-decoration: none;
        }

        footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 1rem 0;
            text-align: center;
        }

        .footer-links a {
            color: #ecf0f1;
            text-decoration: none;
            margin: 0 1rem;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .login-image {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">Library Logo</div>
                <a href="index.php" class="home-icon"><i class="fas fa-home"></i></a>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="login-container">
                <div class="login-form">
                    <h1>Login to Your Account</h1>
                    <div class="error">
                        <?php if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }?>
                    </div>
                    <form method="POST">
                        <div class="input-group">
                            <input type="email" name="Email" id="email" placeholder="Email" required>
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="input-group">
                            <input type="password" id="password" name="Password" placeholder="Password" required>
                            <i class="fas fa-lock"></i>
                        </div>
                        <button type="submit" name="login">Login</button>
                    </form>
                    <a href="#" class="forgot-password"><i class="fas fa-question-circle"></i> Forgot Password?</a>
                </div>
                <div class="login-image"></div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer-links">
                <a href="#"><i class="fas fa-shield-alt"></i> Privacy Policy</a>
                <a href="#"><i class="fas fa-file-contract"></i> Terms of Service</a>
            </div>
        </div>
    </footer>
</body>
</html>