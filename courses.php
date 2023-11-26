<?php
session_start(); 
include('session.php');
include('maininclude/nav.php');
include('database/connection.php');


// Fetch all courses from the database
$selectQuery = "SELECT * FROM course";
$result = mysqli_query($conn, $selectQuery);

?>
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="image/course.jpg" alt="courseimg"
            style="height: 500px; width: 100%; object-fit: cover; box-shadow: 10px;">
    </div>

</div>


<h2 class="text-center">All Course</h2>
<section class=" cards-wrapper d-flex gx-5 justify-content-between align-items-center h-100 min-vh-100 ">
<div class="container">
    <div class="row">
        <?php
        // Loop through each row in the result set
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card">
                <img class="card-img-top" src="admin/<?php echo $row['course_image'] ?>" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $row['course_name']; ?></h4>
                    <p class="card-text"><?php echo $row['course_desc']; ?></p>
                </div>
                <div class="card-footer">
                    <a href="coursedetails.php?id=<?php echo $row['course_id']; ?>" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>

    <br>
</section>