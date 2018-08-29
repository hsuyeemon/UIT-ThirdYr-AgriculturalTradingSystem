<?php
session_start(); 
include("db_config.php");
	$_SESSION['pid1Incart'].=$_GET['pidset'].",";

$token = strtok($_SESSION['pid1Incart'], ",");

$i=0;
while ($token !== false)
{
$pids[$i]=$token;
$token = strtok(",");
$i++;
} 


$result = mysqli_query($connection,"SELECT * FROM product where pid IN (".implode(',',$pids).")");

$itid=1;
$num_rows = mysqli_num_rows($result);
echo "<span id='num_row'>$num_rows</span>";
while($row = mysqli_fetch_array($result))
{echo "<div id='div$itid'>";
echo "product name is  "."<span id='pname$itid'>".$row['pname'].'</span>';
echo "<br>";
echo "<span id='pid$itid' style:'diplay:none'>".$row['pid']."</span>";
echo "price is  "."<span id='price$itid'>".$row['price'].'</span>';
echo "<br>";
echo "brief description of the product is : ".$row['p_description'];
echo "<br>";
echo "qualification of the product is ".$row['qualification'];
echo "<br>";
echo "<button type='button' onclick='removediv($itid)'>remove element</button>";
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
	function removediv(divid){
		document.getElementById('div'.concat(divid)).remove();
	}
	function getvalue(){
		//alert(document.getElementById('div'));
	var totalrow=document.getElementsByTagName('div').length;

for (i =1; i <=totalrow; i++) {
	if(document.getElementById('div'.concat(i)).innerHTML==null)
	{
		continue;
	}

		cart.push(document.getElementById('pid'.concat(i)).innerHTML);
		cart.push(document.getElementById('pname'.concat(i)).innerHTML);
		cart.push(document.getElementById('price'.concat(i)).innerHTML);

	
		
	}
	//cart.toString();
   //alert(cart);
   var jsonString = JSON.stringify(cart);


 $.ajax({
  url: "receiveFromJS.php",
  type: "POST",
  data:{data : jsonString}

}).done(function(data) {
     console.log(data);
});
}

   

	// var i=0;
	// 	var getpid='pid'+(i+1);
	// 	var getprice='price'+(i+1);
	// 	//alert(document.getElementById(getpid).innerHTML);
	//	cart.push(document.getElementById(getprice).innerHTML);
		
	
	
	
	

	 // var cart= ["Apple",2.00,2,"orange",2.00,2,"pineapple",2.00,2,"Apple",2.00,2] ;
  
	//alert(value);

</script>

<script src="js/jquery-3.1.1.js"></script>
<script>

</script>

</body>
</html>
