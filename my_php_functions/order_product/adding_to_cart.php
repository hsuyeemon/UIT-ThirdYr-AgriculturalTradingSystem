
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();
include('db_config.php');

//removing last ','
$pids=rtrim($_SESSION['pids'], ",");

echo "SELECT * FROM product where pid IN ($pids)";

 $result = mysqli_query($connection,"SELECT * FROM product where pid IN ($pids)");
 echo ' the error is :'.mysqli_error($connection);


$itid=1;
$num_rows = mysqli_num_rows($result);
echo "<span id='num_row'>$num_rows</span>";
while($row = mysqli_fetch_array($result))
{ echo "<div id='div$itid'>";

echo "product name is  "."<span id='pname$itid'>".$row['pname'].'</span>';
echo "<br>";
echo "<span id='pid$itid' style:'diplay:none'>".$row['pid']."</span>";
echo "<br>";
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

?>
<button type='button' onclick="getvalue();">order</button>
<script type="text/javascript">
var divnum=document.getElementById('num_row').innerHTML;
	var cart=new Array();
	function removediv(divid){
		document.getElementById('div'.concat(divid)).remove();
		divnum--;
	}
	function getvalue(){
	alert(divnum);

for (i =1; i <=divnum; i++) {

	 var myEle = document.getElementById('div'.concat(i));
	 if(myEle!=null){
        cart.push(document.getElementById('pid'.concat(i)).innerHTML);
		cart.push(document.getElementById('pname'.concat(i)).innerHTML);
		cart.push(document.getElementById('price'.concat(i)).innerHTML);
		 
		}
	}
	cart.toString();
   alert(cart);
   var jsonString = JSON.stringify(cart);


 $.ajax({
  url: "receiveFromJS.php",
  type: "POST",
  data:{data : jsonString}

}).done(function(data) {
     console.log(data);
});
}
</script>

</body>
</html>
