<?php
include("db_config.php");

$orderid=$_POST['orderid'];

$update_result = mysqli_query($connection,"UPDATE order_product
SET delivered = 1 where oid='$orderid'");

echo "update successful".$update_result;

?>
