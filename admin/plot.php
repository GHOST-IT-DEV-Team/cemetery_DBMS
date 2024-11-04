<?php include 'model/session.php'; ?>
<?php include 'model/conn.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidenav.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container">
    <div class="main-content">
        <div class="card my-4">
            <div class="d-flex justify-content-end px-4 pt-4">
                <button type="button" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#addPlotModal">
                    <i class="material-icons text-sm"></i> Add New Plot
                </button>
            </div>
            
            <div class="card-body">
                <style>
                    .plot {
                        transition: opacity 0.3s;
                        cursor: pointer;
                    }
                    .plot:hover {
                        opacity: 0.8;
                    }
                    .legend {
                        display: flex;
                        gap: 20px;
                        margin-top: 20px;
                    }
                    .legend-item {
                        display: flex;
                        align-items: center;
                        gap: 8px;
                    }
                    .legend-color {
                        width: 20px;
                        height: 20px;
                        border: 1px solid #333;
                    }
                </style>

                <svg viewBox="0 0 800 600" width="800" height="600">
                    <g id="plots"></g>
                </svg>

                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-color" style="background: #98FB98"></div>
                        <span>Available</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background: #FFB6C1"></div>
                        <span>Reserved</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background: #808080"></div>
                        <span>Occupied</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background: #87CEEB"></div>
                        <span>Maintenance</span>
                    </div>
                </div>

                <script>
                    const plotData = [
                        <?php
                        $sql = "SELECT * FROM plot ORDER BY id";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()){
                            echo "{id: " . $row['id'] . ", status: '" . strtolower($row['status']) . "'},";
                        }
                        ?>
                    ];

                    const statusColors = {
                        available: '#98FB98',
                        reserved: '#FFB6C1',
                        occupied: '#808080',
                        maintenance: '#87CEEB'
                    };

                    function createPlots() {
                        const plotsGroup = document.getElementById('plots');
                        const plotWidth = 65;
                        const plotHeight = 85;
                        const spacing = 8;
                        const plotsPerRow = 10;
                        
                        plotData.forEach((plot, i) => {
                            const row = Math.floor(i / plotsPerRow);
                            const col = i % plotsPerRow;
                            const x = col * (plotWidth + spacing) + 50;
                            const y = row * (plotHeight + spacing) + 50;
                            
                            const plotRect = document.createElementNS("http://www.w3.org/2000/svg", "rect");
                            
                            plotRect.setAttribute('x', x);
                            plotRect.setAttribute('y', y);
                            plotRect.setAttribute('width', plotWidth);
                            plotRect.setAttribute('height', plotHeight);
                            plotRect.setAttribute('fill', statusColors[plot.status]);
                            plotRect.setAttribute('stroke', '#333');
                            plotRect.setAttribute('class', 'plot');
                            plotRect.setAttribute('data-plot-number', plot.id);
                            plotRect.setAttribute('data-status', plot.status);
                            
                            plotRect.onclick = function() {
                                // Show edit modal instead of alert
                                document.getElementById('editPlotId').value = this.dataset.plotNumber;
                                document.getElementById('editPlotStatus').value = this.dataset.status;
                                new bootstrap.Modal(document.getElementById('editPlotModal')).show();
                            };
                            
                            plotsGroup.appendChild(plotRect);
                            
                            const text = document.createElementNS("http://www.w3.org/2000/svg", "text");
                            text.setAttribute('x', x + plotWidth/2);
                            text.setAttribute('y', y + plotHeight/2);
                            text.setAttribute('text-anchor', 'middle');
                            text.setAttribute('dominant-baseline', 'middle');
                            text.setAttribute('fill', '#333');
                            text.setAttribute('font-size', '14');
                            text.textContent = plot.id;
                            
                            plotsGroup.appendChild(text);
                        });
                    }

                    createPlots();
                </script>
            </div>
        </div>
    </div>
</div>

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

<?php include 'includes/footer.php'; ?>
<?php include 'includes/script.php'; ?>