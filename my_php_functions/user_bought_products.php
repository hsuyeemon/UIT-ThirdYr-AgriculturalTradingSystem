<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php
include("db_config.php");

$pending_product_result=mysqli_query($connection,"SELECT o.*,p.pname FROM order_product o,product p WHERE o.bid=2 and o.pid=p.pid and o.DELIVERED=0");

$pending_num_rows = mysqli_num_rows($pending_product_result);
echo "<table>";
echo "<tr><th>product name</th>
      <th>seller address</th>
      <th>pick up address</th>
      <th>expected delivery date</th>
      <th>ordered time</th>
      <th>quantity</th>
      <th>cost</th><tr>";

      if($pending_num_rows>0){
while($row = mysqli_fetch_array($pending_product_result))
{
echo "<tr><td>";
echo $row['pname'];
echo "</td>";
      
echo "<td>";
echo $row['from_addr'];
echo "</td>";

echo "<td>";
echo $row['to_addr'];
echo "</td>";

echo "<td>";
echo $row['expect_delivery_date'];
echo "</td>";

echo "<td>";
echo $row['order_time'];
echo "</td>";

echo "<td>";
echo $row['quantity'];
echo "</td>";

echo "<td>";
echo $row['cost'];
echo "</td>";

echo "</tr>";
}}

else{
	echo "<tr><td>you haven't order anything yet!!</td></tr>";
}

echo "</table>";

$delivered_product_result=mysqli_query($connection,"SELECT o.*,p.pname FROM order_product o,product p WHERE o.bid=2 and o.pid=p.pid and o.DELIVERED=1");

$delivered_num_rows = mysqli_num_rows($delivered_product_result);

echo "<table>";
echo "<tr><th>product name</th>
      <th>seller address</th>
      <th>pick up address</th>
      <th>expected delivery date</th>
      <th>ordered time</th>
      <th>quantity</th>
      <th>cost</th><tr>";

if($delivered_num_rows>0){
while($row = mysqli_fetch_array($delivered_product_result))
{
echo "<tr><td>";
echo $row['pname'];
echo "</td>";

echo "<td>";
echo $row['from_addr'];
echo "</td>";

echo "<td>";
echo $row['to_addr'];
echo "</td>";

echo "<td>";
echo $row['expect_delivery_date'];
echo "</td>";

echo "<td>";
echo $row['order_time'];
echo "</td>";

echo "<td>";
echo $row['quantity'];
echo "</td>";

echo "<td>";
echo $row['cost'];
echo "</td>";

echo "</tr>";
}
}
else{
	echo "<tr><td>you haven't order anything yet!!</td></tr>";
}
echo "</table>";

?>

</body>
</html>