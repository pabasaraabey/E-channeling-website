<?php
session_start();
include "config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    if (!empty($_FILES['profile_pic']['name'])) {
        $profile_pic = $_FILES['profile_pic']['name'];
        move_uploaded_file($_FILES['profile_pic']['tmp_name'], "uploads/" . $profile_pic);
        $update = "UPDATE users SET name='$name', phone='$phone', profile_pic='$profile_pic' WHERE id=$user_id";
    } else {
        $update = "UPDATE users SET name='$name', phone='$phone' WHERE id=$user_id";
    }

    mysqli_query($conn, $update);
    header("Location: profile.php");
    exit();
}

$query = "SELECT * FROM users WHERE id=$user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
</head>
<body>
    <h2>Edit Your Profile</h2>
    <form action="edit_profile.php" method="POST" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo $user['phone']; ?>" required>
        <label>Profile Picture:</label>
        <input type="file" name="profile_pic">
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>