<?php
include 'conn.php';
include 'session.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if($password !== $confirm_password) {
        echo json_encode(['success' => false, 'message' => 'Passwords do not match']);
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if username exists
    $check = $conn->prepare("SELECT id FROM admin WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $result = $check->get_result();
    
    if($result->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Username already exists']);
        exit();
    }

    // Insert new admin
    $sql = "INSERT INTO admin (username, password, name, email, date_added) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $hashed_password, $name, $email);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Admin added successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error adding admin: ' . $conn->error]);
    }
    exit();
}

echo json_encode(['success' => false, 'message' => 'Invalid request method']);
exit();
?> 