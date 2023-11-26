<?php
include('adminsession.php');
include('adminnav.php');
include('../database/connection.php');

// Check if lesson_id is provided in the URL
if (isset($_GET['id'])) {
    $lessonId = $_GET['id'];

    // Delete the lesson from the database
    $deleteQuery = "DELETE FROM leason WHERE leason_id = $lessonId";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        echo '<div class="alert alert-success" role="alert">Lesson deleted successfully!</div>';
        header("Location: leasonveiw.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">Error deleting lesson: ' . mysqli_error($conn) . '</div>';
    }
} else {
    echo '<div class="alert alert-danger" role="alert">Lesson ID not provided!</div>';
}
mysqli_close($conn);
