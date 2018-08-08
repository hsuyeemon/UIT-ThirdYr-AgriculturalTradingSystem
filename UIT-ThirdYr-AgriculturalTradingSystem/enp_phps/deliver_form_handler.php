  <?php
    session_start();
    $pid=$_SESSION["pid"];
    $unit=$_SESSION["unit"];
    $fromaddr=$_SESSION["fromaddr"];
    include("db_config.php");
    $name=$_POST['username'];
    $amount=$_POST['amount'];
    $toaddress=$_POST['address'];
    $expected_date=$_POST['expected_date'];

    echo $pid;
    echo $name;
    echo $pid;
    echo $unit;
    echo $fromaddr;
    echo $amount;
    echo $toaddress;
    echo $expected_date;
	$sqlquery="INSERT INTO order_product (oid,from_addr,to_addr,quantity,cost,expect_delivery_date,pid,bid,delivered) VALUES(20, '$fromaddr','$toaddress','$amount',1000,'$expected_date','$pid',2,0)";
	
	if(mysqli_query($connection,$sqlquery)){
	    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully added package');
    </script>");
	    }
	if (!mysqli_query($connection,$sqlquery))
  {
  echo("Error description: " . mysqli_error($connection));
  }


    ?>