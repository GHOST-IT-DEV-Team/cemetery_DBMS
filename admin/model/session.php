<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once 'model/conn.php';

// Basic session check
if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
    header('location:../admin/login.php');
    exit();
}

// Password change check
if(isset($_SESSION['password_change_required']) && 
   basename($_SERVER['PHP_SELF']) != 'change_password.php'){
    header('location: change_password.php');
    exit();
}
    
$sql = "SELECT * FROM admin WHERE id = '".$_SESSION['admin']."'";
$query = $conn->query($sql);
$user = $query->fetch_assoc();

// Permission check
$current_page = basename($_SERVER['PHP_SELF']);
$restricted_pages = [
    'adminuser.php' => ['admin'],
    'adminuser.php' => ['admin', 'manager'],
    'payment.sphp' => ['cashier', 'admin', 'manager'],
    'soa.php' => ['admin', 'manager', 'front_office'],
    // Add more page restrictions as needed
];

if (isset($restricted_pages[$current_page]) && 
    !in_array($user['account_type'], $restricted_pages[$current_page])) {
    header('location: index.php');
    exit();
}
?>  