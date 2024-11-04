<?php
session_start();
include_once 'conn.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Get user data by username only
$sql = "SELECT * FROM admin WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    $user = $result->fetch_assoc();
    // Verify the password hash
    if(password_verify($password, $user['password'])) {
        $_SESSION['admin'] = $user['id'];  // Store user ID in session
        header('location: ../index.php');
        exit();
    }
}

// If login fails, redirect back with error message
header('location: ../login.php?error=1');
exit();
?>