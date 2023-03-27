<?php
session_start();
include('db.php');
include('functions.php');
$error = 0;
if(isset($_POST["register"])){
    if(empty($_POST["fname"])){
        $_SESSION['fnameError'] = '<p><label style="color:red">*Please enter your first name</label></p>';
        $error++;
    }else{
        $fname = clean_text($_POST["fname"]);
    }

    if(empty($_POST["lname"])){
        $_SESSION['lnameError'] = '<p><label style="color:red">*Please enter your last name</label></p>';
        $error++;
    }else{
        $lname = clean_text($_POST["lname"]);
    }
    $check = mysqli_num_rows(mysqli_query($linkDB,"select * from registration where email='{$_POST["email"]}'"));
    if(empty($_POST["email"])){
        $_SESSION['emailError'] = '<p><label style="color:red">*Please enter your email</label></p>';
        $error++;
    }else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $_SESSION['emailError'] =  '<p><label style="color:red">*Invalid email format</label></p>';
        $error++;
    }elseif($check > 0){
        $_SESSION['emailError'] =  '<p><label style="color:red">*This mail already exists.</label></p>';
        $error++;
    }else{
        $email =  clean_text($_POST["email"]);
    }
 
    if(empty($_POST["pass"])){
        $_SESSION['passError'] =  '<p><label style="color:red">*Password is required</label></p>';
        $error++;
    }else if(empty($_POST["cpass"])){
        $_SESSION['passError'] =  '<p><label style="color:red">*Confirm password is required</label></p>';
        $error++;
    }else if($_POST["pass"] != $_POST["cpass"]){
        $_SESSION['passError'] = '<p><label style="color:red">*Password is matched</label></p>';
        $error++;
    }else{
        $pass = clean_text($_POST["pass"]);
    }


    if($error == 0){
        $query = "INSERT INTO registration(fname,lname,email,pass) VALUES ('$fname', '$lname','$email','$pass')";
        if (mysqli_query($linkDB, $query)) {
            $_SESSION['success_msg'] = "<b style='text-align:center; color:green;'>Thank you for register.</b>";
            redirect('index.php');        
        } else {
            $_SESSION['error_msg'] = "<b style='text-align:center; color:red;'>There were error(s) in your form!</b>";
            redirect('index.php');
        }
    }else{
        redirect('index.php');
    }
}