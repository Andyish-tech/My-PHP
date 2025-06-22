<?php
// Database connection details
$host = "localhost";
$dbname = "e_intago";
$username = "root";
$password = "";

// Create database connection
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Function to sanitize user input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Initialize error array
$errors = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $fullname = sanitize_input($_POST["fullname"]);
    $email = sanitize_input($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate full name
    if (empty($fullname)) {
        $errors[] = "Full name is required.";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }

    // Validate password confirmation
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // Check if email already exists
    $stmt = $db->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $errors[] = "Email already registered.";
    }

    // Process profile picture upload
    $profile_picture = null;
    if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] == 0) {
        $allowed_types = ["image/jpeg", "image/png", "image/gif"];
        $max_size = 5 * 1024 * 1024; // 5MB

        if (!in_array($_FILES["profile_picture"]["type"], $allowed_types)) {
            $errors[] = "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
        } elseif ($_FILES["profile_picture"]["size"] > $max_size) {
            $errors[] = "File size exceeds the maximum limit of 5MB.";
        } else {
            $upload_dir = "uploads/";
            $file_name = uniqid() . "_" . basename($_FILES["profile_picture"]["name"]);
            $upload_path = $upload_dir . $file_name;

            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $upload_path)) {
                $profile_picture = $file_name;
            } else {
                $errors[] = "Failed to upload profile picture.";
            }
        }
    }

    // If no errors, proceed with registration
    if (empty($errors)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $stmt = $db->prepare("INSERT INTO users (name, email, password, profile_picture, created_at) VALUES (:name, :email, :password, :profile_picture, NOW())");
        $stmt->bindParam(":name", $fullname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hashed_password);
        $stmt->bindParam(":profile_picture", $profile_picture);

        if ($stmt->execute()) {
            // Registration successful, redirect to login page
            header("Location: login.html");
            exit();
        } else {
            $errors[] = "Registration failed. Please try again.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="CSS/Register-styles.css">
</head>
<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="registration-form">
            <h2><i class="fas fa-user-plus"></i> E-Learning Registration</h2>
            <?php if (!empty($errors)): ?>
                <div class="error-message">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="fullname"><i class="fas fa-user"></i> Full Name</label>
                <input type="text" id="fullname" name="fullname" value="<?php echo isset($fullname) ? $fullname : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password"><i class="fas fa-lock"></i> Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <label for="profile_picture"><i class="fas fa-image"></i> Profile Picture (optional)</label>
                <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
            </div>
            <button type="submit" class="register-button"><i class="fas fa-sign-in-alt"></i> Register</button>
            <div class="login-link">
                Already have an account? <a href="login.html">Log in</a>
            </div>
        </form>
    </div>
</body>
</html>

