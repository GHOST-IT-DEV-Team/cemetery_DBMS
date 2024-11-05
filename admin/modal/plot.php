<!-- Add Plot Modal -->
<div class="modal fade" id="addPlotModal" tabindex="-1" aria-labelledby="addPlotModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPlotModalLabel">Add New Plot</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="model/plot_add.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="Available">Available</option>
                            <option value="Reserve">Reserve</option>
                            <option value="Occupied">Occupied</option>
                            <option value="Maintenance">Maintenance</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Plot</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Plot Modal -->
<div class="modal fade" id="editPlotModal" tabindex="-1" aria-labelledby="editPlotModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPlotModalLabel">Edit Plot</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="model/plot_edit.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="editPlotId" name="plot_id">
                    <div class="mb-3">
                        <label for="editPlotStatus" class="form-label">Status</label>
                        <select class="form-select" id="editPlotStatus" name="status" required>
                            <option value="Available">Available</option>
                            <option value="Reserve">Reserve</option>
                            <option value="Occupied">Occupied</option>
                            <option value="Maintenance">Maintenance</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>