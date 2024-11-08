<?php include 'model/session.php'; ?>
<?php include 'model/conn.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidenav.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!-- Content Wrapper -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Payment Management</h1>
    </div>

    <!-- Payment Table Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Payment Records</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="paymentTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Payment ID</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT p.*, c.name as customer_name 
                                  FROM payments p 
                                  INNER JOIN customers c ON p.customer_id = c.customer_id 
                                  ORDER BY p.payment_date DESC";
                        $result = mysqli_query($conn, $query);

                        if (!$result) {
                            // Print the error message
                            echo "MySQL Error: " . mysqli_error($conn);
                            die();
                        }

                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>".$row['payment_id']."</td>";
                            echo "<td>".$row['customer_name']."</td>";
                            echo "<td>$".$row['amount']."</td>";
                            echo "<td>".$row['payment_date']."</td>";
                            echo "<td><span class='badge badge-".($row['status']=='completed'?'success':'warning')."'>".$row['status']."</span></td>";
                            echo "<td>
                                    <button class='btn btn-sm btn-info' onclick='viewPayment(".$row['payment_id'].")'><i class='fas fa-eye'></i></button>
                                    <button class='btn btn-sm btn-primary' onclick='editPayment(".$row['payment_id'].")'><i class='fas fa-edit'></i></button>
                                    <button class='btn btn-sm btn-danger' onclick='deletePayment(".$row['payment_id'].")'><i class='fas fa-trash'></i></button>
                                  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/script.php'; ?>

<!-- Page level custom scripts -->
<script>
$(document).ready(function() {
    $('#paymentTable').DataTable();
});

function viewPayment(id) {
    // Add view payment logic
    alert('Viewing payment ' + id);
}

function editPayment(id) {
    // Add edit payment logic
    alert('Editing payment ' + id);
}

function deletePayment(id) {
    if(confirm('Are you sure you want to delete this payment?')) {
        // Add delete payment logic
        alert('Deleting payment ' + id);
    }
}
</script>

