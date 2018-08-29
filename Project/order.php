<?php
 if(!isset($_SESSION)) 
  { 
    session_start(); 
  }

include 'dblink.php';
  $date = date('Y-m-d h:i:s', time());
 // echo $date;

  echo "<script>alert(".$date.")</script>";
  $ordernum = "SELECT    *
FROM      order_product
ORDER BY  oid DESC
LIMIT     1;";

  $result = mysqli_query($con,$ordernum) or die(mysqli_error($con));

   $r=mysqli_fetch_array($result);
  $oid =$r['oid']+1;
  $quantityArray = explode(',',$_POST['quantityInput']);


 

  $pidArray = explode(',',$_POST['pidInput']);
  if(sizeof($pidArray)>0){
	for($i=0;$i<sizeof($pidArray);$i++){

		 $sql  = "SELECT * from seller seller inner join product using(sid) where pid=$pidArray[$i]";
   $addr  = mysqli_query($con,$sql) or die(mysqli_error($con));

   $r1=mysqli_fetch_array($addr);
  $from_addr = $r1['s_address'];
		$cost =  $quantityArray[$i]*(int)$_POST['price'];
		$orderQuery = "INSERT INTO order_product (oid,order_time,from_addr,to_addr,quantity,cost,expect_delivery_date,pid,bid,delivered) VALUES ($oid,'".$date."','".$from_addr."','".$_POST['to_addr']."',".$quantityArray[$i].",".$cost.",'".$_POST['expect_delivery_date']."',".$pidArray[$i].",".$_POST['bid'].",0);";
		$res1 = mysqli_query($con,$orderQuery) or die(mysqli_error($con));
	}
}
//unset($_SESSION['pids']);
//session_write_close();
echo "<script>alert('Your have ordered your item');location='userOrder.php';</script>";
  
?>
