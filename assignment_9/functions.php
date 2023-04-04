<?php
function redirect($link){
    ?>
    <script>
    window.location.href='<?php echo $link?>';
    </script>
    <?php
    die();
}

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}