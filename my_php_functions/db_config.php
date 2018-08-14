<?php
$connection = mysqli_connect('localhost', 'root', '','agri'); 

if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}

$select_db = mysqli_select_db($connection, 'agri');

if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection)); 
}
?>