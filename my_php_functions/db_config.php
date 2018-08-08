<?php
$connection = mysqli_connect('localhost', 'root', '','agriculture_system'); 
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}

$select_db = mysqli_select_db($connection, 'agriculture_system');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection)); 
}
?>