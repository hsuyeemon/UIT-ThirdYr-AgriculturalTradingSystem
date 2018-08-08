<?php
$connection = mysqli_connect('localhost', 'root', '','agriculture_system'); 
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
if($connection){
  echo "yay it's work!";
}
$select_db = mysqli_select_db($connection, 'agriculture_system');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection)); 
}
?>