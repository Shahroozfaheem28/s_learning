<?php


?>
<!DOCTYPE html>
<html>

<head>
  <title>S-Learning</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">

</head>

<body>

  <nav class="navbar navbar-expand-sm fixed-top bg-secondary   pl-5">
    <div class="container">
      <a class="navbar-brand na" href="index.php">S_Learning</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" />
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0">

          <li class="nav-item active navlink">
            <a class="nav-link navlink" href="courses.php"><span class="material-symbols-outlined">
                library_books
              </span>Course</a>
          </li>

          <li class="nav-item active navlink">
            <a class="nav-link navlink" href="contact.php"><span class="material-symbols-outlined">
                call
              </span>Contact</a>
          </li>
          <li class="nav-item active navlink">
            <a class="nav-link navlink" href="feedback.php"><span class="material-symbols-outlined">
                chat
              </span>Feedback</a>
          </li>
        </ul>
        <ul class="navbar-nav  mb-2 mb-lg-0">
          <?php
           
          if (isset($_SESSION['stu_login'])) {
           
            echo '
            <li class="nav-item active navlink">
              <a class="nav-link navlink" href="../S_learning/stuprofile/studentprofile.php"><span class="material-symbols-outlined">
                  account_circle
                </span>My Profile</a>
            </li>
            <li class="nav-item active navlink">
              <a class="nav-link navlink" href="logout.php"><span class="material-symbols-outlined">
                  logout
                </span><span>Logout</span> </a>
            </li>';
          } else {
            echo '
            <li class="nav-item active navlink">
              <a class="nav-link navlink" href="login.php"><span class="material-symbols-outlined">
                  login
                </span>Login</a>
            </li>
            <li class=" nav-item active navlink">
              <a class="nav-link navlink" href="signup.php"><span class="material-symbols-outlined">
                  person_add
                </span>Sign Up</a>
            </li>';
          }
          ?>
        </ul>

      </div>
    </div>
  </nav>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>

</html>
