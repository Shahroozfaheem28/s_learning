<?php
include('adminsession.php');
include('adminnav.php');
include('../database/connection.php');

// Get the lesson ID from the URL parameter
if(isset($_GET['id']))
$leasonId = $_GET['id'];

// Retrieve the existing lesson information
$query = "SELECT * FROM leason WHERE leason_id = '$leasonId'";
$result = mysqli_query($conn, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $courseId = $row['course_id'];
        $courseName = $row['course_name'];
        $leasonName = $row['leason_name'];
        $leasonDesc = $row['leason_desc'];
        $currentVideoPath = $row['leason_ved'];
    } else {
        echo "Lesson not found.";
    }
} else {
    echo "Error fetching lesson: " . mysqli_error($conn);
}
?>

<div class="container mt-5">
    <h2>Edit Lesson</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="leason_id" value="<?php echo $leasonId; ?>">

            <label for="courseId">Course ID:</label>
            <input type="text" class="form-control" id="courseId" name="courseId" value="<?php echo $courseId; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="courseName">Course Name:</label>
            <input type="text" class="form-control" id="courseName" name="courseName" value="<?php echo $courseName; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="leasonName">Leason Name:</label>
            <input type="text" class="form-control" id="leasonName" name="leasonName" value="<?php echo $leasonName; ?>" required>
        </div>
        <div class="form-group">
            <label for="leasonDesc">Leason Description:</label>
            <textarea class="form-control" id="leasonDesc" name="leasonDesc" rows="3" required><?php echo $leasonDesc; ?></textarea>
        </div>
        <div class="form-group">
            <label for="lessonVideo">Leason Video:</label>
            <input type="file" class="form-control" id="leasonVideo" name="leasonVideo" accept="video/*">
            <p>Current Video: <?php echo $currentVideoPath; ?></p>
        </div>
        <button type="submit" class="btn btn-primary float-end" name="update">Update</button>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $leasonId = $_POST['leason_id'];
    $leasonName = $_POST['leasonName'];
    $leasonDesc = $_POST['leasonDesc'];

    // Handle video file upload
    if (isset($_FILES['leasonVideo']) && $_FILES['leasonVideo']['error'] === UPLOAD_ERR_OK) {
        $leasonVideo = $_FILES['leasonVideo']['name'];
        $tmpFilePath = $_FILES['leasonVideo']['tmp_name'];

        $targetFolder = "leasonvideos/";

        if (!file_exists($targetFolder)) {
            mkdir($targetFolder, 0755, true);
        }

        $targetPath = $targetFolder . $leasonVideo;

        if (move_uploaded_file($tmpFilePath, $targetPath)) {
            // Update the lesson record with the new video path
            $updateQuery = "UPDATE leason SET leason_name = '$leasonName', leason_desc = '$leasonDesc', leason_ved = '$targetPath' WHERE leason_id = '$leasonId'";
            $result = mysqli_query($conn, $updateQuery);

            if ($result) {
                echo "Lesson updated successfully.";
            } else {
                echo"Leason  does not Upload";
            }
        }
    }
}