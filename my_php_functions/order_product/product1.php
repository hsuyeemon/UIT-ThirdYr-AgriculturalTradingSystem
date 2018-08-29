<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$pid=1;
?>
<form action="collect_pids.php" method="post">
	<input type="hidden" name="product" value="<?php echo $pid; ?>">
	<input type="submit" name="submit" value="add to cart">
</form>

</body>
</html>