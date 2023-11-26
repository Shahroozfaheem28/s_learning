<?php
session_start(); // Start the session

// Check if the admin_id session variable is not set
if (!isset($_SESSION['admin_id'])) {
    // If the session variable is not set, redirect to the login page
    header("Location: adminlogin.php");
    exit();
}
?>