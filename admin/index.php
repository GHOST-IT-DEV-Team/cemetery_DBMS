<?php include 'model/session.php'; ?>
<?php include 'model/conn.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidenav.php'; ?>
        <?php include 'includes/navbar.php'; ?>

<div class="container-fluid py-4">
    <div class="row">
        <!-- Admin Users Card -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Admin Users</p>
                                <?php
                                $sql = "SELECT COUNT(*) as admin_count FROM admin";
                                $query = $conn->query($sql);
                                $row = $query->fetch_assoc();
                                ?>
                                <h5 class="font-weight-bolder mb-0">
                                    <?php echo $row['admin_count']; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-lg">
                                <span class="material-symbols-outlined md-light" style="color: white;">manage_accounts</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Available Plots Card -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Available Plots</p>
                                <?php
                                $sql = "SELECT COUNT(*) as available_count FROM plot WHERE status = 'Available'";
                                $query = $conn->query($sql);
                                $row = $query->fetch_assoc();
                                ?>
                                <h5 class="font-weight-bolder mb-0">
                                    <?php echo $row['available_count']; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="icon icon-md icon-shape bg-gradient-success shadow-dark text-center border-radius-lg">
                                <span class="material-symbols-outlined md-light" style="color: white;">check_circle</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reserved Plots Card -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Reserved Plots</p>
                                <?php
                                $sql = "SELECT COUNT(*) as reserved_count FROM plot WHERE status = 'Reserve'";
                                $query = $conn->query($sql);
                                $row = $query->fetch_assoc();
                                ?>
                                <h5 class="font-weight-bolder mb-0">
                                    <?php echo $row['reserved_count']; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="icon icon-md icon-shape bg-gradient-warning shadow-warning text-center border-radius-lg">
                                <span class="material-symbols-outlined md-light" style="color: white;">bookmark</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Occupied Plots Card -->
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Occupied Plots</p>
                                <?php
                                $sql = "SELECT COUNT(*) as occupied_count FROM plot WHERE status = 'Occupied'";
                                $query = $conn->query($sql);
                                $row = $query->fetch_assoc();
                                ?>
                                <h5 class="font-weight-bolder mb-0">
                                    <?php echo $row['occupied_count']; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="icon icon-md icon-shape bg-gradient-danger shadow-danger text-center border-radius-lg">
                                <span class="material-symbols-outlined md-light" style="color: white;">home</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Second Row for Maintenance -->
    <div class="row mt-4">
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Under Maintenance</p>
                                <?php
                                $sql = "SELECT COUNT(*) as maintenance_count FROM plot WHERE status = 'Maintenance'";
                                $query = $conn->query($sql);
                                $row = $query->fetch_assoc();
                                ?>
                                <h5 class="font-weight-bolder mb-0">
                                    <?php echo $row['maintenance_count']; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="icon icon-md icon-shape bg-gradient-info shadow-info text-center border-radius-lg">
                                <span class="material-symbols-outlined md-light" style="color: white;">construction</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card .numbers {
    padding-top: 0.5rem;
}

.card .numbers p {
    color: #7b809a;
    margin-bottom: 6px;
    font-size: 0.875rem;
}

.card .numbers h5 {
    font-size: 1.5rem;
    line-height: 1.25;
    font-weight: 700;
    margin-bottom: 0;
}

.icon-shape {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 0.75rem;
}

.icon-md {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.material-symbols-outlined {
    font-size: 24px;
    line-height: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.material-symbols-outlined.md-light {
    color: white;
}

.bg-gradient-success {
    background: linear-gradient(195deg, #66BB6A, #43A047);
}

.bg-gradient-warning {
    background: linear-gradient(195deg, #FFA726, #FB8C00);
}

.bg-gradient-danger {
    background: linear-gradient(195deg, #EF5350, #E53935);
}

.bg-gradient-info {
    background: linear-gradient(195deg, #49a3f1, #1A73E8);
}
</style>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/script.php'; ?>