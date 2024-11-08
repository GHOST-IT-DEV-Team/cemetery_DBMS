<?php
include '../model/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $date_of_death = mysqli_real_escape_string($conn, $_POST['date_of_death']);
    $plot_number = mysqli_real_escape_string($conn, $_POST['plot_number']);
    $cause_of_death = mysqli_real_escape_string($conn, $_POST['cause_of_death']);
    $next_of_kin = mysqli_real_escape_string($conn, $_POST['next_of_kin']);
    $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $query = "UPDATE customers SET 
              name=?, date_of_death=?, plot_number=?, cause_of_death=?, 
              next_of_kin=?, contact_number=?, address=? 
              WHERE id=?";
              
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssssi", $name, $date_of_death, $plot_number, $cause_of_death, 
                      $next_of_kin, $contact_number, $address, $id);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Record updated successfully!";
    } else {
        $_SESSION['error'] = "Error updating record: " . $conn->error;
    }
    
    header("Location: ../decease.php");
    exit();
}
?> 