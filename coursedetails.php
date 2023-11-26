<?php
session_start();

include('session.php');

include('maininclude/nav.php');
include('database/connection.php');

if (isset($_GET['id'])) {
    $enteredCourseId = $_GET['id'];

    $checkQuery = "SELECT * FROM course WHERE course_id = '$enteredCourseId'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        $row = mysqli_fetch_assoc($checkResult);

        // Set session variables
        $_SESSION['course_id'] = $row['course_id'];
        $_SESSION['course_name'] = $row['course_name'];
        $_SESSION['course_desc'] = $row['course_desc'];
        $_SESSION['course_author'] = $row['course_author'];
        $_SESSION['course_image'] = $row['course_image'];

        // Fetch lessons for the specified course ID
        $courseId = $_SESSION['course_id'];
        $query = "SELECT * FROM leason WHERE course_id = '$courseId'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Fetching lessons into an array for later use
            $lessons = [];
            while ($leasonRow = mysqli_fetch_assoc($result)) {
                $leasons[] = $leasonRow;
            }
        } else {
            echo "Error fetching lessons: " . mysqli_error($conn);
        }
    } else {
        echo '<div class="alert alert-primary" role="alert">Course not found</div>';
    }
}

mysqli_close($conn);
?>

<!-- The rest of your HTML code remains unchanged -->
<div class="container-fluid">
    <div class="row">
        <img src="image/course.jpg" alt="courses" style="height: 500px; width: 100%; object-fit: cover; box-shadow: 10px;">
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <img src="admin/<?php echo isset($_SESSION['course_image']) ? $_SESSION['course_image'] : ''; ?>" class="card-card-img-top" style="height: 200px; width: 350px; object-fit: cover;" alt="">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Course Name: <?php echo isset($_SESSION['course_name']) ? $_SESSION['course_name'] : ''; ?></h5>
                <p class="card-text"><?php echo isset($_SESSION['course_desc']) ? $_SESSION['course_desc'] : ''; ?></p>
                <form action="" method="post">
                    <p class="card-text fw-bold"><small>Author: <?php echo isset($_SESSION['course_author']) ? $_SESSION['course_author'] : ''; ?></small></p>
                </form>
            </div>
        </div>
    </div>
</div><br>

<div class="container">
    <h2 class="text-center p-5">Leason of:<?php echo isset($_SESSION['course_name']) ? $_SESSION['course_name'] : '';?>  </h2>
    <div class="row">
        <?php
        // Display lessons as cards
        if (isset($leasons) && is_array($leasons) && count($leasons) > 0) {
            foreach ($leasons as $leason) {
                ?>
                <div class="col-md-4 mb-4">
                
                <div class="card">
                <video width="100%" height="auto" controls>
                        <source src="admin/<?php echo $leason['leason_ved'] ?>" type="video/mp4">
                     
                        </video>
                <div class="card-body">
                <h5 class="card-title">Leason No:<?php echo $leason['leason_id']  ?> </h5>
                <p class="card-text">Leason Name: <?php echo  $leason['leason_name'] ?> </p>
                
                </div>
                </div>
                </div>

                <?php
            }
        } else {
            echo '<div class="col-md-12"><p>No lessons found</p></div>';
        }
        ?>
    </div>
</div>

<?php include('maininclude/footer.php'); ?>