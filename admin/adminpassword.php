<?php
include('adminsession.php');
include('../database/connection.php');
include('adminnav.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = $_POST['new_password'];
    $adminId = $_SESSION['admin_id'];

    // Update password
    $updateSql = "UPDATE admin SET admin_pass = '$newPassword' WHERE id = $adminId";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        $success_message = "Password updated successfully!";
    } else {
        $error_message = "Error updating password: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>


<div class="container mt-5">
    <h2>Change Password</h2>

    <?php
    // Display success or error messages if set
    if (isset($success_message)) {
        echo '<p style="color: green;">' . $success_message . '</p>';
    } elseif (isset($error_message)) {
        echo '<p style="color: red;">' . $error_message . '</p>';
    }
    ?>

    <form method="post" action="">
    <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['admin_email']; ?>" disabled>
            </div>
        <div class="form-group">

            <label for="new_password">New Password:</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Password</button>
    </form>
</div>

<!-- Add your additional content or HTML structure here -->

</body>
</html>
