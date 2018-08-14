<?php

include 'common.php';
include "dblink.php";
displayPageHeader( "User order" );

 if(isset($_SESSION['login'])){
    $loginStatus = $_SESSION['login'];
  }
  else
    $loginStatus = "normal";

  if($loginStatus!="buyer"){
    echo "<script>alert('please log in first');
    location.replace('index.php');</script>";
    //header('Location: index.php');
    exit(); 
  }



$bid = $_SESSION['bid'];
$pending_product_result=mysqli_query($con,"SELECT o.*,p.pname FROM order_product o,product p WHERE o.bid=$bid and o.pid=p.pid and o.DELIVERED=0");
$pending_num_rows = mysqli_num_rows($pending_product_result);


  if(isset($_POST['oid'])){
  //echo $_POST['oid'];
  $setDelivered = mysqli_query($con,"UPDATE order_product
   SET delivered=1 where oid='".$_POST['oid']."'");
      } 
    
?>
<div class="content padding-normal">
       <h4  id="pending_orders">Pending Orders</h4>
<table>
<tr><th>product name</th>
      <th>seller address</th>
      <th>pick up address</th>
      <th>expected delivery date</th>
      <th>ordered time</th>
      <th>quantity</th>
      <th>cost</th><th></th><tr>
<?php
      if($pending_num_rows>0){
while($row = mysqli_fetch_array($pending_product_result))
{
echo "<tr><td><a href='productDetails.php?productId=".$row['pid']."'>";
echo $row['pname'];
echo "</a></td>";

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
?>
</td><td>
<form id="pending" method="" action="">
      <a class='btn btn-default' onclick='delivery()'>pending</a>
      <input type='hidden' value="<?php echo $row['oid'];?>" name='oid'>
</form></td>

      </tr>
<?php
}
}

else{
	echo "<tr><td>you haven't order anything yet!!</td></tr>";
}
echo "</table>";

$bid = $_SESSION['bid'];
$delivered_product_result=mysqli_query($con,"SELECT o.*,p.pname FROM order_product o,product p WHERE o.bid=$bid and o.pid=p.pid and o.DELIVERED=1");

$delivered_num_rows = mysqli_num_rows($delivered_product_result);
?>
<br> <h4  id="delivered_order">Delivered Orders</h4>
 <?php

echo "<table>";
echo "<tr><th>product name</th>
      <th>seller address</th>
      <th>pick up address</th>
      <th>expected delivery date</th>
      <th>ordered time</th>
      <th>quantity</th>
      <th>cost</th><th></th><tr>";

if($delivered_num_rows>0){
while($row = mysqli_fetch_array($delivered_product_result))
{
  //echo "pid".$row['pid'];
echo "<tr><td><a href='productDetails.php?productId=".$row['pid']."'>";
echo $row['pname'];
echo "</a></td>";

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

?>
?>
</td><td>
<form id="delivered" method="" action="">
      <a class='btn btn-default' onclick='delivery()'>delivered</a>
      <input type='hidden' value="<?php echo $row['oid'];?>" name='oid'>
</form></td>
</tr>

<?php
}
}
else{
	echo "<tr><td>you haven't order anything yet!!</td></tr>";
}
echo "</table>";

?>
</div>
<script type="text/javascript">
      function delivery(){
            var a = confirm("Does your order delivered?");
            var form = document.getElementById("pending");
            if(a==true){
                  alert("delivered" +form);
                  form.method="post";
                  form.action="userOrder.php";
                  form.submit();
                  //TODO set delivered to 1
            }
            else{
                  alert("fail delivered");
            }
      }
</script>
<?php
displayPageFooter();
?>