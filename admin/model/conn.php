<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "loyola_memorial_park";

try {
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Set charset to handle special characters
    $conn->set_charset("utf8mb4");
    
    // Enable error reporting
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
} catch (Exception $e) {
    die("Database connection error: " . $e->getMessage());
}
?>