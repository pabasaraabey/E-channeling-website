<?php
if (!include 'config.php') {
    die('Failed to include config.php');
}


// Create database
$sql = "CREATE DATABASE IF NOT EXISTS mydoctor";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// Create tables
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('patient', 'doctor', 'admin') DEFAULT 'patient'
)";

if ($conn->query($sql) === TRUE) {
    echo "Users table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>