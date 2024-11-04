<?php
if (!extension_loaded('mysqli')) {
    dl('php_mysqli.dll'); // For Windows
    // dl('mysqli.so');   // For Linux
}

$conn = new mysqli('localhost', 'root', '', 'loyola_memorial_park');

if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    die("Connection failed: " . $conn->connect_error);
}
?>