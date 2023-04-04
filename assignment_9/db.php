<?php
$linkDB = mysqli_connect("localhost", "root", "", "blog");
if (mysqli_connect_error()) { //for connection error finding
    die('There was an error while connecting to database');
}