<?php
require_once '../../model/conn.php';

session_start();

if (isset($_POST['customer_id'])) {
    $id = $_POST['customer_id'];
    
    try {
        $query = "SELECT * FROM customers WHERE customer_id = ?";
        $stmt = $connection->prepare($query);
        
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $connection->error);
        }
        
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()) {
            ?>
            <div class="modal-header">
                <h5 class="modal-title">Personal Details</h5>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                    </tr>
                    <tr>
                        <th>Date of Death</th>
                        <td><?php echo htmlspecialchars($row['date_of_death']); ?></td>
                    </tr>
                    <tr>
                        <th>Plot Number</th>
                        <td><?php echo htmlspecialchars($row['plot_number']); ?></td>
                    </tr>
                    <tr>
                        <th>Cause of Death</th>
                        <td><?php echo htmlspecialchars($row['cause_of_death']); ?></td>
                    </tr>
                    <tr>
                        <th>Next of Kin</th>
                        <td><?php echo htmlspecialchars($row['next_of_kin']); ?></td>
                    </tr>
                    <tr>
                        <th>Contact Number</th>
                        <td><?php echo htmlspecialchars($row['contact_number']); ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?php echo htmlspecialchars($row['address']); ?></td>
                    </tr>
                </table>
            </div>
            <?php
        } else {
            echo '<div class="alert alert-danger">Record not found</div>';
        }
        
        $stmt->close();
        
    } catch (Exception $e) {
        echo '<div class="alert alert-danger">Error: ' . $e->getMessage() . '</div>';
    }
} else {
    echo '<div class="alert alert-danger">Invalid request: No ID provided</div>';
}

$connection->close();
?> 