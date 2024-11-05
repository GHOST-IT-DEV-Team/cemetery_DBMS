<?php include 'model/session.php'; ?>
<?php include 'model/conn.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidenav.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Mapping Page</title>
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
</head>
<body>
    <div class="container mt-5">
        <div class="h5 moon-fade d-flex align-items-center">
            <span class="mr-2">Mapping system</span>
            <input type="text" class="form-control" placeholder="Search..." style="width: 200px; margin-left: 10px;">
            <button class="btn btn-primary ml-2" style="margin-top: 13px;">Search</button>
        </div>
        <svg id="map" width="1110" height="400" style="border: 1px solid black;">
            <image href="images/mappings.jpg" x="0" y="0" width="1110" height="450" />
            <?php
            // Fetch data from the database
            $query = "SELECT name, details, position_x AS x_position, position_y AS y_position, width, height FROM plots";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Output SVG boxes dynamically
                    echo '<rect class="box" data-name="' . htmlspecialchars($row['name']) . '" data-details="' . htmlspecialchars($row['details']) . '" x="' . $row['x_position'] . '" y="' . $row['y_position'] . '" width="' . $row['width'] . '" height="' . $row['height'] . '"></rect>';
                }
            } else {
                echo "No data found.";
            }
            ?>
        </svg>

        <div id="info" class="mt-4">
            <h2>Details</h2>
            <p id="detailsText">Click on a slot to see details.</p>
        </div>

        <?php include 'includes/footer.php'; ?>
        <?php include 'includes/script.php'; ?>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            // JavaScript to handle box clicks only
            document.querySelectorAll('.box').forEach(box => {
                box.addEventListener('click', function() {
                    const name = this.getAttribute('data-name');
                    const details = this.getAttribute('data-details');
                    document.getElementById('detailsText').innerHTML = `<strong>${name}</strong>: ${details}`;
                });
            });
        </script>
    </div>
</body>
</html>