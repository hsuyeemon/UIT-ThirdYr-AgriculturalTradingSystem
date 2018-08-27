<?php
include("common.php");
include("dblink.php");
displayPageHeader("admin_product.php");

if(isset($_SESSION['login'])){
    $loginStatus = $_SESSION['login'];
  }
  else
    $loginStatus = "normal";

  if($loginStatus!="admin"){
    echo "<script>alert('please log in first');
    location.replace('index.php');</script>";
    //header('Location: index.php');
    exit(); 
  } 
?>
<style>

/*
td {
    border-bottom: : 1px solid #ddd;
    padding: 8px;
    max-width:  100px;
    min-width: 20px;
    height: 50px;
}
*/

tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}

th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
    max-width:  200px;
    min-width: 10px;
}
</style>
<?php

$pending_product_result=mysqli_query($con,"SELECT o.*,p.pname FROM order_product o,product p WHERE o.pid=p.pid and o.DELIVERED=0");

$pending_num_rows = mysqli_num_rows($pending_product_result);
echo "<div class='content padding-normal' style='overflow-x:auto'>";
echo "<table class='responsive-table'>";

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
}
}
else{
      echo "<tr><td>you haven't order anything yet!!</td></tr>";
}
echo "</table>";
echo "</div>";

?>
<?php
displayPageFooter();
?>