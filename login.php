<?php include('maininclude/nav.php') ?>

<?php

    session_start();

include('database/connection.php');

if (isset($_POST['sub'])) {
    $email = $_POST['stuemail'];
    $pass = $_POST['stupass'];

    $qry = "SELECT * FROM studentreg WHERE email = '$email' AND password = '$pass'";
    $result = mysqli_query($conn, $qry);

    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['stu_login'] = true;
        $_SESSION['email'] = $email;

        header("Location: index.php");
        exit();
    } else {
        $error_message = "Invalid UserName and password";
    }
}

mysqli_close($conn);
?>

<!---- start vedio---->
<div class="container-fluid remove-vid-marg p-0">
    <div class="div-parent">
        <video playsinline autoplay muted loop>
            <source src="video/banvid.mp4">
        </video>
        <div class="vid-overlay">
        </div>
        <div class="vid-content">
            <!---- end vedio---->
            <!---registration Start---->
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-header">Student Login</h1><br>
                        <?php
                        if (isset($error_message)) {
                            echo '<p style="color: red;">' . $error_message . '</p>';
                        } ?>
                        <form action="" method="POST">


                            <div class="form-group text-start">
                                <label class="form-label fw-bold"> Email:</label>
                                <input type="email" class="form-control " name="stuemail" placeholder="Enter E-mail" required>
                            </div>

                            <!-- Add this checkbox in your form -->
                           

                            <!-- Your existing password input -->
                            <div class="form-group text-start">
                                <label class="form-label fw-bold">Password:</label>
                                <input type="password" class="form-control" name="stupass" id="passwordInput" placeholder="Enter Password" required>
                                <input class="form-check-input" type="checkbox" id="showPassword">
                                <label class="form-check-label" for="showPassword">Show Password</label>
                            </div><br>

                            <button type="submit" class="btn btn-primary float-end" name="sub">Login</button>
                            <br>

                        </form><br>
                        <div class="card-footer text-end fw-light">
                            <h9>
                                Create New Account. <a href="signup.php">Signup</a>
                            </h9><br>
                        </div>
                    </div>
                </div>
            </div>
            <!---registration end --->

        </div>
    </div>

</div>
<!---- end vedio---->
<?php
include('maininclude/footer.php')
?>