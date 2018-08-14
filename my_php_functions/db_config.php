<?php
$connection = mysqli_connect('localhost', 'root', 'root','agri_project'); 
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}

$select_db = mysqli_select_db($connection, 'agri_project');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection)); 
}
?>