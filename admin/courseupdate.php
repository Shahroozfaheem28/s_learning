<?php
include('adminsession.php');
include('adminnav.php');
include('../database/connection.php');


if (isset($_POST['update']))  {
    // Retrieve course details from the form

    $courseId = $_POST['course_id'];
    $courseName = $_POST['course_name'];
    $courseDesc = $_POST['course_desc'];
    $courseAuthor = $_POST['course_author'];
    $courseDuration = $_POST['course_duration'];

    // Check if a file has been uploaded
    if (!empty($_FILES["course_image"]["tmp_name"])) {
        // Handle image upload
        $targetDirectory = "courseimages/"; // Adjust this directory path as needed
        $targetFile = $targetDirectory . basename($_FILES["course_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an image
        $check = getimagesize($_FILES["course_image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // ... Other image upload checks ...

        // If everything is ok, try to upload the file
        if (move_uploaded_file($_FILES["course_image"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["course_image"]["name"])) . " has been uploaded.";

            // Update the course in the database with the new image path
            $updateQuery = "UPDATE course 
                            SET 
                                course_name = '$courseName',
                                course_desc = '$courseDesc',
                                course_author = '$courseAuthor',
                                course_image = '$targetFile',
                                course_duration = '$courseDuration'
                            WHERE course_id = $courseId";

            $updateResult = mysqli_query($conn, $updateQuery);

            // Check for query execution errors
            if ($updateResult) {
                // Redirect to the course list or a success page
                header("Location: courseveiw.php");
                exit();
            } else {
                echo "Update failed: " . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // If no new image is uploaded, update the course without changing the image
        $updateQuery = "UPDATE course 
                        SET 
                            course_name = '$courseName',
                            course_desc = '$courseDesc',
                            course_author = '$courseAuthor',
                            course_duration = '$courseDuration'
                        WHERE course_id = $courseId";

        $updateResult = mysqli_query($conn, $updateQuery);

        // Check for query execution errors
        if ($updateResult) {
            // Redirect to the course list or a success page
            header("Location: courseview.php");
            exit();
        } else {
            echo "Update failed: " . mysqli_error($conn);
        }
    }
}
//Select data from the data base for update
if (isset($_GET['id'])) {
    $courseId = $_GET['id'];

    // Retrieve the course details based on the course_id
    $selectQuery = "SELECT * FROM course WHERE course_id = $courseId";
    $result = mysqli_query($conn, $selectQuery);

    if ($row = mysqli_fetch_assoc($result)) {
        // Course details found, you can use them to pre-fill the form
        $courseName = $row['course_name'];
        $courseDesc = $row['course_desc'];
        $courseAuthor = $row['course_author'];
        $courseImage = $row['course_image'];
        $courseDuration = $row['course_duration'];
    } else {
        // Course not found, handle this case as needed
        echo "Course not found!";
        exit;
    }
} else {
    // Course ID not provided in the URL, handle this case as needed
    echo "Course ID not provided!";
    exit;
}
?>

<div class="container bg-light">
    <h2 class="mb-0 bg-dark text-white p-3 mb-3">Update Course</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="course_id" value="<?php echo $courseId; ?>">

        <div class="form-group mb-3">
            <label for="course_name" class="form-label">Course Name:</label>
            <input type="text" class="form-control" name="course_name" value="<?php echo $courseName; ?>" required>
        </div>

        <div class="form-group mb-3">
            <label for="course_desc" class="form-label">Description:</label>
            <textarea class="form-control" name="course_desc" required><?php echo $courseDesc; ?></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="course_author" class="form-label">Author:</label>
            <input type="text" class="form-control" name="course_author" value="<?php echo $courseAuthor; ?>" required>
        </div>

        <div class="form-group mb-3">
            <label for="course_image" class="form-label">Current Course Image:</label>
            <img src="<?php echo $courseImage; ?>" alt="Course Image" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
        </div>
        

        <div class="form-group mb-3">
            <label for="course_image" class="form-label">Course Image:</label>
            <input type="file" class="form-control" name="course_image">
        </div>

        <div class="form-group mb-3">
            <label for="course_duration" class="form-label">Duration (In Days):</label>
            <input type="text" class="form-control" name="course_duration" value="<?php echo $courseDuration; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary" name="update">Update Course</button>
    </form>
</div>

