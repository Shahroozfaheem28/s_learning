<?php



include('stuheader.php');





if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Handle form submission
        $newPassword = $_POST['new_password'];

        // Perform the update for the password
        $updateSql = "UPDATE studentreg SET password = '$newPassword' WHERE email = '$email'";
        $updateResult = mysqli_query($conn, $updateSql);

        if ($updateResult) {
            echo "Password updated successfully!";
        } else {
            echo "Error updating password: " . mysqli_error($conn);
        }
    }
} else {
    // Redirect or handle the case where the session variable is not set
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Change Password</title>
    <!-- Add your stylesheets or any other head elements here -->
</head>

<body>



    <div class="container mt-5">
        <h2>Change Password</h2>

        <form method="post" action="">
            <div class="form-group">
                <label for="email"><h5><i class="material-symbols-outlined">mail</i>Email:</h5></label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="new_password"><h5><i class="material-symbols-outlined">key</i>New Password:</h5></label>
                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Add new Password" required>
            </div><br>
            <button type="submit" class="btn btn-primary btn-sm float-end">Update Password</button>
        </form>
    </div>

    <!-- Add your additional content or HTML structure here -->

</body>

</html>