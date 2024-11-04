<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once 'model/conn.php';

if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
    header('location: login.php');
    exit();
}

// Redirect to change_password.php if password hasn't been changed
if(isset($_SESSION['password_change_required']) && 
   basename($_SERVER['PHP_SELF']) != 'change_password.php'){
    header('location: change_password.php');
    exit();
}
    
$sql = "SELECT * FROM admin WHERE id = '".$_SESSION['admin']."'";
$query = $conn->query($sql);
$user = $query->fetch_assoc();
?>  