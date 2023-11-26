<?php 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/adminstyle.css">
  <link rel="stylesheet" href="../css/style.css">
  <title>Admin</title>
</head>

<body>



  <title>Admin</title>
  </head>

  <body>
    <nav class="navbar navbar-dark bg-dark fixed-top p-0 shadow">
      <div class="container-fluid">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="admindashboard.php">S_Learning <small>Admin Panel</small></a>
      </div>
    </nav><br><br>


    <!--Main Navigation-->

    <!-- Sidebar -->
    <nav class="navbar navbar-expand-sm  bg-secondary   pl-5">
      <div class="container">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item active navlink">
              <a href="admindashboard.php" class="nav-link navlink">
                Dashboard
              </a>
            </li>
            <li class="nav-item active navlink">

              <a href="courseveiw.php" class="nav-link navlink">
                Course
              </a>
            </li>
            <li class="nav-item active navlink">
              <a href="leasonveiw.php" class="nav-link navlink">
                Lesson
              </a>
            </li>
            <li class="nav-item active navlink">
              <a href="studentveiw.php" class="nav-link navlink">
                Students
              </a>
            </li>
            <li class="nav-item active navlink">
              <a href="feedback.php" class="nav-link navlink">
                Feedback
              </a>
            </li>
            <li class="nav-item active navlink">
              <a href="adminpassword.php" class="nav-link navlink">
                Change Password
              </a>
            </li>
          </ul>
          <div>
            <?php
              
            if (isset($_SESSION['admin_id'])) {
              echo '<li class="nav-item active navlink  bg-danger">
          <a class="nav-link navlink" href="adminlogout.php">Logout</a>
        </li>';
            } else {
              
            }
            ?>

          </div>
        </div>
    </nav>

   
  </body>

</html>