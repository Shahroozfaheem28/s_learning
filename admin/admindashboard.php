<?php 
include('adminsession.php');
include('adminnav.php') 
?>

      

  <!-- calculation -->
  <div class="container text-center pt-3 ">
    <div class="row">
      <div class="col-4">

        <div class="card text-white bg-danger mb-3 " style="max-width: 18rem;">
          <div class="card-header">Courses</div>
          <div class="card-body">
            <h4 class="card-title">
              5
            </h4>
            <a href="" class="btn text-white" name="Course">Veiw</a>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card text-white bg-success mb-3 " style="max-width: 18rem;">
          <div class="card-header">Student</div>
          <div class="card-body">
            <h4 class="card-title">
              45
            </h4>
            <button class="btn btn-success" name="student">Veiw</button>
          </div>
        </div>
      </div>
        </div>
      </div>
<br>
  
<div class="mx-5 mt-5 text-center">
<p class="bg-dark text-white p-2"> Courses</p>
  
<?php
        include('../database/connection.php');
if(isset($_POST['student'])){
  echo 'halo';  ?>
  <div class="container mt-5">
  <!-- The code for displaying all records remains unchanged -->
  <table class="table table-bordered">
      <thead class="thead-dark">
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Occupation</th>
              <th>Image</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          <?php
          // SQL query to select all data from the 'studentreg' table
          $qry = "SELECT * FROM studentreg";
          $result = mysqli_query($conn, $qry);

          // Check if there are rows in the result set
          if ($result) {
              while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                  <td>" . $row['id'] . "</td>
                  <td>" . $row['name'] . "</td>
                  <td>" . $row['email'] . "</td>
                  <td>" . $row['occ'] . "</td>
                  <td><img src='stuimage/" . $row['img'] . "' alt='user image' width='100'></td>"
                  ?>
                  <td>
                      <a href='studentupdate.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'><i class="material-icons ">edit</i></a>
                      <a href='studentdel.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'><i class="material-icons ">delete</i></a>
                  </td>
              </tr>
              <?php
              }
          } else {
              echo "<tr><td colspan='6'>No records found</td></tr>";
          }
          ?>
      </tbody>
  </table>


  <?php
  // Close the database connection
  mysqli_close($conn);
        }
  ?>
</div>
