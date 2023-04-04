<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? "" ?> - Assignment nine on Create Blog Website</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!-- header section starts  -->

    <header class="header">
        <a href="index.php" class="logo">My Blog</a>
        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="blog.php">blog</a>
            <a href="contact.php">contact</a>
            <?php
            if (!isset($_SESSION['user_id'])){?>
                <a href="login.php">login</a>
            <?php }else{ ?>
            <a href="logout.php">logout</a>
            <?php }?>
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
        </div>

    </header>
    <!-- header section ends -->