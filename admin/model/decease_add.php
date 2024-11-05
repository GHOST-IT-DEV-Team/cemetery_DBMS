<?php
include 'conn.php';
include 'session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $date_of_death = $_POST['date_of_death'];
    $plot_id = $_POST['plot_id'];
    $cause_of_death = $_POST['cause_of_death'];
    $next_of_kin = $_POST['next_of_kin'];
    
    $sql = "INSERT INTO deceased (name, date_of_death, plot_id, cause_of_death, next_of_kin) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $name, $date_of_death, $plot_id, $cause_of_death, $next_of_kin);
    
    if ($stmt->execute()) {
        // Update plot status to Occupied
        $update_sql = "UPDATE plot SET status = 'Occupied' WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("i", $plot_id);
        $update_stmt->execute();
        
        $_SESSION['success'] = "Deceased record added successfully";
    } else {
        $_SESSION['error'] = "Error adding deceased record";
    }
    
    $stmt->close();
    header("Location: ../decease.php");
    exit();
}
?> 