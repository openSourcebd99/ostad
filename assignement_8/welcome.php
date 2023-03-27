<?php 
session_start();
if (!$_SESSION['user_id']){
  redirect('index.php');
}
$pageTitle = "Welcome";
include('inc/header.php');
?>
  <div class="wrapper">
    <h2>Welcome, <?php echo $_SESSION['first_name']?></h2>
    <p>Thanks for your registration.</p>
    <a href="logout.php">Logout</a>
  </div>
<?php include('inc/footer.php');?>