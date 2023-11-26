<?php
include('stuheader.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $f_content = $_POST['f_content'];
    $id = $_POST['id'];

    // Insert data into the database
    $insertQuery = "INSERT INTO feedback (f_content, id) VALUES ('$f_content', '$id')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
       $success_message= "Feedback submitted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Select id and name from the reg table
$selectQuery = "SELECT id, name FROM studentreg WHERE email = '$_SESSION[email]'";
$result = mysqli_query($conn, $selectQuery);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $studentId = $row['id'];
    $studentName = $row['name'];
} else {
    echo "Error: " . mysqli_error($conn);
}
?>

<div class="container mt-5 bg-light">
    <h2 class="mb-4">Feedback Form</h2>
    <form action="" method="post">
    <?php
                        if (isset($success_message)) {
                            echo '<p style="color: success;">' . $success_message . '</p>';
                        } ?>
        <div class="mb-3">
            <label for="ID" class="form-label">Student ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $studentId; ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Student Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $studentName; ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="f_content" class="form-label">Feedback:</label>
            <textarea class="form-control" id="f_content" name="f_content" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Feedback</button>
    </form>
</div>
