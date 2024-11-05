<?php include 'model/conn.php'; ?>
<?php include 'model/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidenav.php'; ?>
<?php include 'includes/navbar.php'; ?>
<div class="container-fluid py-4">
    <?php if(isset($_GET['success'])): ?>
    <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
        <span class="alert-icon align-middle">
          <span class="material-icons text-md"></span>
        </span>
        <span class="alert-text">Admin user added successfully!</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    
    <?php if(isset($_GET['error'])): ?>
    <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
        <span class="alert-icon align-middle">
            <span class="material-icons text-md">error</span>
        </span>
        <span class="alert-text">
            <?php 
                switch($_GET['error']) {
                    case '1':
                        echo 'Username already exists!';
                        break;
                    case '2':
                        echo 'Passwords do not match!';
                        break;
                    case '3':
                        echo 'Error adding admin. Please try again.';
                        break;
                    default:
                        echo 'An unknown error occurred.';
                }
            ?>
        </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="d-flex justify-content-end px-4 pt-4">
                    <button type="button" class="btn bg-gradient-success btn-sm mb-0 me-2" onclick="exportTableToExcel('admin-table', 'admin_users')">
                        <i class="material-icons text-sm"></i> Export
                    </button>
                    <button type="button" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#addAdminModal">
                        <i class="material-icons text-sm"></i> Add New Admin
                    </button>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="admin-table">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date-Added</th>
                                    <th class="text-secondary opacity-7">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sql = "SELECT * FROM admin";
                                $query = $conn->query($sql);
                                while($row = $query->fetch_assoc()){
                                    echo "<tr>
                                        <td>
                                            <div class='d-flex px-2 py-1'>
                                                <div class='d-flex flex-column justify-content-center'>
                                                    <h6 class='mb-0 text-sm'>{$row['id']}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class='text-xs font-weight-bold mb-0'>{$row['username']}</p>
                                        </td>
                                        <td>
                                            <p class='text-xs font-weight-bold mb-0'>{$row['name']}</p>
                                        </td>
                                        <td>
                                            <p class='text-xs font-weight-bold mb-0'>{$row['email']}</p>
                                        </td>
                                        <td>
                                            <span class='text-secondary text-xs font-weight-bold'>{$row['date_added']}</span>
                                        </td>
                                        <td class='align-middle'>
                                            <div class='dropdown'>
                                                <button class='btn btn-link text-secondary mb-0' type='button' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <span class='material-symbols-rounded'>more_vert</span>
                                                </button>
                                                <ul class='dropdown-menu'>
                                                    <li><a class='dropdown-item text-secondary font-weight-normal text-xs' data-bs-toggle='modal' data-bs-target='#addAdminModal'>Edit</a></li>
                                                    <li><a class='dropdown-item text-secondary font-weight-normal text-xs' href='#'>Delete</a></li>
                                                </ul>
                                            </div>
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

<!-- Add Admin Modal -->
<?php include 'modal/admin_add.php'; ?>

<script>
// Function to load admin data
async function loadAdminData() {
    try {
        const response = await fetch('model/get_admins.php');
        const data = await response.json();
        
        const tableBody = document.querySelector('#adminTableBody');
        tableBody.innerHTML = ''; // Clear existing data

        data.forEach(admin => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">${admin.username}</h6>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">${admin.name}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">${admin.email}</p>
                </td>
                <td>
                    <span class="text-secondary text-xs font-weight-bold">
                        ${new Date(admin.date_added).toLocaleDateString()}
                    </span>
                </td>
                <td class="align-middle">
                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs" 
                       onclick="editAdmin(${admin.id})" data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                    </a>
                </td>
            `;
            tableBody.appendChild(row);
        });
    } catch (error) {
        console.error('Error loading admin data:', error);
    }
}

// Handle form submission
document.getElementById('addAdminForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    
    try {
        const response = await fetch('model/admin_add.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if(result.success) {
            // Close modal and reload data
            bootstrap.Modal.getInstance(document.getElementById('addAdminModal')).hide();
            loadAdminData();
            // Show success message
            alert('Admin added successfully!');
        } else {
            alert(result.message || 'Error adding admin');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error adding admin');
    }
});

// Load data when page loads
window.onload = loadAdminData;
</script>

<!-- Excel Export Script -->
<script>
function exportTableToExcel(tableID, filename = '') {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    } else {
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>
<?php include 'includes/footer.php'; ?>
<?php include 'includes/script.php'; ?>