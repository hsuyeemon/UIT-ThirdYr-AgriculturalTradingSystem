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

  <link rel='stylesheet' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css'>
 
      <link rel="stylesheet" href="css/styleRating.css">
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

if(isset($_POST['s'])){
     echo "enter";
        $oid = $_POST['oid'];
        $pid = $_POST['pid'];
        $ratingstars = $_POST['rating'];

  $comment ="INSERT into comment (cmt_text,oid) values ('".$_POST["cmt"]."', '".$oid."')";
  $res1 = mysqli_query($con,$comment) or die(mysqli_error($con));
   
   $test ="select * from ratings where pid=$pid";
  $ret = mysqli_query ($con,$test);
  $noRows=mysqli_num_rows($ret);
  if($noRows>0){
    $rating = "UPDATE ratings SET rating".$ratingstars."=rating".$ratingstars."+1 where pid=".$pid;
    $total = "UPDATE ratings SET total = (5*rating5 + 4*rating4 + 3*rating3 + 2*rating2 + 1*rating1) / (rating5 +rating4 +rating3 +rating2 +rating1) where pid=".$pid;
    $res2 = mysqli_query($con,$rating) or die(mysqli_error($con));
     $update = mysqli_query($con,$total) or die(mysqli_error($con));
   
    echo "<script>alert('Comment have been recorded');</script>";

  }
  else{
    $rating = "INSERT into ratings(rating".$ratingstars.",pid,total) values (".$ratingstars.",".$pid.",".$ratingstars.")";
     $res2 = mysqli_query($con,$rating) or die(mysqli_error($con));
   
  }
     } 
      else{
        echo "No effect";
      }


  if(isset($_POST['orderid'])){
  //echo $_POST['oid'];
  $setDelivered = mysqli_query($con,"UPDATE order_product
   SET delivered=1 where oid='".$_POST['orderid']."'");
   echo "<script>alert('update successful');</script>";
  }




    
?>
<div class="content padding-normal">
       <h4  style=" font-family: 'Acme';" id="pending_orders">Pending Orders</h4>
<table>
<tr><th>product name</th>
      <th>expected delivery date</th>
      <th>quantity</th>
      <th>cost</th><th></th><tr>
<?php
      if($pending_num_rows>0){
while($row = mysqli_fetch_array($pending_product_result))
{
echo "<tr><td><a href='productDetails.php?productId=".$row['pid']."'>";
echo $row['pname'];
echo "</a></td>";

/*
echo "<td>";
echo $row['from_addr'];
echo "</td>";

echo "<td>";
echo $row['to_addr'];
echo "</td>";
*/

echo "<td>";
echo $row['expect_delivery_date'];
echo "</td>";

/*
echo "<td>";
echo $row['order_time'];
echo "</td>";
*/

echo "<td>";
echo $row['quantity'];
echo "</td>";

echo "<td>";
echo $row['cost'];
?>
</td><td>

  <a class='btn btn-default modal-trigger green white-text' href="#myModal">pending</a>

</td>

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
<br> <h4  style=" font-family: 'Acme'" id="delivered_order">Delivered Orders</h4>
 <?php

echo "<table>";
echo "<tr><th>product name</th>
      <th>expected delivery date</th>
      <th>quantity</th>
      <th>cost</th><th></th><tr>";

if($delivered_num_rows>0){
while($row = mysqli_fetch_array($delivered_product_result))
{
  //echo "pid".$row['pid'];
echo "<tr><td><a href='productDetails.php?productId=".$row['pid']."'>";
echo $row['pname'];
echo "</a></td>";
/*
echo "<td>";
echo $row['from_addr'];
echo "</td>";

echo "<td>";
echo $row['to_addr'];
echo "</td>";
*/
echo "<td>";
echo $row['expect_delivery_date'];
echo "</td>";

/*
echo "<td>";
echo $row['order_time'];
echo "</td>";
*/

echo "<td>";
echo $row['quantity'];
echo "</td>";

echo "<td>";
echo $row['cost'];
echo "</td>";

?>
</td><td>
<!--<form id="delivered" method="" action="">-->
      <a class='btn btn-default green modal-trigger' href="#myModal2" data-oid="<?php echo $row['oid'];?>" 
        data-pid="<?php echo $row['pid'];?>">Comment/Rate</a>

     <!-- <input type='hidden' value="<--?php echo $row['oid'];?>" name='oid'>
</form--></td>



<?php
}
}
else{
	echo "<tr><td>you haven't order anything yet!!</td></tr>";
}
echo "</table>";

?>
</div>
<div id="myModal2" class="modal fade" role="dialog" style="width: 550">
  
<div class="hreview-aggregate" style="padding: 48px; width: 500px;">
  <div class="modal-dialog" >
    <h2 id="review">Review</h2>
    <form id="cmtForm" action="" method="">
    <div class="row">
     
      <div class="col s12 padding-normal">
         <div class='rating-stars container'>
    <ul id='stars'>
      <li class='star' title='Poor' data-value='1'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Fair' data-value='2'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Good' data-value='3'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Excellent' data-value='4'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='WOW!!!' data-value='5'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      </ul>
      </div>
    </div>
     
      </div>
      <br>
      <div class='success-box'>
    <div class='clearfix'></div>
    <img alt='tick image' width='32' src='https://i.imgur.com/3C3apOp.png'/>
    <div class='text-message'></div>
    <div class='clearfix'></div>


    <input type="hidden" name="rating" id="rating">
  </div><br>
    
   <div class="row">
    <div class="col s12">
      
    <input type="hidden" name="oid" id="nom">
    <input type="hidden" name="pid" id="pid">
    <div class="input-field col3 s6">
      <!--If not used prefix class the icon overflow the textarea-->
    <i class="material-icons prefix">comment</i>
    <textarea id="txta1" class="materialize-textarea" maxlength="400" name="cmt"></textarea>
      
    <label for="txta1">Textarea</label>

    </div>
  

    </div>
   </div>  <button name="s" class="btn btn-success right green white-text" id="review"  
   onclick="submitRating()">Submit</button>

      </form>
  </div>  
      
  </div>
 
    </div>



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="padding: 48px;">
    <form action="userOrder.php" method="post">
  type your order id <input type="text" name="orderid">
  <input type="submit" name="submit">
</form> 
    </div>
  </div>



<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>



<script type="text/javascript">
  

  $('.modal').modal({
    ready: function(modal, trigger) {
        
        modal.find('input[name="pid"]').val(trigger.data('pid'))
        modal.find('input[name="oid"]').val(trigger.data('oid'))

    }
});
</script>
<!--script type="text/javascript">
      function delivery(){
            var a = confirm("Does your order delivered?");
            var form = document.getElementById("pending");
            if(a==true){
                  //alert("delivered" +form);
                  form.method="post";
                  form.action="userOrder.php";
                  form.submit();
                  //TODO set delivered to 1

            }
            else{
                  alert("fail delivered");
            }
      }
</script-->
 <script  src="js/rating.js"></script>
 <script type="text/javascript">
  function submitRating(){
    alert("submitRating");
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    //alert(ratingValue);
    document.getElementById('rating').value = ratingValue;
    //alert(document.getElementById('rating').value);
    var form1 = document.getElementById('cmtForm');
    alert(form1);
    form1.method = "post";
    form1.action = "userOrder.php";
    form1.submit();

    
  }
</script>

<?php
displayPageFooter();
?>