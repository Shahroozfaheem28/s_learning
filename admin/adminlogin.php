<?php
session_start(); // Start the session

include('adminnav.php');
include('../database/connection.php');

if (isset($_POST['adsub'])) {
    $email = $_POST['adminemail'];
    $pass = $_POST['password'];

    $qry = "SELECT * FROM admin WHERE admin_email= '$email' AND admin_pass= '$pass' ";

    $result = mysqli_query($conn, $qry);

    if (mysqli_num_rows($result) > 0) {
        // Set session variables
        $_SESSION['admin_id'] = true;
        $_SESSION['admin_email'] =  $email;

        // Redirect to the admin dashboard
        header("Location: admindashboard.php");
        // Ensure that the script stops execution after the header is sent
        exit();
    } else {
        $error_message = "Login Failed: Please Enter Correct Email and Password!";
    }
}

mysqli_close($conn);
?>

    <!-- Start video -->
    <div class="container-fluid remove-vid-marg p-0">
        <div class="div-parent">
            <video playsinline autoplay muted loop>
                <source src="video/banvid.mp4">
            </video>
            <div class="vid-overlay">
            </div>
            <div class="vid-content">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center">Admin Login</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($success_message)) {
                                        echo '<p style="color: green;">' . $success_message . '</p>';
                                    } elseif (isset($error_message)) {
                                        echo '<p style="color: red;">' . $error_message . '</p>';
                                    }
                                    ?>
                                    <form action="" method="POST">
                                        <div class="form-group text-start">
                                            <label class="form-label fw-bold">Email</label>
                                            <input type="email" class="form-control" id="email" name="adminemail"
                                                placeholder="Enter email" required>
                                        </div>
                                        <div class="form-group text-start">
                                            <label class="form-label fw-bold">Password:</label>
                                            <input type="password" class="form-control" name="password"
                                                id="passwordInput" placeholder="Enter New Password" required>

                                            <input class="form-check-input" type="checkbox" id="showPassword">
                                            <label class="form-check-label" for="showPassword">Show Password</label>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary float-end " name="adsub">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End video -->

    <?php include('adminfooter.php') ?>

    <footer>
        <div class="container-fluid bg-dark text-center p-2">
            <small class="text-white">Copyright &copy; || Designed By S-learnig </small> <a href="../index.php">Student Panel</a>
        </div>
    </footer>

