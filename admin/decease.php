<?php include 'model/session.php'; ?>
<?php include 'model/conn.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidenav.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <!-- Success/Error Messages -->
            <?php if(isset($_SESSION['success'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="card my-4">
                <div class="d-flex justify-content-between px-4 pt-4">
                    <h4>Deceased Records</h4>
                    <button type="button" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#addDeceaseModal">
                        <i class="material-icons text-sm">add</i> Add New Record
                    </button>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="deceaseTable">
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
                                $query = "SELECT * FROM customers ORDER BY date_added DESC";
                                $result = $conn->query($query);

                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>
                                            <div class='d-flex px-2 py-1'>
                                                <div class='d-flex flex-column justify-content-center'>
                                                    <h6 class='mb-0 text-sm'>".$row['name']."</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><p class='text-xs font-weight-bold mb-0'>".$row['date_of_death']."</p></td>
                                        <td><p class='text-xs font-weight-bold mb-0'>".$row['plot_number']."</p></td>
                                        <td><p class='text-xs font-weight-bold mb-0'>".$row['cause_of_death']."</p></td>
                                        <td><p class='text-xs font-weight-bold mb-0'>".$row['next_of_kin']."</p></td>
                                        <td>
                                            <button type='button' class='btn btn-primary btn-sm' onclick='editDecease(".$row['customer_id'].")'><i class='fas fa-edit'></i></button>
                                            <button type='button' class='btn btn-danger btn-sm' onclick='deleteRecord(".$row['customer_id'].")'><i class='fas fa-trash'></i></button>
                                            <button type='button' class='btn btn-info btn-sm' onclick='viewDecease(".$row['customer_id'].")'><i class='fas fa-eye'></i></button>
                                        </td>
                                    </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addDeceaseModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="process/add_deceased.php" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Date of Death</label>
                                <input type="date" name="date_of_death" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Plot Number</label>
                                <input type="text" name="plot_number" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Cause of Death</label>
                                <input type="text" name="cause_of_death" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Next of Kin</label>
                                <input type="text" name="next_of_kin" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Contact Number</label>
                                <input type="text" name="contact_number" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="process/edit_deceased.php" method="POST">
                <input type="hidden" name="customer_id" id="edit_customer_id">
                <div class="modal-body">
                    <!-- Add your edit form fields here -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" id="edit_name" class="form-control" required>
                            </div>
                        </div>
                        <!-- Add other fields similar to the add modal -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="viewDetails">
                <!-- Details will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeViewModal()">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
function editDecease(customerId) {
    $.ajax({
        url: 'process/get_deceased.php',
        type: 'POST',
        data: { customer_id: customerId },
        dataType: 'json',
        success: function(response) {
            $('#edit_customer_id').val(response.customer_id);
            $('#edit_name').val(response.name);
            // Set other field values
            $('#editModal').modal('show');
        }
    });
}

function deleteRecord(customerId) {
    if(confirm('Are you sure you want to delete this record?')) {
        $.ajax({
            url: 'process/delete_deceased.php',
            type: 'POST',
            data: { customer_id: customerId },
            success: function(response) {
                if(response.trim() === 'success') {
                    // Add success message to session
                    var successAlert = '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                        'Record deleted successfully' +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>';
                    $('.container-fluid').prepend(successAlert);
                    
                    // Reload page after short delay
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    // Add error message to session
                    var errorAlert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                        'Error deleting record' +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>';
                    $('.container-fluid').prepend(errorAlert);
                }
            }
        });
    }
}

function viewDecease(customerId) {
    $.ajax({
        url: 'process/get_deceased.php',
        type: 'POST',
        data: { customer_id: customerId },
        success: function(response) {
            $('#viewDetails').html(response);
            $('#viewModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error("Error:", error);
            alert('Error loading details');
        }
    });
}

function closeViewModal() {
    // Remove the modal content
    $('#viewDetails').empty();
    
    // Hide the modal
    $('.modal').hide();
    
    // Or if you're using a specific modal ID
    $('#viewModal').hide();
    
    // Remove modal backdrop if exists
    $('.modal-backdrop').remove();
    
    // Enable scrolling on body
    $('body').removeClass('modal-open');
}

$(document).ready(function() {
    $('#deceaseTable').DataTable({
        "order": [[1, "desc"]],
        "pageLength": 10,
        "searching": true
    });

    // Handle close button click
    $('.btn-secondary').click(function() {
        $('#viewModal').modal('hide');
    });
    
    // Alternative close method
    $('.close').click(function() {
        $('#viewModal').modal('hide');
    });

    // Additional handler for the close button
    $('.btn-secondary, .close').on('click', function() {
        closeViewModal();
    });
});
</script>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/script.php'; ?>
</body>
</html>
