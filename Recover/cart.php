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


//$_SESSION['pid1Incart']=null;
$token=null;
$result=null;
if(isset($_GET['pid'])){
  if(isset($_SESSION['pid1Incart'])){
$_SESSION['pid1Incart'].=$_GET['pid'].",";
    }
else
  $_SESSION['pid1Incart']=$_GET['pid'].",";
}

if(isset($_SESSION['pid1Incart'])){
$token = strtok($_SESSION['pid1Incart'], ",");
}
$i=0;
while ($token !== false)
{
$pids[$i]=$token;
$token = strtok(",");
$i++;
}
if($pids[0]!=null){



$result = mysqli_query($con,"SELECT * FROM product where pid IN (".implode(',',$pids).")");

$itid=1;
$sum = 0;

$num_rows = mysqli_num_rows($result);
echo "<span id='num_row'>$num_rows</span>";
//echo "<span id='num_row'>$num_rows</span>";
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

while($row = mysqli_fetch_array($result))
{
  
$image = $row['p_image'];
$imageData = base64_encode(file_get_contents($image));


// Format the image SRC:  data:{mime};base64,{data};
$src = 'data: '.mime_content_type($image).';base64,'.$imageData;
?>

    <tr id ='<?php echo "div$itid"; ?>'>
      <td><img src='<?php echo $src;?>' height="100px" width="100px"></td>
      <td id='<?php echo "pid$itid";?>'><?php echo $row['pname'];?></td>
      <td  >
        <div class="input-field">
           <input id='<?php echo "quantity$itid";?>' class="validate" type="number" value="1" onchange='calculate(<?php echo $itid;?>)'>

           <input type="hidden" id='<?php echo "price$itid";?>' value='<?php echo $row["price"];?>'>

        <label for="quantity">Quantity</label>
        </div></td>
       <script type="text/javascript">

  function calculate(id) {
    // body...
    alert(id);
    var i = document.getElementById('<?php echo "quantity'+id+'";?>').value;
    var price = document.getElementById('<?php echo "price'+id+'";?>').value;
      document.getElementById('<?php echo "cost'+id+'";?>').innerHTML = i*price;
    }

</script>

      <td id='<?php echo "cost$itid";?>'>
        <?php echo $row['price']?>
          
        </td>

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
}
?>
<!--button type="button" onclick="getvalue();">getvalue</button-->
<script type="text/javascript">
alert("calculate");
           // var cost = document.getElementById('<?php echo "quantity$itid";?>//').innerHTML;
             function calculate(){
              alert("calculate");
              var quantity=document.getElementById('<?php echo "quantity$itid";
               ?>').innerHTML;
              var cost = (int)quantity*(int)cost;
              alert(cost);
             }
             document.write('<td id=>'+cost+'</td>');
                        </script>


<script type="text/javascript">
//alert("script");
  var cart=new Array();
 // function getvalue(){
    //alert("getvalue");
  var totalrow=document.getElementById('num_row').innerHTML;
  var i=0;
    var getpid='pid'+(i+1);
    var getprice='price'+(i+1);
    alert(document.getElementById(getpid).innerHTML);
  //  cart.push(document.getElementById(getprice).innerHTML);
    
  
  //cart.toString();
   // alert(cart);
  //}
  

   // var cart= ["Apple",2.00,2,"orange",2.00,2,"pineapple",2.00,2,"Apple",2.00,2] ;
  //var jsonString = JSON.stringify(cart);


//  $.ajax({
//   url: "receiveFromJS.php",
//   type: "POST",
//   data:{data : jsonString}

// }).done(function(data) {
//      console.log(data);
// });
//  alert(value);
// }
</script>


<script type="text/javascript">

  var cart=new Array();
  function getvalue(){
  var totalrow=document.getElementById('num_row').innerHTML;
  var i=0;
    var getpid='pid'+(i+1);
    var getprice='price'+(i+1);
    alert(document.getElementById(getpid).innerHTML);
  //  cart.push(document.getElementById(getprice).innerHTML);
    
  
  //cart.toString();
   // alert(cart);
  }
  
</script>



                <script type="text/javascript">
                  
                  function vlaidOrder()
                  {
                  var phNo=document.getElementById("phNo").value;
                  var sAdd=document.getElementById("sAdd").value;
                  var city=document.getElementById("city").value;

                  var phNoReg=/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
                  var sAddReg=/^[A-Za-z\s]+$/;

                  var cityReg=/^[A-Za-z\s]+$/;

                  if (phNo.match(phNoReg))
                  {
                    if (sAdd.match(sAddReg))
                    {
                       if (city.match(cityReg))
                       {
                         alert("Success");
                         return false;
                        
                       }else{
                        alert ("Invalid city");
                        return false;
                       }
                    }else{
                      alert ("Invalid Street Address");
                      return false;
                    }

                  }else{
                    alert ("Invalid Phone Number");
                    return false;
                  }
                }

                </script>

<?php
displayPageFooter();
?>