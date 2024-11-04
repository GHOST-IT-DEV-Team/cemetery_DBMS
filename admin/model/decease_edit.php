<?php
include 'conn.php';
include 'session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $date_of_death = $_POST['date_of_death'];
    $plot_id = $_POST['plot_id'];
    $cause_of_death = $_POST['cause_of_death'];
    $next_of_kin = $_POST['next_of_kin'];
    
    // Get the old plot_id first
    $old_plot_sql = "SELECT plot_id FROM deceased WHERE id = ?";
    $old_stmt = $conn->prepare($old_plot_sql);
    $old_stmt->bind_param("i", $id);
    $old_stmt->execute();
    $result = $old_stmt->get_result();
    $old_plot = $result->fetch_assoc();
    
    $sql = "UPDATE deceased SET name = ?, date_of_death = ?, plot_id = ?, 
            cause_of_death = ?, next_of_kin = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssissi", $name, $date_of_death, $plot_id, $cause_of_death, $next_of_kin, $id);
    
    if ($stmt->execute()) {
        // Update old plot status to Available
        if ($old_plot['plot_id'] != $plot_id) {
            $update_old_sql = "UPDATE plot SET status = 'Available' WHERE id = ?";
            $update_old_stmt = $conn->prepare($update_old_sql);
            $update_old_stmt->bind_param("i", $old_plot['plot_id']);
            $update_old_stmt->execute();
            
            // Update new plot status to Occupied
            $update_new_sql = "UPDATE plot SET status = 'Occupied' WHERE id = ?";
            $update_new_stmt = $conn->prepare($update_new_sql);
            $update_new_stmt->bind_param("i", $plot_id);
            $update_new_stmt->execute();
        }
        
        $_SESSION['success'] = "Deceased record updated successfully";
    } else {
        $_SESSION['error'] = "Error updating deceased record";
    }
    
    $stmt->close();
    header("Location: ../decease.php");
    exit();
}
?> 