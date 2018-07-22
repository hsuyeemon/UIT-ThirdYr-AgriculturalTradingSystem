<?php
$connection = mysqli_connect('localhost', 'root', '','agri_project'); 
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
if($connection){
  echo "yay it's work!";
}
$select_db = mysqli_select_db($connection, 'agri_project');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection)); 
}
?>