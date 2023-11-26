<?php 
include('adminsession.php');
include('adminnav.php'); 
?>
<div class="container bg-light mt-5">
    <div class="container bg-black text-white">
        <h2>Add New Student</h2>
    </div>

    <?php
    // Initialize $errors as an empty array
    $errors = array();

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Your form processing logic here
        // ...

        // Example validation
        if (empty($_POST['name'])) {
            $errors['name'] = "Name is required";
        }

        if (empty($_POST['email'])) {
            $errors['email'] = "Email is required";
        }

        // Repeat this for other fields...

        if (empty($_POST['pass'])) {
            $errors['pass'] = "Password is required";
        }

        // If there are no errors, proceed with processing the form data
        if (empty($errors)) {
            // Your form processing logic here
            // ...

            // After successfully processing the form, you may redirect or display a success message
            // Example: header("Location: success.php");
        }
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <!-- Name Field -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
            <?php if (isset($errors['name'])) : ?>
                <small class="text-danger"><?php echo $errors['name']; ?></small>
            <?php endif; ?>
        </div>

        <!-- Email Field -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
            <?php if (isset($errors['email'])) : ?>
                <small class="text-danger"><?php echo $errors['email']; ?></small>
            <?php endif; ?>
        </div>

        <!-- Occupation Field -->
        <div class="form-group">
            <label for="occ">Occupation:</label>
            <input type="text" class="form-control" id="occ" name="occ" value="<?php echo isset($_POST['occ']) ? $_POST['occ'] : ''; ?>">
            <?php if (isset($errors['occ'])) : ?>
                <small class="text-danger"><?php echo $errors['occ']; ?></small>
            <?php endif; ?>
        </div>

        <!-- Image Field -->
        <div class="form-group">
            <label for="img">Image:</label>
            <input type="file" class="form-control" id="img" name="img" value="<?php echo isset($_POST['img']) ? $_POST['img'] : ''; ?>">
            <?php if (isset($errors['img'])) : ?>
                <small class="text-danger"><?php echo $errors['img']; ?></small>
            <?php endif; ?>
        </div>

        <!-- Password Field -->
        <div class="mb-3">
            <label for="pass" class="form-label">Password:</label>
            <input type="password" class="form-control" id="pass" name="pass" value="<?php echo isset($_POST['pass']) ? $_POST['pass'] : ''; ?>">
            <?php if (isset($errors['pass'])) : ?>
                <small class="text-danger"><?php echo $errors['pass']; ?></small>
            <?php endif; ?>
        </div>
        <br>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary float-end">Add Student</button>
    </form>
</div>

<?php
// Include your database connection file
include('../database/connection.php');

// Assuming you have variables containing form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
    $occ = isset($_POST['occ']) ? $_POST['occ'] : '';

    // Image handling
    $targetDirectory = "../stuimage/";
    $targetFile = $targetDirectory . basename($_FILES["img"]["name"]);

    // Check if the file already exists
    if (file_exists($targetDirectory . $_FILES["img"]["name"])) {
        echo "Sorry, file already exists.";
    } else {
        // Check if the file is a valid image
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if ($check !== false) {
            // Check file size
            if ($_FILES["img"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
            } else {
                // Allow certain file formats
                $allowedExtensions = array("jpg", "jpeg", "png", "gif");
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                if (!in_array($imageFileType, $allowedExtensions)) {
                    echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
                } else {
                    // Move the file to the target directory
                    if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
                        // SQL insert query
                        $insertQuery = "INSERT INTO studentreg (name, email, password, occ, img) VALUES ('$name', '$email', '$pass', '$occ', '$targetFile')";

                        // Execute the query
                        $result = mysqli_query($conn, $insertQuery);

                        // Check if the query was successful
                        if ($result) {
                            echo "Record inserted successfully!";
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
        } else {
            echo "File is not an image.";
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>
