<?php
session_start();
include('db.php');
include('functions.php');
$error = 0;
if (isset($_POST['login'])) {        
    $email = clean_text($_POST['email']);
	  $pass = clean_text($_POST['pass']);
    
    if (!$email) {
        $err_email = "*Email is required";
        $error ++;
    }

    if (!$pass) {
        $err_pass = "*Password is required";
        $error ++;
    }
    
    // var_dump($_POST);
    // die;

    if ($error === 0) {
        $res = mysqli_query($linkDB,"select * from registration where email='$email'");
        $check=mysqli_num_rows($res);
        if($check > 0){
            $row=mysqli_fetch_assoc($res);
            $dbpass = $row['pass'];
            if($dbpass == $row['pass']){
                $_SESSION['user_id']=$row['id'];
                $_SESSION['first_name']=$row['fname'];
                redirect('welcome.php');
            }else{
                $error_msg='Please enter correct password';
            }
        }else{
            $error_msg='Please enter valid email id';
        }            
    } else {
        $error_msg = "<b class ='text-danger text-center'>Error !! fields are empty in your form!</b>";    
    }
}
?>

<?php 
$pageTitle = "Login";
include('inc/header.php');
?>
  <div class="wrapper">
    <h2>Login</h2>
    <?php echo $error_msg ?? ""?>
    <form action="#" method="POST">
      <div class="input-box">
        <input type="email" name="email" placeholder="Enter your email" required>
        <?php echo $err_email ?? ""?>
      </div>
      <div class="input-box">
        <input type="password" name="pass" placeholder="Create password" required>
        <?php echo $err_pass ?? ""?>
      </div>
      <div class="input-box button">
        <input type="Submit" name="login" value="Register Now">
      </div>
      <div class="text">
        <h3>If you are not registered? <a href="index.php">Register now</a></h3>
      </div>
    </form>
  </div>
<?php include('inc/footer.php');?>