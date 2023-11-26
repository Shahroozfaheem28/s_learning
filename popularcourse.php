<?php
include('session.php');

include('database/connection.php');

// Fetch all courses from the database
$selectQuery = "SELECT * FROM course LIMIT 3";
$result = mysqli_query($conn, $selectQuery);

?>


<h2 class="text-center p-2">Popular Course</h2>
<div class="container">
    <div class="row">
        <?php
        // Loop through each row in the result set
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card">
                <img class="card-img-top" src="<?php echo $row['course_image']; ?>" alt="Card image">
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

    <!-- Second set of cards -->
    <?php
    $selectQuery = "SELECT * FROM course LIMIT 3, 3";
    $result = mysqli_query($conn, $selectQuery);
    ?>

    <div class="row">
        <?php
        // Loop through each row in the result set
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card">
                <img class="card-img-top" src="<?php echo $row['course_image']; ?>" alt="Card image">
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
</div>
