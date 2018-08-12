<?php    
session_start(); 
session_destroy();

echo "<script>alert('logged out');</script>";
if(isset($_SERVER['HTTP_REFERER'])) {
 header('Location: '.$_SERVER['HTTP_REFERER']);  
} else {
	echo "<script>alert('logged out');</script>";
 //header('Location: index.php'); 
 //exit; 
}
exit;  
?>