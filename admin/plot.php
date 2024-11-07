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
            
            <div class="card-body overflow-x-auto">
                <style>
                    .plot-container {
                        width: 100%;
                        height: 0;
                        padding-bottom: 75%; /* 4:3 Aspect Ratio */
                        position: relative;
                    }
                    
                    .plot-container svg {
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                    }
                    
                    .plot {
                        transition: opacity 0.3s;
                        cursor: pointer;
                    }
                    .plot:hover {
                        opacity: 0.8;
                    }
                    .legend {
                        display: flex;
                        flex-wrap: wrap;
                        gap: 20px;
                        margin-top: 20px;
                        justify-content: center;
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

                <div class="plot-container">
                    <svg viewBox="0 0 800 600" preserveAspectRatio="xMidYMid meet">
                        <g id="plots"></g>
                    </svg>
                </div>

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
                        $sql = "SELECT * FROM plot ORDER BY details";
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

<?php include 'modal/plot.php'; ?>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/script.php'; ?>