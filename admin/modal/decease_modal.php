<!-- Add Decease Modal -->
<div class="modal fade" id="addDeceaseModal" tabindex="-1" role="dialog" aria-labelledby="addDeceaseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDeceaseModalLabel">Add New Deceased Record</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="model/decease_add.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Full Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="date_of_death" class="col-form-label">Date of Death:</label>
                        <input type="date" class="form-control" id="date_of_death" name="date_of_death" required>
                    </div>
                    <div class="form-group">
                        <label for="plot_id" class="col-form-label">Plot Number:</label>
                        <select class="form-control" id="plot_id" name="plot_id" required>
                            <option value="">Select Plot</option>
                            <?php
                            $sql = "SELECT id FROM plot WHERE status = 'Available' ORDER BY id";
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                                echo "<option value='".$row['id']."'>Plot ".$row['id']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cause_of_death" class="col-form-label">Cause of Death:</label>
                        <input type="text" class="form-control" id="cause_of_death" name="cause_of_death" required>
                    </div>
                    <div class="form-group">
                        <label for="next_of_kin" class="col-form-label">Next of Kin:</label>
                        <input type="text" class="form-control" id="next_of_kin" name="next_of_kin" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save Record</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Decease Modal -->
<div class="modal fade" id="editDeceaseModal" tabindex="-1" role="dialog" aria-labelledby="editDeceaseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDeceaseModalLabel">Edit Deceased Record</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="model/decease_edit.php" method="POST">
                <input type="hidden" id="edit_id" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_name" class="col-form-label">Full Name:</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_date_of_death" class="col-form-label">Date of Death:</label>
                        <input type="date" class="form-control" id="edit_date_of_death" name="date_of_death" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_plot_id" class="col-form-label">Plot Number:</label>
                        <select class="form-control" id="edit_plot_id" name="plot_id" required>
                            <?php
                            $sql = "SELECT id FROM plot ORDER BY id";
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                                echo "<option value='".$row['id']."'>Plot ".$row['id']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_cause_of_death" class="col-form-label">Cause of Death:</label>
                        <input type="text" class="form-control" id="edit_cause_of_death" name="cause_of_death" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_next_of_kin" class="col-form-label">Next of Kin:</label>
                        <input type="text" class="form-control" id="edit_next_of_kin" name="next_of_kin" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Update Record</button>
                </div>
            </form>
        </div>
    </div>
</div> 