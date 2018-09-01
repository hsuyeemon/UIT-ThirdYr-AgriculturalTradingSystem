<?php    
session_start(); 
session_destroy();
if(isset($_SERVER['HTTP_REFERER'])) {

echo "<script>alert('logged out');</script>";
 header('Location: '.$_SERVER['HTTP_REFERER']);  
} 
else {
	echo "<script>alert('logged out');</script>";
 header('Location: index.php');  
 exit();
}
 header('Location: index.php');  
exit();  
?>