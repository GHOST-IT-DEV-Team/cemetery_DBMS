<?php
$servername = "localhost";
$username = "root";  // your database username
$password = "";      // your database password
$dbname = "loyola_memorial_park";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 