<?php
session_start();
include('db.php');
include('functions.php');
$error = 0;
if(isset($_POST["submit"])){
    if(empty($_POST["name"])){
        $_SESSION['nameError'] = '<p><label style="color:red">*Please enter your name</label></p>';
        $error++;
    }else{
        $name = clean_text($_POST["name"]);
    }    
    
    if(empty($_POST["email"])){
        $_SESSION['emailError'] = '<p><label style="color:red">*Please enter your email</label></p>';
        $error++;
    }else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $_SESSION['emailError'] =  '<p><label style="color:red">*Invalid email format</label></p>';
        $error++;
    }else{
        $email =  clean_text($_POST["email"]);
    }

    if(empty($_POST["subject"])){
        $_SESSION['subjectError'] = '<p><label style="color:red">*Please enter your subject</label></p>';
        $error++;
    }else{
        $subject = clean_text($_POST["subject"]);
    }    

    
    if(empty($_POST["message"])){
        $_SESSION['messageError'] = '<p><label style="color:red">*Please enter your message</label></p>';
        $error++;
    }else{
        $message = clean_text($_POST["message"]);
    }

    if($error == 0){
        $query = "INSERT INTO contact(`name`, `email`,`subject`,`message`) VALUES ('$name','$email', '$subject','$message')";
        if (mysqli_query($linkDB, $query)) {
            $_SESSION['success_msg'] = "<b style='text-align:center; color:green;'>Your message send successfully</b>";
            redirect('contact.php');        
        } else {
            $_SESSION['error_msg'] = "<b style='text-align:center; color:red;'>There were error(s) in your form!</b>";
            redirect('contact.php');
        }
    }else{
        redirect('contact.php');
    }
}