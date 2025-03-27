<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="src/dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <nav>
            <h2>My Doctor</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="dashbord.php">Profile</a></li>
                <li><a href="#">Appointments</a></li>
                <li><a href="edit_profile.php">Settings</a></li>
                <li><a href="logout.php" class="logout">Logout</a></li>
            </ul>
        </nav>

        <div class="welcome-section">
            <h1>Welcome, <?php echo $_SESSION['first_name']; ?>!</h1>
            <p>Your health is our priority.</p>
        </div>

        <div class="cards">
            <div class="card">
                <h3>Upcoming Appointments</h3>
                <p>Check your scheduled visits.</p>
                <a href="#">View</a>
            </div>
            <div class="card">
                <h3>Doctors Available</h3>
                <p>Browse and book appointments.</p>
                <a href="#">Browse</a>
            </div>
            <div class="card">
                <h3>Health Tips</h3>
                <p>Read health blogs and tips.</p>
                <a href="#">Read More</a>
            </div>
        </div>
    </div>
</body>
</html>
