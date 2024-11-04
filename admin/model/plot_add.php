<?php
include 'conn.php';
include 'session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['status'];
    
    $sql = "INSERT INTO plot (status) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $status);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Plot added successfully";
    } else {
        $_SESSION['error'] = "Error adding plot";
    }
    
    $stmt->close();
    header("Location: ../plot.php");
    exit();
}
?> 