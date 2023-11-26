<?php
include('adminsession.php');
include('adminnav.php');
include('../database/connection.php');

?>

<div class="container mt-5">
    <h2>Lesson Information</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <input type="hidden" name="course_id" value="<?php echo $row['leason_id']; ?>">

            <label for="courseId">Course ID:</label>
            <input type="text" class="form-control" id="courseId" name="courseId" value="<?php echo isset($_SESSION['course_id']) ? $_SESSION['course_id'] : ''; ?>" disabled>
            <!-- Hidden field for course ID -->
            <input type="hidden" name="courseIdHidden" value="<?php echo isset($_SESSION['course_id']) ? $_SESSION['course_id'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="courseName">Course Name:</label>
            <input type="text" class="form-control" id="courseName" name="courseName" value="<?php echo isset($_SESSION['course_name']) ? $_SESSION['course_name'] : ''; ?>" disabled>
            <!-- Hidden field for course name -->
            <input type="hidden" name="courseNameHidden" value="<?php echo isset($_SESSION['course_name']) ? $_SESSION['course_name'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="leasonName">Leason Name:</label>
            <input type="text" class="form-control" id="leasonName" name="leasonName" required>
        </div>
        <div class="form-group">
            <label for="leasonDesc">Leason Description:</label>
            <textarea class="form-control" id="leasonDesc" name="leasonDesc" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="lessonVideo">Leason Video:</label>
            <input type="file" class="form-control" id="leasonVideo" name="leasonVideo" accept="video/*" required>
        </div>
        <button type="submit" class="btn btn-primary float-end" name="add">Submit</button>
    </form>
</div>

<?php


if (isset($_POST['add'])) {
    $courseId = $_POST['courseIdHidden'];
    $courseName = $_POST['courseNameHidden'];
    $leasonName = $_POST['leasonName'];
    $leasonDesc = $_POST['leasonDesc'];

    // Check if the video file was uploaded successfully
    if (isset($_FILES['leasonVideo']) && $_FILES['leasonVideo']['error'] === UPLOAD_ERR_OK) {
        $leasonVideo = $_FILES['leasonVideo']['name'];
        $tmpFilePath = $_FILES['leasonVideo']['tmp_name'];

        // Specify the folder to store uploaded videos
        $targetFolder = "leasonvideos/";

        // Create the folder if it doesn't exist
        if (!file_exists($targetFolder)) {
            mkdir($targetFolder, 0755, true);
        }

        // Specify the target path for the uploaded video
        $targetPath = $targetFolder . $leasonVideo;

        // Move the uploaded video file to the target path
        if (move_uploaded_file($tmpFilePath, $targetPath)) {
            // Insert data into the database with the video file path
            $insertQuery = "INSERT INTO leason (leason_name, leason_desc, leason_ved, course_id, course_name) VALUES ('$leasonName', '$leasonDesc', '$targetPath', '$courseId', '$courseName')";

            $result = mysqli_query($conn, $insertQuery);

            if ($result) {
                echo "Lesson added successfully.";
            } else {
                echo "Error adding lesson: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading video file.";
        }
    } else {
        echo "Error: Video file not uploaded or upload error.";
    }
}
?>
