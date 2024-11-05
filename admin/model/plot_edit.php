<?php
include 'conn.php';
include 'session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plot_id = $_POST['plot_id'];
    $status = $_POST['status'];
    
    $sql = "UPDATE plot SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $plot_id);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Plot updated successfully";
    } else {
        $_SESSION['error'] = "Error updating plot";
    }
    
    $stmt->close();
    header("Location: ../plot.php");
    exit();
}
?> 