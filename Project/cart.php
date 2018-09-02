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

//include( "common.buyer.php" );
include 'common.php';
include "dblink.php";
displayPageHeader( "Cart" );
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

//removing last ','
  if(isset($_SESSION['pids'])){
$pids=rtrim($_SESSION['pids'], ",");
//echo $pids;
//echo "SELECT * FROM product where pid IN ($pids)";

 $result = mysqli_query($con,"SELECT * FROM product where pid IN ($pids)");
 //echo ' the error is :'.mysqli_error($con);


$itid=1;
$num_rows = mysqli_num_rows($result);
echo "<span id='num_row'>$num_rows</span>";
?>

<div class="content padding-normal">
  <!---Items--------------------------->
  <h4  id="your_items">Your Items</h4>

  <table>
    <tr>
      <th>Image</th>
      <th>Product Name</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Total</th>
      <th></th>
    </tr>

<?php
while($row = mysqli_fetch_array($result))
{
$array = explode(',', $row['p_image']);
 $url = $array[0];
        $imageData = base64_encode(file_get_contents($url));

    // Format the image SRC:  data:{mime};base64,{data};
    $src = 'data: '.mime_content_type($url).';base64,'.$imageData;
echo "<tr id='div$itid'>";
echo "<input id='pid$itid' type='hidden' value=".$row['pid'].">";
echo "<td id='pname$itid'><img src='".$src."'height='100px' width='100px'></td>";
echo "<td id='pname$itid'>".$row['pname'].'</td>';
?>
<td >
<input id='quantity<?php echo $itid?>' type='number' value='1' onchange='calculate(<?php echo $itid?>)'>
</td>
<td id='price<?php echo $itid?>'><?php echo $row['price']?></td>



<?php
echo "<td id='total$itid'>".$row['price'].'</td>';
echo "<td><button class='btn circle green' onclick='removediv($itid)'><i class='material-icons'>cancel</i></button></td>";

$itid++;
}
?>
<script type="text/javascript">

  function calculate(id) {
    // body...
    //alert(id);
    
    var i = document.getElementById('<?php echo "quantity'+id+'";?>').value;
    //alert(i);
    var price = document.getElementById('<?php echo "price'+id+'";?>').innerHTML;
    //alert(i*price);
     document.getElementById('<?php echo "total'+id+'";?>').innerHTML= i*price;

     calc();
    }

</script>

</table>
<?php
//echo "haha".$itid;
echo mysqli_error($con);
?>

      <!--Cash -------------->
      <div class="row">
      <div class="col s6">
     	<label>Payment Method</label>
  		<select class="browser-default">
    	<option value="1" id="cash_on_delivery">Cash On Delivery</option>
    	</select></div>
      <div class="col s6">
        <label>Total cost</label>
        <input type="text" id="totalCost" name="totalCost" >
        <script type="text/javascript">
          calc();

          function calc(){
            var sum = 0;
            var a;
            for(a=1;a<=<?php echo $itid?>;a++){
            if(document.getElementById("total"+a)!=null){ 
              sum =sum+parseInt(document.getElementById("total"+a).innerHTML, 10);  
              }
            }
            document.getElementById("totalCost").value=sum;
          }
    
 
</script>
      </div>
    </div><br>

             <br>


<button class="btn green white-text"  onclick="getvalue();" id="order" name="action">Order<i class="material-icons right">send</i>
      </button>
      <a href="products.php" id="back" class="btn green white-text"><i class="material-icons right">arrow_back</i>Back</a>
      <?php
      }
      else{
      ?>
      <br>
    <table class="padding-normal">
      <tr>
      <th>There are no products in your cart</th>
    </tr>
    </table>
    <?php
  }
  ?>
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
    <form id="order_form" class="col" action="" method="">
          <input type="hidden" id="pidInput" name="pidInput" value="">
          <input type="hidden" id="quantityInput" name="quantityInput">
          <input type="hidden" name="bid" value="<?php echo $n3['bid'];?>">
          <input type="hidden" name="to_addr" value="<?php echo $n3['b_address'];?>">

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
      <input id="datepicker" name="expect_delivery_date" type="text"
      onchange="testDate()">
      <label for="date" id="date_label">Pick the preferred date</label>
    </div>
    <input type="hidden" name="price" value="<?php echo $row['price']?>">

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
    pidCart.splice(divid-1, divid-1);
    quantityCart.splice(divid-1, divid-1);
    calc();

  }

  function getvalue(){
    pidCart = [];
    quantityCart = [];
  //alert("divnum"+divnum);

  for (i =1; i <=divnum; i++) {

    if(document.getElementById('div'.concat(i))!=null
      && document.getElementById('div'.concat(i))!=="undefined"){
   //var myEle = document.getElementById('div'.concat(i));
   pidCart.push(document.getElementById('pid'.concat(i)).value);
    quantityCart.push(document.getElementById('quantity'.concat(i)).value);

     console.log(pidCart.toString());
     console.log(quantityCart.toString());
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
    var form = document.getElementById('order_form');
    form.method="post";
    form.action="order.php";
    
    form.submit();
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
<script type="text/javascript">
         alert("fuction");
        function testDate(){
          alert("fuction");
          var dateString = document.getElementById("datepicker").value;
          var fromDate = new Date(dateString);
          var date1 = new Date(fromDate).toDateString("yyyy-MM-dd");

          if( (Math.floor((Date.UTC(date1.getFullYear(), date1.getMonth(), date1.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24))<1){
            alert("invalid date");
          }
          else{
            alert("invalid date");
          }
        }
      </script>

<?php
displayPageFooter();
?>