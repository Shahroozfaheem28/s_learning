<?php

include('maininclude/nav.php')
?>

<body>
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
                            <h1 class="card-header">Student Registration</h1><br>
                            <form action="#" method="POST">
                                <div class="form-group text-start">
                                    <label class="form-label fw-bold">Name:</label>
                                    <input type="text" class="form-control" name="stuname" placeholder="Enter Name" required>

                                </div>

                                <div class="form-group text-start">
                                    <label class="form-label fw-bold"> Email:</label>
                                    <input type="email" class="form-control " name="stuemail" placeholder="Enter E-mail" required>
                                </div>


                                <div class="form-group text-start">
                                    <label class="form-label fw-bold">Password:</label>
                                    <input type="password" class="form-control  " name="stupass" placeholder="Enter New Password" required>
                                </div><br>

                                <button type="submit" class="btn btn-primary float-end" name="sub">Signup</button>
                                <br>

                            </form><br>
                            <div class="card-footer text-end fw-light">
                                <h9>
                                    Already have account ! <a href="login.php">Login</a>
                                    <span></span>
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







</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</html>
<?php
include('database/connection.php');

if (isset($_POST['sub'])) {

    $sturegname = $_POST['stuname'];
    $sturegemail = $_POST['stuemail'];
    $sturegpass = $_POST['stupass'];

    $checkEmailQuery = "SELECT * FROM studentreg WHERE email = '$sturegemail'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        // Email already exists
        echo "<script>alert('Error: Email already exists.');</script>";
    } else {



        $qry = "INSERT INTO  studentreg (name, email, password) VALUES ('$sturegname', '$sturegemail', '$sturegpass')";
        $result = mysqli_query($conn, $qry);

        if ($result) {
            echo "<script>alert('Registration Successfully.');</script>";
            header("Locataion: login.php");
        } else {
            echo "<script>alert('Can not registared');</script>";
        }
        mysqli_close($conn);
    }
}
include('maininclude/footer.php');
?>