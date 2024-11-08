<?php
include '../model/conn.php';
session_start();

if (isset($_POST['customer_id'])) {
    $customer_id = mysqli_real_escape_string($conn, $_POST['customer_id']);
    
    // Delete the record
    $query = "DELETE FROM customers WHERE customer_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $customer_id);
    
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
    
    $stmt->close();
} else {
    echo "error";
}

$conn->close();
?> 