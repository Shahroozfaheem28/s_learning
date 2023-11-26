

<script>
    
    document.getElementById('showPassword').addEventListener('change', function () {
        var passwordInput = document.getElementById('passwordInput');
        passwordInput.type = this.checked ? 'text' : 'password';
    });

</script>

    <footer>
      <!---- start Address---->
    
 <div class="container-fluid bg-secondary text-light">
  <div class="row">
    <div class="col text-center">
    <div>
            <h4>Contact</h4>
            
            🏠 Cholistan University of Veterinary & Animal Sciences -CUVAS Bahawalpur <br>
            ☎  +92300-0000000 <br>
            ✉  elearning@email.com
            </p>

        </div>
    </div>
    <div class="col text-center">
    <br><br>
        <a class="nav-link" href="">Contact Us</a>
       
       <br>
        <a class="nav-link" href="about.php">About</a>
      
    </div>
    <div class="col text-center">
      
    </div>
  </div>
</div>

<!---- End Address---->
   
       

<!---- start Last bar ---->
<div class="container-fluid bg-dark text-center p-2" >
    
        <small class="text-white">Copyright &copy; || Designed By S-learnig <?php
          if (isset($_SESSION['stu_login'])) {
         echo'';
          } else {
            echo '
            </small> <a href="../S_learning/admin/adminlogin.php" >Admin</a>';
          }
          ?>
        </div>
        <!---- End Last bar ---->
    </footer>
   
    
   

    