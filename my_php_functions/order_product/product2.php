<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start(); 
$pid=4;
?>

<form action="collect_pids.php" method="post">
	<input type="hidden" name="product" value="<?php echo $pid; ?>">
	<input type="submit" name="submit" value="add to cart">
</form>


</body>
</html>