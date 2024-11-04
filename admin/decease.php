<?php include 'model/session.php'; ?>
<?php include 'model/conn.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidenav.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="d-flex justify-content-between px-4 pt-4">
                    <h4>Deceased Records</h4>
                    <button type="button" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#addDeceaseModal">
                        <i class="material-icons text-sm">add</i> Add New Record
                    </button>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date of Death</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Plot Number</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cause of Death</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Next of Kin</th>
                                    <th class="text-secondary opacity-7">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sql = "SELECT d.*, p.id as plot_number FROM deceased d 
                                        LEFT JOIN plot p ON d.plot_id = p.id 
                                        ORDER BY d.date_of_death DESC";
                                $query = $conn->query($sql);
                                while($row = $query->fetch_assoc()){
                                    echo "
                                    <tr>
                                        <td>
                                            <div class='d-flex px-2 py-1'>
                                                <div class='d-flex flex-column justify-content-center'>
                                                    <h6 class='mb-0 text-sm'>{$row['name']}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class='text-xs font-weight-bold mb-0'>" . date('F d, Y', strtotime($row['date_of_death'])) . "</p>
                                        </td>
                                        <td>
                                            <p class='text-xs font-weight-bold mb-0'>{$row['plot_number']}</p>
                                        </td>
                                        <td>
                                            <p class='text-xs font-weight-bold mb-0'>{$row['cause_of_death']}</p>
                                        </td>
                                        <td>
                                            <p class='text-xs font-weight-bold mb-0'>{$row['next_of_kin']}</p>
                                        </td>
                                        <td>
                                            <button type='button' class='btn btn-primary'>Edit</button>
                                            <button type='button' class='btn btn-danger'>Delete</button>
                                        </td>
                                    </tr>
                                    ";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php include 'modal/decease_modal.php'; ?> 
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="addDeceaseModal" tabindex="-1" aria-labelledby="addDeceaseModalLabel" aria-hidden="true">
    <!-- Your existing modal content -->
</div>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/script.php'; ?>
</body>
</html>
