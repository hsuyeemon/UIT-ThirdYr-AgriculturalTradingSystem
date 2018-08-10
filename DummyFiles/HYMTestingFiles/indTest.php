<?php
include( "common.php" );
require_once( "dblink.php" );
displayPageHeader( "Index test" );
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
      <th>Total</th><th></th>
    </tr>

<?php
include("dblink.php");
$_SESSION['pid1Incart'].=$_GET['pid'].",";

$token = strtok($_SESSION['pid1Incart'], ",");

$i=0;
while ($token !== false)
{
$pids[$i]=$token;
$token = strtok(",");
$i++;
} 


$result = mysqli_query($con,"SELECT * FROM product where pid IN (".implode(',',$pids).")");

$itid=1;

$num_rows = mysqli_num_rows($result);
//echo "<span id='num_row'>$num_rows</span>";
while($row = mysqli_fetch_array($result))
{
  
$image = $row['p_image'];
$imageData = base64_encode(file_get_contents($image));

// Format the image SRC:  data:{mime};base64,{data};
$src = 'data: '.mime_content_type($image).';base64,'.$imageData;
?>

    <tr>
      <td><img src='<?php echo $src;?>' height="100px" width="100px"></td>
      <td id='<?php echo "pname$itid";?>'><?php echo $row['pname'];?></td>
      <td>
        <div class="input-field">
           <input id="quantity" type="number" value="1" min="0" class="validate"
           >
          <label for="quantity">Quantity</label>
        </div></td>
      <td><?php echo $row['price'];?></td>
      
      <!--total--->
      <td>70000</td>
      <td><a href="#" class="btn btn-default waves-effect  white
         green-text"><i class="material-icons">delete</i></a> </td>
       </tr>
<?php
$itid++;
}
?>

</table>
<?php
echo mysqli_error($con);
?>




      <!--Cash -------------->
      <div class="col s2">
     	<label>Payment Method</label>
  		<select class="browser-default">
    	<option value="1" id="cash_on_delivery">Cash On Delivery</option>
    	</select></div><br>

              <!--button class="btn green darken-3" type="submit" name="action" 
         onclick="show_alert()";>Order
      <i class="material-icons right">send</i> </button-->
      <a class="btn green white-text modal-trigger" href="#myModal" id="order">Order<i class="material-icons right">send</i></a>
     
     <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="padding: 48px;">
  <h4 id="order_your_items">Order Your Items</h4>
  
  <!---Items--------------------------->
    <form class="col" action="" method="" onsubmit=<form onsubmit="return show_alert();" onsubmit="vlaidOrder()">
  
    <div class="row">
        
        <div class="input-field col s10 ">
          <input id="phNo" type="text" class="validate" disabled="disabled" value="09448500348" required>
          <label for="phNo">PhoneNo</label>
        </div>
        <div class="input-field col s2">
          <a href="#" class="btn green white-text"><i class="material-icons">edit</i></a>  
        </div>
      </div>
      <div class="row">
        
        <div class="input-field col s10 ">
          <input id="email" type="email" class="validate" disabled="disabled" value="hsuyeemon@uit.edu.mm" required="required">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s2">
          <a href="#" class="btn green white-text "><i class="material-icons">edit</i></a>  
        </div>
      </div>
     
    <div class="row">
      <div class="input-field col s4 ">
          <input id="sAdd" type="text" class="validate" required="required">
          <label for="sAdd">Street Address</label>
        </div>

        <div class="input-field col s4 ">
          <input id="city" type="text" class="validate" required="required">
          <label for="city">City</label>
        </div>
        <div class="input-field col s4" required="required">
    <select id="state">
      <option value="1">Yangon</option>
      <option value="2">Manadalay</option>
      <option value="3">Magway</option>
    </select>
    <label for="state" id="state_region">State/Region</label>
  </div>
    </div>
    <div class="row">
      <input id="date" type="text" class="datepicker">
      <label for="date" id="date_label">Pick the preferred date</label>
    </div>
     <div class="row">
        <button class="modal-close btn green white-text" type="submit" name="action"
         onclick="show_alert()";>Confirm Order
      <i class="material-icons right">send</i>
      </button>
      <button class="modal-close btn green white-text" type="submit" name="action">Cancel<i class="material-icons right">cancel</i>
      </button>

      </div>
    </form>

   </div>

    </div>


</div></div></div>

<?php
displayPageFooter();
?>