<?php
session_start();
include('../session.php');
include('../database/connection.php');



if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT img FROM studentreg WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful and returned a row
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stu_img = $row['img'];
    } else {
       
        $stu_img = "default_image.jpg"; 
    }
}
    ?>
<!DOCTYPE html>
<html>

<head>
    <title>S-Learning</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


</head>


<body>
    <!---Top Navbar--->
    <nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470;">
        <a class="nabar-navbar mr-0" href="../index.php">S_learning</a>

    </nav><br>
    <!---side Navbar--->
   
            <nav class="navbar navbar-expand-sm bg-light ">
            <div class="container" >
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="studentprofile.php" class="nav-link">
                                <i class="material-symbols-outlined">
                                    person
                                </i>
                                Profile <span class="sr-only">(Current)</span>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="stufeedback.php" class="nav-link">
                                <i class="material-symbols-outlined">
                                    <span class="material-symbols-outlined">
                                        rate_review
                                    </span>
                                </i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="stuchangepass.php" class="nav-link">
                                <i class="material-symbols-outlined">
                                    <span class="material-symbols-outlined">
                                        key
                                    </span>
                                </i>
                                Changr Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">
                                <i class="material-symbols-outlined">
                                    <span class="material-symbols-outlined">
                                       Logout
                                    </span>
                                </i>
                                Logout
                            </a>
                        </li>
                    </ul>
                    
                    </ul>
                </div>
            </nav>
            <div class="sidebar-sticky">
                   
                       
            <img src="../stuimage/<?php echo $stu_img ?>" alt="image" style="width: 100px; height: 100px;" class="img-thumbnail rounded-circle">

                        
            </div>
      
</body>

</html>