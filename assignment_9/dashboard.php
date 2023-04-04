<?php 
session_start();
if (!$_SESSION['user_id']){
  redirect('login.php');
}
$pageTitle = "Dashboard";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? ""?></title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div class="wrapper1">
        <h2>Welcome, <?php echo $_SESSION['name']?></h2>
        <p></p>
        <a href="logout.php">Logout</a>
        <hr>

        <h2 style="margin-top:30px">Add Post</h2>
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
        <form action="add-data.php" method="POST" enctype="multipart/form-data">
            <div class="input-box">
                <input type="text" name="title" placeholder="Enter post title" required>
                <small style="color:red;">
                    <?php
                if(isset($_SESSION['titleError'])){
                    echo $_SESSION['titleError'];
                    unset($_SESSION['titleError']);
                }
            ?>
                </small>
            </div>
           
            <div class="input-box">
                <input type="text" name="category" placeholder="Enter post category" required>
                <small style="color:red;">
                    <?php
                if(isset($_SESSION['categoryError'])){
                    echo $_SESSION['categoryError'];
                    unset($_SESSION['categoryError']);
                }
            ?>
                </small>
            </div>
            <div class="input-box">
                <input type="file" name="picture" placeholder="Enter image" required>
                <small style="color:red;">
                    <?php
                if(isset($_SESSION['pictureError'])){
                    echo $_SESSION['pictureError'];
                    unset($_SESSION['pictureError']);
                }
            ?>
                </small>
            </div>
            <div class="input-box" style="height:150px !important">
                <textarea name="description" placeholder="Enter post description"></textarea>
                <small style="color:red;">
                    <?php
                if(isset($_SESSION['descriptionError'])){
                    echo $_SESSION['descriptionError'];
                    unset($_SESSION['descriptionError']);
                }
            ?>
                </small>
            </div>
            
            <div class="input-box button">
                <input type="Submit" name="register" value="Add Post">
            </div>
            <div class="text">
                <h3><a href="index.php">Back to Blog Page</a></h3>
            </div>
        </form>
    </div>
</body>

</html>