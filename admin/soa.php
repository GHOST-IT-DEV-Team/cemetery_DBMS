<?php include 'model/session.php'; ?>
<?php include 'model/conn.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidenav.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container-fluid py-4">
<p class="text-left text-uppercase text-dark text-xl font-weight-bolder opacity-7">Statement of Account</p>

    <div class="card">
        <div class="card-header border-0">
            <div class="row">
                <div class="col-md-6">
                    <!-- Add date range filter if needed -->
                    <form class="form-inline">
                        <div class="form-group mx-2">
                            <label class="mr-2">From:</label>
                            <input type="date" class="form-control" id="dateFrom" name="dateFrom">
                        </div>
                        <div class="form-group mx-2">
                            <label class="mr-2">To:</label>
                            <input type="date" class="form-control" id="dateTo" name="dateTo">
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" onclick="generateSOA()">Generate SOA</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Serial</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact Number</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Added</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT DISTINCT c.customer_id, c.serial_number, c.name, c.address, c.contact_number, c.date_added 
                             FROM customers c 
                             INNER JOIN payments p ON c.customer_id = p.customer_id 
                             ORDER BY c.date_added DESC";
                    $result = mysqli_query($conn, $query);
                    
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$row['customer_id']."</td>";
                        echo "<td>".$row['serial_number']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "<td>".$row['contact_number']."</td>";
                        echo "<td>".$row['date_added']."</td>";
                        echo "<td>
                                <button class='btn btn-sm btn-info' onclick='viewSOA(".$row['customer_id'].")'><i class='fas fa-eye'></i></button>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script>
function generateSOA() {
    const dateFrom = document.getElementById('dateFrom').value;
    const dateTo = document.getElementById('dateTo').value;
    
    if (!dateFrom || !dateTo) {
        alert('Please select both date ranges');
        return;
    }
    
    // Open PDF in new window with all parameters
    window.open(`generate_soa.php?from=${dateFrom}&to=${dateTo}`, '_blank');
}

function viewSOA(customerId) {
    const dateFrom = document.getElementById('dateFrom').value;
    const dateTo = document.getElementById('dateTo').value;
    
    if (!dateFrom || !dateTo) {
        alert('Please select both date ranges');
        return;
    }
    
    // Open PDF for specific customer
    window.open(`generate_soa.php?customer_id=${customerId}&from=${dateFrom}&to=${dateTo}`, '_blank');
}
</script>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/script.php'; ?>

