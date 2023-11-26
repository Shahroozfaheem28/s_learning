<?php
include('adminsession.php');

include('adminnav.php');
include('../database/connection.php');
?>
<div class="container text-center">
    <div class="col-sm-9 mt-5 mx-3">
        <form action="" method="post" class="mt-3 form-inline d-print-none">
            <div class="form-group mr-4">
                <label for="checkid">Enter Course Name</label>
                <input type="text" class="form-controll ml-3" id="checkid" name="checkid">
                <button type="submit" class="btn btn-danger">Search</button>
            </div>
        </form>
    </div>
</div>
<!---Start select query--->
<?php

if (isset($_POST['checkid'])) {
    $enteredCourseId = $_POST['checkid'];

    // Check if the entered course ID exists in the database
    $checkQuery = "SELECT * FROM course WHERE course_name = '$enteredCourseId'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        // Course ID exists, set session variables
        $row = mysqli_fetch_assoc($checkResult);
        $_SESSION['course_id'] = $row['course_id'];
        $_SESSION['course_name'] = $row['course_name'];
?>
        </table>
        <!---Show the course_ID and course_name--->
        <div class="container mt-5">
            <h3 class='bg-dark text-white fw-bold'>Course ID: <?php echo $row['course_id']; ?> Course Name: <?php echo $row['course_name']; ?></h3>
        </div>
        <!---start select query to show data from table--->
        <?php
        // ... your existing code ...

        // a session variable for course ID
        if (isset($_SESSION['course_id'])) {
            $courseId = $_SESSION['course_id'];

            // SQL query to select lessons for the specified course ID
            $query = "SELECT * FROM leason WHERE course_id = '$courseId'";

            $result = mysqli_query($conn, $query);

            if ($result) {
        ?>

                <div class='container mt-5'>

                    <!---Start table--->
                    <table class="table mt-3 table-hover ">
                        <!---draw table header--->
                        <thead >
                            <tr>

                            <th>Leason ID</th>
                            <th>Leason Name</th>
                            <th>Leason Description</th>
                            <th>Leason Video</th>
                            <th>Course ID</th>
                            <th>Course Name</th>
                            <th>Action</th>

                            </tr>
                        </thead>
                        <!---Start select data from data base and print in output--->
                        <?php
                        while ($lessonRow = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                            <td>{$lessonRow['leason_id']}</td>
                            <td>{$lessonRow['leason_name']}</td>
                            <td>{$lessonRow['leason_desc']}</td>
                            <td>{$lessonRow['leason_ved']}</td>
                            <td>{$lessonRow['course_id']}</td>
                            <td>{$lessonRow['course_name']}</td>"

                        ?>
                        
                       
                            <!---action button for recoed update and delete--->
                            <td>

                            <a href="leasonupdate.php?id=<?php echo $lessonRow['leason_id']; ?> "   class='btn btn-primary btn-sm'><i class="material-icons ">edit</i></a>
                            <a href="leasondel.php?id=<?php echo $lessonRow['leason_id']; ?>" class='btn btn-danger btn-sm'><i class="material-icons ">delete</i></a>
                        
                            </td>
                        <?php
                            echo "</tr>";
                        }
                        ?>
                    </table>
                    <!---end table--->

                    <!---Start select query--->
                    <div class="container float-end">
                        <a href="addleason.php" class="btn btn-success float-end">
                            <i class="material-icons fw-bold">add</i>
                        </a>
                    </div>
                </div>
                <!---php cod efor error--->
        <?php
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Course ID not set in session.";
        }

    
        ?>





        <!---Alert if course_id is not present--->
    <?php
    } else {
    ?>
        <div class="alert alert-primary" role="alert">Course is not found</div>
<?php
    }
}


mysqli_close($conn);
?>