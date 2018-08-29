<?php
session_start(); 
include("db_config.php");

	$_SESSION["pids"] .= $_POST['product'].',';

//unset($_SESSION['pids']);
header('location:adding_to_cart.php');


?>

<script src="js/jquery-3.1.1.js"></script>
</body>
</html>
