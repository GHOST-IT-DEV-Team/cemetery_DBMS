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
        <div class="h5 moon-fade">Mapping system</div>
        <div class="d-flex justify-content-end mt-4">
        </div>   
        <svg id="map" width="1110" height="400" style="border: 1px solid black;">
            <image href="../images/1.jfif" x="0" y="0" width="1110" height="450" />
            <!-- Example boxes -->
            <rect class="box" x="28" y="120" width="10" height="10" data-name="slot 1" data-details="<br> name: Adonis"></rect>
            <rect class="box" x="27" y="140" width="10" height="10" data-name="slot 2" data-details="<br> name: xynn"></rect>
            <rect class="box" x="26" y="160" width="10" height="10" data-name="slot 3" data-details="<br> name: kyla"></rect>
            <rect class="box" x="25" y="180" width="10" height="10" data-name="slot 4" data-details="<br> name: lou"></rect>

            <rect class="box" x="50" y="122" width="10" height="10" data-name="slot 5" data-details="<br> name: test1"></rect>
            <rect class="box" x="49" y="140" width="10" height="10" data-name="slot 6" data-details="<br> name: test2"></rect>
            <rect class="box" x="48" y="160" width="10" height="10" data-name="slot 7" data-details="<br> name: test3"></rect>
            <rect class="box" x="47" y="180" width="10" height="10" data-name="slot 8" data-details="<br> name: test4"></rect>

            <rect class="box" x="72" y="123" width="10" height="10" data-name="slot 9" data-details="<br> name: test5"></rect>
            <rect class="box" x="71" y="141" width="10" height="10" data-name="slot 10" data-details="<br> name: test6"></rect>
            <rect class="box" x="69" y="160" width="10" height="10" data-name="slot 11" data-details="<br> name: test7"></rect>
            <rect class="box" x="69" y="180" width="10" height="10" data-name="slot 12" data-details="<br> name: test8"></rect>
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