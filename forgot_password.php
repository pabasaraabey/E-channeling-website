<?php
include('config.php'); // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if email exists in the database
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $token = bin2hex(random_bytes(50)); // Generate a random token

        // Store token in database
        $query = "UPDATE users SET reset_token='$token' WHERE email='$email'";
        mysqli_query($conn, $query);

        // Send password reset link via email
        $reset_link = "http://yourwebsite.com/reset_password.php?token=$token";
        $subject = "Password Reset Request";
        $message = "Click on the following link to reset your password: $reset_link";
        $headers = "From: support@yourwebsite.com";

        mail($email, $subject, $message, $headers);
        echo "A password reset link has been sent to your email.";
    } else {
        echo "No account found with that email.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="src/forgot_password.css">
</head>
<body>
    <div class="Mfrom">
        <form method="POST">
            <h2>Forgot Password</h2>
            <label>Email:</label>
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit" class="btnn">Send Reset Link</button>
            <div class="forgot">
                <a href="login.php">Back to Login</a>
            </div>
        </form>
    </div>
</body>
</html