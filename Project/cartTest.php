<?php
session_start(); 
include("dblink.php");

	$_SESSION["pids"] .= $_GET['pid'].',';

//unset($_SESSION['pids']);
header('location:addingToCart.php');


?>

<script src="js/jquery-3.1.1.js"></script>
</body>
</html>
