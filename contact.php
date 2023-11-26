
<?php
session_start(); 
 include('session.php');
 include('database/connection.php');
  include('maininclude/nav.php');



  $selectQuery = "SELECT name, email FROM studentreg WHERE email = '$_SESSION[email]'";
$result = mysqli_query($conn, $selectQuery);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $studentemail = $row['email'];
    $studentName = $row['name'];
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
?>

   
    
    <div class="container mt-5 " id="Contact"><br>
        <h2 class="text-center mb-4">Contact US</h2>
        <div class="row">
            <div class="col-md-8">
                <form action="" method="post">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $studentName ; ?>" disabled><br>
                    <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
                    <input type="email" class="form-control" name="email" placeholder="E-mail" value="<?php echo  $studentemail; ?>" disabled><br>
                    <textarea class="form-control" name="message" placeholder="How can we help you?" style="height: 150px;"></textarea> <br>
                    <input type="submit" value="Send" class="btn btn-primary float-end" name="submit">
                </form>
            </div>
            <div class="col-md-4 stripe text-white text-center">
                <h4>E-learning</h4>
                <p>E-learning <br>
                    Cholistan University of Veterinary & Animal Sciences - CUVAS Bahawalpur <br>
                    phone:+92300-0000000 <br>
                    E-mail: elearning@email.com
                </p>

            </div>
        </div>
    </div>
    <br>
    <?php include('maininclude/footer.php') ?>
   