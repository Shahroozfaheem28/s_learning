<?php
// Start the session


// Check if the admin_id session variable is not set
if (!isset($_SESSION['stu_login'])) {
    // If the session variable is not set, redirect to the login page
    header("Location: login.php");
    exit();
}
?>