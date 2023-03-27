<?php 
session_start();
$pageTitle = "Registration";
include('inc/header.php');
?>
  <div class="wrapper">
    <h2>Registration</h2>
    <?php
        if(isset($_SESSION['success_msg'])){
            echo $_SESSION['success_msg'];
            unset($_SESSION['success_msg']);
        }
        
        if(isset($_SESSION['error_msg'])){
            echo $_SESSION['error_msg'];
            unset($_SESSION['error_msg']);
        }
    ?>
    <form action="reg-code.php" method="POST">
      <div class="input-box">
        <input type="text" name="fname" placeholder="Enter your first name" required>
        <small style="color:red;">
            <?php
                if(isset($_SESSION['fnameError'])){
                    echo $_SESSION['fnameError'];
                    unset($_SESSION['fnameError']);
                }
            ?>
        </small>
      </div>
      <div class="input-box">
        <input type="text" name="lname" placeholder="Enter your last name" required>
        <small style="color:red;">
            <?php
                if(isset($_SESSION['lnameError'])){
                    echo $_SESSION['lnameError'];
                    unset($_SESSION['lnameError']);
                }
            ?>
        </small>
      </div>
      <div class="input-box">
        <input type="email" name="email" placeholder="Enter your email" required>
        <small style="color:red;">
            <?php
                if(isset($_SESSION['emailError'])){
                    echo $_SESSION['emailError'];
                    unset($_SESSION['emailError']);
                }
            ?>
        </small>
      </div>
      <div class="input-box">
        <input type="password" name="pass" placeholder="Create password" required>
        <small style="color:red;">
            <?php
                if(isset($_SESSION['passError'])){
                    echo $_SESSION['passError'];
                    unset($_SESSION['passError']);
                }
            ?>
        </small>
      </div>
      <div class="input-box">
        <input type="password" name="cpass" placeholder="Confirm password" required>
      </div>
      <div class="input-box button">
        <input type="Submit" name="register" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
  </div>
<?php include('inc/footer.php');?>
