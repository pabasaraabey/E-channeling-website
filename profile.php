<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

include "config.php"; // Database connection

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <img src="logo.png" alt="Logo" class="logo-img">
            <ul class="nav-links">
                <li><a href="index.php">HOME</a></li>
                <li><a href="profile.php">PROFILE</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="container">
            <h2>Welcome, <?php echo $user['name']; ?>!</h2>
            <div class="profile-info">
                <img src="uploads/<?php echo $user['profile_pic']; ?>" alt="Profile Picture" class="profile-pic">
                <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                <p><strong>Phone:</strong> <?php echo $user['phone']; ?></p>
            </div>
            <a href="edit_profile.php" class="btn">Edit Profile</a>
        </div>
    </section>
</body>
</html>