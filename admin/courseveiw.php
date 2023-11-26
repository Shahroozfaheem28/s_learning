<?php
include('adminsession.php');
include('adminnav.php');
include('../database/connection.php');

// Assuming you have a database table named 'course'
$selectQuery = "SELECT * FROM course";
$result = mysqli_query($conn, $selectQuery);
?>

<div class="container mt-5">
    <div class="container-fluid bg-dark text-white">
        <h2>Course List</h2>
    </div>
    <table class="table mt-3 ">
        <thead>
            <tr class="bg-dark text-white">

                <th>Course Name</th>
                <th>Description</th>
                <th>Author</th>
                <th>Course Image</th>
                <th>Duration (hours)</th>
                <th>Price</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the results and display each course
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";

                echo "<td>{$row['course_name']}</td>";
                echo "<td>{$row['course_desc']}</td>";
                echo "<td>{$row['course_author']}</td>";
                echo "<td>{$row['course_image']}</td>";

                echo "<td>{$row['course_duration']}</td>";
                
            ?>
                <td>



                    <a href="courseupdate.php?id=<?php echo $row['course_id']; ?>" class='btn btn-primary btn-sm'><i class="material-icons">edit</i></a>


                    <a href="coursedel.php?id=<?php echo $row['course_id']; ?>" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a>




                </td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="container float-end">
        <a href="addcourse.php" class="btn btn-success float-end">
            <i class="material-icons fw-bold">add</i>
        </a>
    </div>
</div>