<?php


include('stuheader.php');


if (isset($_SESSION['email'])) {
    $stuemail = $_SESSION['email'];
    $sql = "SELECT * FROM studentreg WHERE email = '$stuemail'";
    $result = mysqli_query($conn, $sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Error: Unable to fetch student data.";
        exit();
    }
} else {
    // Redirect or handle the case where the session variable is not set
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
  
    $name = $_POST['name'];
    $newEmail = $_POST['email'];
    $password = $_POST['password'];
    $occ = $_POST['occ'];

    // Check if a new image is uploaded
    if ($_FILES['img']['error'] == 0) {
        $img = $_FILES['img']['name'];
        $img_temp = $_FILES['img']['tmp_name'];
        move_uploaded_file($img_temp, "stuimg/" . $img);
    } else {
        // Use the existing image if no new image is uploaded
        $img = $row['img'];
    }

    // Perform the update
    $updateSql = "UPDATE studentreg SET name = '$name', email = '$newEmail', password = '$password', occ = '$occ', img = '$img' WHERE email = '$stuemail'";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        echo "Update successful!";
        // Update the session variable if the email was changed
        $_SESSION['email'] = $newEmail;
    } else {
        echo "Error updating student information: " . mysqli_error($conn);
    }
}
?>

<div class="container mt-5">
    <h2>Update Student Information</h2>
    <form method="POST" action="" enctype="multipart/form-data">
    
    <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" disabled required>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
        </div>
       
        <div class="form-group">
            <label for="occ">Occupation:</label>
            <input type="text" class="form-control" id="occ" name="occ" value="<?php echo $row['occ']; ?>" required>
        </div>
        <div class="form-group">
            <label for="img">Profile Image:</label>
            <input type="file" class="form-control-file" id="img" name="img">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

