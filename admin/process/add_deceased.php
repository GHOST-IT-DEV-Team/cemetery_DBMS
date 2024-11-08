<?php
include '../model/conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get all form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $date_of_death = mysqli_real_escape_string($conn, $_POST['date_of_death']);
    $plot_number = mysqli_real_escape_string($conn, $_POST['plot_number']);
    $cause_of_death = mysqli_real_escape_string($conn, $_POST['cause_of_death']);
    $next_of_kin = mysqli_real_escape_string($conn, $_POST['next_of_kin']);
    $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    try {
        // Start transaction
        $conn->begin_transaction();

        $query = "INSERT INTO customers (name, date_of_death, plot_number, cause_of_death, next_of_kin, contact_number, address, date_added) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
        
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssss", 
            $name, 
            $date_of_death, 
            $plot_number, 
            $cause_of_death, 
            $next_of_kin,
            $contact_number,
            $address
        );

        if ($stmt->execute()) {
            $_SESSION['success'] = "Record added successfully";
            $conn->commit();
        } else {
            throw new Exception("Error executing query");
        }

    } catch (Exception $e) {
        $conn->rollback();
        $_SESSION['error'] = "Error adding record: " . $e->getMessage();
    }

    $stmt->close();
    $conn->close();

    header("Location: ../decease.php");
    exit();
}
?> 