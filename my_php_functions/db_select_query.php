<?php
include("db_config.php");
$result=mysqli_query($connection,"SELECT count(*) as total from id_test");
$data=mysqli_fetch_assoc($result);

$userid=$data['total']+1;

?>