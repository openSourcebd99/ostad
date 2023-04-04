<?php
session_start();
$uid = $_SESSION['user_id'];
include('db.php');
include('functions.php');
$error = 0;
if(isset($_POST["register"])){
    if(empty($_POST["title"])){
        $_SESSION['titleError'] = '<p><label style="color:red">*Please enter post title</label></p>';
        $error++;
    }else{
        $title = clean_text($_POST["title"]);
    }    
    
    if(empty($_POST["category"])){
        $_SESSION['categoryError'] = '<p><label style="color:red">*Please enter post category</label></p>';
        $error++;
    }else{
        $category = clean_text($_POST["category"]);
    }    

    if(empty($_FILES["picture"]['name']))
    {
        $_SESSION['pictureError'] =  '<p><label style="color:red">*Upload picture is required</label></p>';
       $error++;
    }
    else
    {
       $filename = date( 'YmdHis' ) . '_' . $_FILES["picture"]['name'];
       $tempname = $_FILES["picture"]["tmp_name"];
       $folder = "assets/post-img/".$filename;
   
    }

    if(empty($_POST["description"])){
        $_SESSION['descriptionError'] = '<p><label style="color:red">*Please enter post description</label></p>';
        $error++;
    }else{
        $description = clean_text($_POST["description"]);
    }

    if($error == 0){
        $query = "INSERT INTO post(title,category,photo,`description`, user_id) VALUES ('$title','$category', '$filename','$description','$uid')";
        move_uploaded_file($tempname, $folder);
        if (mysqli_query($linkDB, $query)) {
            $_SESSION['success_msg'] = "<b style='text-align:center; color:green;'>Your post added successfully</b>";
            redirect('dashboard.php');        
        } else {
            $_SESSION['error_msg'] = "<b style='text-align:center; color:red;'>There were error(s) in your form!</b>";
            redirect('dashboard.php');
        }
    }else{
        redirect('dashboard.php');
    }
}