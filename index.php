<?php include('maininclude/nav.php') ?>
<?php session_start();  ?>

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
                <h1>Welcome to the S-Learning </h1>
                <h4>learning and Implements</h4>
                <?php
                
                if (!isset($_SESSION['stu_login'])) {
                    
                    echo '<a class="btn btn-danger" href="signup.php">Get Strat</a>';
                    exit();
                } else {
                    echo '<a class="btn btn-danger" href="../S_learning/stuprofile/studentprofile.php">My Profile</a>';
                    
                }
                ?>

            </div>
        </div>

    </div>
    <!---- end vedio---->

    <!---- start info bar---->
    <div class="container-fluid bg-danger txtbaner">
        <div class="row bottom-banner">
            <div class="col-sm">
                <h5> </i>100+ Online Courses</i></h5>
            </div>
            <div class="col-sm">
                <h5> Expert Instructors</i></h5>
            </div>
            <div class="col-sm">
                <h5>Well Explaned</i></h5>
            </div>
            <div class="col-sm">
                <h5> <i class="fa-solid fa-book">Fully Helpfull</i></h5>
            </div>

        </div>
    </div>
    <!---- end info bar---->





    <!---- start popularcourse including file---->
    <?php
    include('popularcourse.php');

    ?>
    <!---- start contact---->
   
    <!---- end contact---->
  <!---- start Feddback---->
  <?php
    include('feedback.php');
    ?>
    <!---- end Feedback---->
   
    <!---- start footer including file---->
    <?php
    include('maininclude/footer.php');
    ?>
   
  
    
   
    

 








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>