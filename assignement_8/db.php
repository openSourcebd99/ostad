<?php
$linkDB = mysqli_connect("localhost", "root", "", "reg_log");
if (mysqli_connect_error()) { //for connection error finding
    die('There was an error while connecting to database');
}