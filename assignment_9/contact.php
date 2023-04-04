<?php 
$pageTitle = 'Contact';
include('includes/header.php');
?>
<!-- contact section starts  -->

<section class="contact" id="contact">
    <form action="contact-data.php" method="POST">
        <h3>contact me</h3>
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
        <div class="inputBox">
            <input type="text" placeholder="name" name="name">
            <small style="color:red;">
                    <?php
                if(isset($_SESSION['nameError'])){
                    echo $_SESSION['nameError'];
                    unset($_SESSION['nameError']);
                }
            ?>
                </small>
            <input type="email" placeholder="email" name="email">
            <small style="color:red;">
                <?php
                    if(isset($_SESSION['emailError'])){
                        echo $_SESSION['emailError'];
                        unset($_SESSION['emailError']);
                    }
                ?>
            </small>
        </div>
        <div class="inputBox">
            <input type="text" placeholder="subject" name="subject">
            <small style="color:red;">
                <?php
                    if(isset($_SESSION['subjectError'])){
                        echo $_SESSION['subjectError'];
                        unset($_SESSION['subjectError']);
                    }
                ?>
            </small>
        </div>
        <textarea name="message" placeholder="message" id="" cols="30" rows="10"></textarea>
        <small style="color:red;">
                    <?php
                if(isset($_SESSION['messageError'])){
                    echo $_SESSION['messageError'];
                    unset($_SESSION['messageError']);
                }
            ?>
                </small>
        <input type="submit" value="send message" name="submit" class="btn">
    </form>

</section>

<!-- contact section ends -->

<?php include('includes/footer.php');?>