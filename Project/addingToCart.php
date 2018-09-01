<!DOCTYPE html>
<html>
<head>
	<title></title>
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
</head>
<body>

<?php
session_start();
include('dblink.php');
include 'common.php';
displayPageHeader( "Cart" );
//removing last ','
$pids=rtrim($_SESSION['pids'], ",");

//echo "SELECT * FROM product where pid IN ($pids)";

 $result = mysqli_query($con,"SELECT * FROM product where pid IN ($pids)");
 //echo ' the error is :'.mysqli_error($con);


$itid=1;
$num_rows = mysqli_num_rows($result);
echo "<span id='num_row'>$num_rows</span>";
?>
<table>
	 <tr>
      <th>Product Name</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Total</th><th></th>
    </tr>
    <?php
while($row = mysqli_fetch_array($result))
{ 
	
echo "<tr id='div$itid'>";
echo "<input id='pid$itid' type='hidden' value=".$row['pid'].">";
echo "<td id='pname$itid'>".$row['pname'].'</td>';
echo "<td >
<input id='quantity$itid'type='number' value='1'>
</td>";
echo "<td id='price$itid'>".$row['price'].'</td>';
echo "<td></td><td><button type='button' onclick='removediv($itid)'>remove element</button></td>";
echo "</tr>";
echo "<br>";
echo "<br>";
$itid++;
}

?>
</table>
<br>
<button class="btn green white-text"  onclick="getvalue();" id="order" name="action">Order<i class="material-icons right">send</i>
      </button>
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog" style="padding: 48px;">
     <?php
        if (isset($_SESSION['bid'])) {
          $buyerInfo = "SELECT * FROM buyer where bid='".$_SESSION['bid']."'";

          $res3 = mysqli_query($con,$buyerInfo) or die(mysqli_error($con));

          $n3 = mysqli_fetch_array($res3);

          ?>

  <h4>Order Your Items</h4>


  <input type="hidden" name="phidden" value="">
  
  <!---Items--------------------------->
    <form id="form1" class="col" action="order.php" method="post">
          <input type="hidden" id="pidInput" name="pidInput" value="">
          <input type="hidden" id="quantityInput" name="quantityInput">
          <input type="hidden" name="bid" value="<?php echo $n3['bid'];?>">
          <input type="hidden" name="to_addr" value="<?php echo $n3['b_address'];?>">
          <!--input type="hidden" name="from_addr" value="<?php echo $rows2['s_address'];?>"-->
          <input type="hidden" name="price" value="<?php echo $price?>">

           <div class="row">

			<div class="input-field col s12 ">
          <input id="phoneno" type="text" class="validate" value="<?php echo $n3['b_phoneno'];?>" required>
          <label for="phoneno">PhoneNo</label>
        </div>
        
      </div>
      <div class="row">
        
        <div class="input-field col s12 ">
          <input id="emailBuyer" type="email" class="validate" value="<?php echo $n3['b_email'];?>" required="required">
          <label for="email">Email</label>
        </div>
        
      </div>
     
    <div class="row">
      <div class="input-field col s4 ">
          <input id="street" type="text" class="validate" required="required">
          <label for="street">Street Address</label>
        </div>

        <div class="input-field col s4 ">
          <input id="city" type="text" class="validate" required="required">
          <label for="city">City</label>
        </div>
      <div class="input-field col s4 ">
          <input id="region" type="text" class="validate" required="required">
          <label for="Region">Region</label>
        </div>
      </div>

    <div class="row">
      <input id="datepicker" name="expect_delivery_date" type="text">
      <label for="date" id="date_label">Pick the preferred date</label>
    </div>
     <div class="row">
    
      <button class="btn green white-text" name="order1" onclick="orderline()">Confirm Order
      <i class="material-icons right">send</i>
      </button>
      <button class="modal-close btn green white-text"  name="action">Cancel<i class="material-icons right">cancel</i>
      </button>

      </div>
      

        
        
    </form>
    <?php
        }
        else{
          ?>
         <h4>Please Login first</h4>
         <?php
        }
        ?>

    <!--div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div--></div>

    </div>
<!--button type='button' onclick="getvalue();">order</button-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	//getvalue();
  if(document.getElementById('num_row')!=null){
var divnum=document.getElementById('num_row').innerHTML;
}
	var pidCart=new Array();
	var quantityCart=new Array();
	function removediv(divid){
		document.getElementById('div'.concat(divid)).remove();
		divnum--;
	}

	function getvalue(){
	//alert("divnum"+divnum);

	for (i =1; i <=divnum; i++) {

    if(document.getElementById('div'.concat(i))!=null){
	 var myEle = document.getElementById('div'.concat(i));
  }
	 if(myEle!=null){
        pidCart.push(document.getElementById('pid'.concat(i)).value);
		quantityCart.push(document.getElementById('quantity'.concat(i)).value);
		
		}
	}
	//pidCart.toString();
	//quantityCart.toString();
   //alert("quantity"+quantityCart+"pid"+pidCart);
 
   document.getElementById('pidInput').value=pidCart.join();
   document.getElementById('quantityInput').value=quantityCart.join();
   
   
    $('#myModal2').modal('open'); 
    
}
</script>
 <script>

  function orderline(){
   

   var a = confirm("Are you sure to confirm the order?");
    if(a==true){
    alert(a);
    var form = document.getElementById('form1');
    form.method="post";
    form.action="order.php";
    
    form.submit();
  }
  else{
    alert("no");
  }
  }
 


  $(document).ready(function(){
  $('.modal').modal();
    });
 $( "#datepicker" ).datepicker();
    $.datepicker.setDefaults({
     dateFormat: 'yy-mm-dd'
});
</script>
</script>
<?php
displayPageFooter();
?>