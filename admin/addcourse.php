<?php
 include('adminsession.php');
include('adminnav.php')

 ?>


<div class="container mt-5">
    <h2>Course Information</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="courseName">Course Name:</label>
            <input type="text" class="form-control" id="courseName" name="courseName" required>
        </div>
        <div class="form-group">
            <label for="courseDesc">Course Description:</label>
            <textarea class="form-control" id="courseDesc" name="courseDesc" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="courseAuthor">Course Author:</label>
            <input type="text" class="form-control" id="courseAuthor" name="courseAuthor" required>
        </div>
        <div class="form-group">
            <label for="courseImage">Course Image:</label>
            <input type="file" class="form-control" id="courseImage" name="courseImage" required>
        </div>
        <div class="form-group">
            <label for="courseDuration">Course Duration (e.g., 30 Days):</label>
            <input type="text" class="form-control" id="courseDuration" name="courseDuration" required>
        </div>
       <br>
        <button type="submit" class="btn btn-primary float-end" name="add">Submit</button>
    </form>
</div>



<!----start php code--->
<?php
include('../database/connection.php');

if (isset($_POST['add'])) {
    $courseName = $_POST['courseName'];
    $courseDesc = $_POST['courseDesc'];
    $courseAuthor = $_POST['courseAuthor'];

    // Check if the file was uploaded successfully
    if (isset($_FILES['courseImage']) && $_FILES['courseImage']['error'] === UPLOAD_ERR_OK) {
        $courseImage = $_FILES['courseImage']['name'];
        $tmpFilePath = $_FILES['courseImage']['tmp_name'];

        // Specify the folder to store uploaded files
        $targetFolder = "courseimages/";

        // Create the folder if it doesn't exist
        if (!file_exists($targetFolder)) {
            mkdir($targetFolder, 0755, true);
        }

        // Specify the target path for the uploaded file
        $targetPath = $targetFolder . $courseImage;

        // Move the uploaded file to the target path
        if (move_uploaded_file($tmpFilePath, $targetPath)) {
            $courseDuration = $_POST['courseDuration'];
          

            // Assuming you have a database table named 'courses'
            $insertQuery = "INSERT INTO course (course_name, course_desc, course_author, course_image, course_duration) VALUES ('$courseName', '$courseDesc', '$courseAuthor', 'courseimages/$courseImage', '$courseDuration')";
            
            $result = mysqli_query($conn, $insertQuery);

            if ($result) {
                // Display a success message using JavaScript alert
                echo '<script>alert("Course added successfully.");</script>';
            } else {
                // Display an error message using JavaScript alert
                echo '<script>alert("Error adding course: ' . mysqli_error($conn) . '");</script>';
            }
        } else {
            // Display an error message using JavaScript alert
            echo '<script>alert("Error uploading file.");</script>';
        }
    } else {
        // Display an error message using JavaScript alert
        echo '<script>alert("Error: File not uploaded or upload error.");</script>';
    }
}
?>