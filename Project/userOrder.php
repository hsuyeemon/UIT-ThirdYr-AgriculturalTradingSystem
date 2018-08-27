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


  if(isset($_POST['orderid'])){
  //echo $_POST['oid'];
  $setDelivered = mysqli_query($con,"UPDATE order_product
   SET delivered=1 where oid='".$_POST['orderid']."'");
   echo "<script>alert('update successful');</script>";
      } 
    
?>
<div class="content padding-normal">
       <h4  id="pending_orders">Pending Orders</h4>
<table>
<tr><th>product name</th>
      <th>seller address</th>
      <th>pick up address</th>
      <th>expected delivery date</th>
      <th>ordered time</th>
      <th>quantity</th>
      <th>cost</th><th></th><tr>
<?php
      if($pending_num_rows>0){
while($row = mysqli_fetch_array($pending_product_result))
{
echo "<tr><td><a href='productDetails.php?productId=".$row['pid']."'>";
echo $row['pname'];
echo "</a></td>";

echo "<td>";
echo $row['from_addr'];
echo "</td>";

echo "<td>";
echo $row['to_addr'];
echo "</td>";

echo "<td>";
echo $row['expect_delivery_date'];
echo "</td>";

echo "<td>";
echo $row['order_time'];
echo "</td>";

echo "<td>";
echo $row['quantity'];
echo "</td>";

echo "<td>";
echo $row['cost'];
?>
</td><td>
<!--form id="pending" method="" action="">
      <a class='btn btn-default' onclick='delivery()'>pending</a>
      <input type='hidden' value="<--?php echo $row['oid'];?>" name='oid'>
</form-->
  <a class='btn btn-default modal-trigger' href="#myModal">pending</a>

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
<br> <h4  id="delivered_order">Delivered Orders</h4>
 <?php

echo "<table>";
echo "<tr><th>product name</th>
      <th>seller address</th>
      <th>pick up address</th>
      <th>expected delivery date</th>
      <th>ordered time</th>
      <th>quantity</th>
      <th>cost</th><th></th><tr>";

if($delivered_num_rows>0){
while($row = mysqli_fetch_array($delivered_product_result))
{
  //echo "pid".$row['pid'];
echo "<tr><td><a href='productDetails.php?productId=".$row['pid']."'>";
echo $row['pname'];
echo "</a></td>";

echo "<td>";
echo $row['from_addr'];
echo "</td>";

echo "<td>";
echo $row['to_addr'];
echo "</td>";

echo "<td>";
echo $row['expect_delivery_date'];
echo "</td>";

echo "<td>";
echo $row['order_time'];
echo "</td>";

echo "<td>";
echo $row['quantity'];
echo "</td>";

echo "<td>";
echo $row['cost'];
echo "</td>";

?>
</td><td>
<!--<form id="delivered" method="" action="">-->
      <a class='btn btn-default modal-trigger' href="#myModal2">Comment/Rate</a>
     <!-- <input type='hidden' value="<--?php echo $row['oid'];?>" name='oid'>
</form--></td>
</tr>
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog" style="padding: 48px;">

      <h2 id="review">Review</h2>

     <div class="row">

      <form id="comment" action="userOrder.php" method="post">
        <input type="text" name="nn" value="<?php echo $row['oid'];?>">
    <div class="input-field col s12">
      <!--If not used prefix class the icon overflow the textarea-->
      <i class="material-icons prefix">comment</i>
      <textarea id="txta1" class="materialize-textarea" maxlength="400"></textarea>
      <label for="txta1">Textarea</label>

    </div>
     <input type="submit" class="btn btn-success right green white-text" value="Submit" id="review"  onclick=""/>
  </div>
      <!--Rating-->

      <!-----Rating------------------------>
  
  <div class="hreview-aggregate">
    <div class="row">
      <div class="col s12 m6 l6">
        <meta itemprop="worstRating" content="1">
        <meta itemprop="bestRating" content="5">
        <meta itemprop="reviewCount" content="1">
        <div class="row">
          <div class="score col s12">
            5
          </div>
          <div class="rating-stars col s12">
            <input type="radio" name="stars" id="star-null">
            <input type="radio" name="stars" id="star-1" saving="1" data-start="1" checked="">
            <input type="radio" name="stars" id="star-2" saving="2" data-start="2" checked="">
            <input type="radio" name="stars" id="star-3" saving="3" data-start="3" checked="">
            <input type="radio" name="stars" id="star-4" saving="4" data-start="4" checked="">
            <input type="radio" name="stars" id="star-5" saving="5" checked="">
            <section>
              <label for="star-1">
                <svg width="255" height="240" viewBox="0 0 51 48">
                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"></path>
                </svg>
            </label>
<label for="star-2">
                  <svg width="255" height="240" viewBox="0 0 51 48">
                      <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"></path>
                  </svg>
              </label>
<label for="star-3">
                  <svg width="255" height="240" viewBox="0 0 51 48">
                      <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"></path>
                  </svg>
              </label>
<label for="star-4">
                  <svg width="255" height="240" viewBox="0 0 51 48">
                      <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"></path>
                  </svg>
              </label>
<label for="star-5">
                  <svg width="255" height="240" viewBox="0 0 51 48">
                      <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"></path>
                  </svg>
              </label>
            </section>
          </div>
          <div class="reviews-stats col s12">
            <span class="reviewers-small"></span>
            <span class="reviews-num">
                 1
              </span> total
          </div>
        </div>
      </div>
      <div class="rating-histogram col s12 m6 l6">
        <div class="rating-bar-container five">
          <span class="bar-label">
                                  <span class="star-tiny">
                                </span> 5
          </span>
          <span class="bar">
                              </span>
          <span class="bar-number">
                              1
                              </span>
        </div>
        <div class="rating-bar-container four">
          <span class="bar-label">
                                  <span class="star-tiny">
                                </span> 4
          </span>
          <span class="bar">
                              </span>
          <span class="bar-number">
                              1
                              </span>
        </div>
        <div class="rating-bar-container tree">
          <span class="bar-label">
                                  <span class="star-tiny">
                                </span> 3
          </span>
          <span class="bar">
                              </span>
          <span class="bar-number">
                              1
                              </span>
        </div>
        <div class="rating-bar-container two">
          <span class="bar-label">
                                  <span class="star-tiny">
                                </span> 2
          </span>
          <span class="bar">
                              </span>
          <span class="bar-number">
                              1
                              </span>
        </div>
        <div class="rating-bar-container one">
          <span class="bar-label">
                                  <span class="star-tiny">
                                </span> 1
          </span>
          <span class="bar">
                              </span>
          <span class="bar-number">
                              1
                              </span>
        </div>
      </div>
    </div>
  </div>
  </form>
    </div>
</div>


<?php
}
}
else{
	echo "<tr><td>you haven't order anything yet!!</td></tr>";
}
echo "</table>";

?>
</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="padding: 48px;">
    <form action="userOrder.php" method="post">
  type your order id <input type="text" name="orderid">
  <input type="submit" name="submit">
</form> 
    </div>
  </div>






<script type="text/javascript">
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
</script>
<?php
displayPageFooter();
?>