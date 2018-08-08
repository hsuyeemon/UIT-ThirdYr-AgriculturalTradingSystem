<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="delivery.php" method="post">
	name<input type="text" name="username" id="username" value="">
	amount<input type="text" name="amount" id="amount" value="">
	address<input type="text" name="toaddress" id="toaddress" value="">
	phone<input type="text" name="phone" id="phone" value="">
	expected latest time<input type="text" class="datepicker" name="date">

	<input type="submit" name="order" value="order">
</form>

  <?php
    $pid=$_SESSION["pid"];
    $unit=$_SESSION["unit"];
    $fromaddr=$_SESSION["fromaddr"];
    $name=$_POST['username'];
    $amount=$_POST['amount'];
    $toaddress=$_POST['toaddress'];
    $date=$_POST['date'];

    echo $pid;
    echo $name;

    ?>
</body>
</html>