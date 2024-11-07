<?php include 'model/session.php'; ?>
<?php include 'model/conn.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidenav.php'; ?>
<?php include 'includes/navbar.php'; ?>
    <style>
         .box {
            fill: lightblue;
            stroke: blue;
            stroke-width: 2;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .box:hover {
            fill: deepskyblue;
            stroke: darkblue;
            stroke-width: 3;
        }
    </style>
    <div class="container mt-5">
        <div class="h5 moon-fade d-flex align-items-center">
            <span class="mr-2">Mapping system</span>
            <input type="text" id="searchInput" class="form-control" placeholder="Search..." style="width: 200px; margin-left: 10px;">
            <button id="searchButton" class="btn btn-primary ml-2" style="margin-top: 13px;">Search</button>
        </div>
        <svg id="map" width="1110" height="400" style="border: 1px solid black;">
            <image href="images/mappings.jpg" x="0" y="0" width="1110" height="450" />
            <?php
            // Fetch data from the database
            $query = "SELECT box_id, name, details, position_x AS x_position, position_y AS y_position, width, height FROM plots";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Output SVG boxes dynamically with box_id
                    echo '<rect class="box" 
                        data-box-id="' . $row['box_id'] . '" 
                        data-name="' . htmlspecialchars($row['name']) . '" 
                        data-details="' . htmlspecialchars($row['details']) . '" 
                        x="' . $row['x_position'] . '" 
                        y="' . $row['y_position'] . '" 
                        width="' . $row['width'] . '" 
                        height="' . $row['height'] . '">
                    </rect>';
                }
            } else {
                echo "No data found.";
            }
            ?>
        </svg>

        <div id="info" class="mt-4">
            <h2>Details</h2>
            <p id="detailsText">search name to see details</details>.</p>
        </div>

        <?php include 'includes/footer.php'; ?>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            // Updated JavaScript to handle box clicks without showing box_id
            document.querySelectorAll('.box').forEach(box => {
                box.addEventListener('click', function() {
                    const name = this.getAttribute('data-name');
                    const details = this.getAttribute('data-details');
                    document.getElementById('detailsText').innerHTML = `<strong>${name}</strong>: ${details}`;
                });
            });
            document.getElementById('searchButton').addEventListener('click', async function() {
                const searchQuery = document.getElementById('searchInput').value.trim();
                if (searchQuery) {
                    try {
                        const response = await fetch(`search.php?query=${encodeURIComponent(searchQuery)}`);
                        const data = await response.json();
                        document.querySelectorAll('.box').forEach(box => {
                            box.style.fill = 'lightblue';
                        });

                        if (data.length > 0) {
                            let matchingDetails = [];
                            data.forEach(item => {
                                matchingDetails.push(`<strong>${item.name}</strong>: ${item.details}`);
                                
                                document.querySelectorAll('.box').forEach(box => {
                                    if (box.getAttribute('data-box-id') === item.box_id.toString()) {
                                        box.style.fill = 'yellow';
                                    }
                                });
                            });
                            document.getElementById('detailsText').innerHTML = matchingDetails.join('<br>');
                        } else {
                            document.getElementById('detailsText').innerHTML = 'No results found.';
                        }
                    } catch (error) {
                        console.error('Error fetching data:', error);
                        document.getElementById('detailsText').innerHTML = 'An error occurred while searching.';
                    }
                } else {
                    document.getElementById('detailsText').innerHTML = 'Please enter details to search.';
                }
            });
        </script>
        <?php include 'includes/script.php'; ?>
        
        
