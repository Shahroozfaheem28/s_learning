<?php
include('adminsession.php');
include('../database/connection.php');

if (isset($_GET['id'])) {
    $courseId = $_GET['id'];

    // Delete the course from the database
    $deleteQuery = "DELETE FROM course WHERE course_id = $courseId";

    if (mysqli_query($conn, $deleteQuery)) {
        ?>
             <div class="alert alert-warning alert-dismissible fade show" role="alert">
             Delete successful!
             
             </div>
             
             <?php
        header("Location: courseveiw.php");
    } else {
        // Handle deletion failure
        echo "Error deleting course: " . mysqli_error($conn);
    }
} else {
    // Course ID not provided in the URL, handle this case as needed
    echo "Course ID not provided!";
    exit;
}
?>
