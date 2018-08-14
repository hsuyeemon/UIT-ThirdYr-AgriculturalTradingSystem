<?php
session_start(); 
include("db_config.php");
	if($_SESSION['pid1Incart']){
	$_SESSION['pid1Incart'].=$_GET['pidset'].",";
}
else
{
	$_SESSION['pid1Incart']=$_GET['pidset'].",";
}

$token = strtok($_SESSION['pid1Incart'], ",");

$i=0;
while ($token !== false)
{
$pids[$i]=$token;
$token = strtok(",");
$i++;
} 

echo $pids;
//echo implode(',', $pids);
$result = mysqli_query($connection,"SELECT * FROM product where product_id IN (".implode(',',$pids).")");

$itid=1;
$num_rows = mysqli_num_rows($result);
echo "<span id='num_row'>$num_rows</span>";
while($row = mysqli_fetch_array($result))
{echo "<div id='div$itid'>";
echo "product name is  ".'<span id="pname$itid">'.$row['pname'].'</span>';
echo "<br>";
echo "<span id='pid$itid' style:'diplay:none'>$itid</span>";
echo "price is  ".'<span id="price$itid">'.$row['price'].'</span>';
echo "<br>";
echo "brief description of the product is : ".$row['p_description'];
echo "<br>";
echo "qualification of the product is ".$row['qualification'];
echo "<br>";
echo "</div>";
echo "<br>";
echo "<br>";
$itid++;


}
echo mysqli_error($connection);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<button type="button" onclick="getvalue();">getvalue</button>


<script type="text/javascript">

	var cart=new Array();

	function getvalue(){
		alert("haha");
	var totalrow=document.getElementById('num_row').innerHTML;
	var i=0;
		var getpid='pid'+(i+1);
		var getprice='price'+(i+1);
		alert(document.getElementById(getpid).innerHTML);
	//	cart.push(document.getElementById(getprice).innerHTML);
		
	
	//cart.toString();
   // alert(cart);
	}
	

	 // var cart= ["Apple",2.00,2,"orange",2.00,2,"pineapple",2.00,2,"Apple",2.00,2] ;
  //var jsonString = JSON.stringify(cart);


//  $.ajax({
//   url: "receiveFromJS.php",
//   type: "POST",
//   data:{data : jsonString}

// }).done(function(data) {
//      console.log(data);
// });
// 	alert(value);
// }
</script>

<script src="js/jquery-3.1.1.js"></script>
<script>

</script>

</body>
</html>
