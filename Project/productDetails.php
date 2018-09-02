 <link rel='stylesheet' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css'>
 
      <link rel="stylesheet" href="css/styleRating.css">
      <style type="text/css">
        .selected > i.fa {
        color:#FF912C;
        }

      </style>
<?php

include( "common.php" );
include( "dblink.php" );
displayPageHeader( "productDetails" );
?>
<!--style type="text/css">
  
    .carousel .carousel-item {
width:300px !important;
height:300px !important}
</style-->

<?php 
if(isset($_GET['productId'])){
$pid = $_GET['productId'];
//$sid = $_SESSION['sid'];
if(isset($_SESSION["pids"])){
  $_SESSION["pids"] .= $pid.',';
}
else{
  $_SESSION["pids"] = $pid.',';
}

?>


 <div class="content padding-normal-sync">
 <?php
//Product Details
$productDetails = "SELECT * FROM product WHERE pid='$pid'";
$res1 = mysqli_query($con,$productDetails) or die(mysqli_error());
  # code...
   $rows1 = mysqli_fetch_array($res1);
   $pname = $rows1['pname'];
   $price = $rows1['price'];
   $des = $rows1['p_description'];
   $currency = $rows1['currency'];
   $unit= $rows1['UNIT'];
   $Qualification= $rows1['qualification'];


//Seller Info:
$seller ="SELECT * FROM seller LEFT OUTER JOIN product USING(sid) WHERE pid ='".$pid."'";
$res2 = mysqli_query($con,$seller) or die(mysqli_error());
$rows2 =mysqli_fetch_array($res2);
$seller = $rows2['sname'];
$phone = $rows2['s_phoneno'];
//$phone="09448500348";

?>

<div class="row ">
  <h3 id="productName" name="pname">
        <?php echo $pname;?>  
      </h3>
      <br><br>
    <div class="col s4 padding-normal">
      
      <p class="details" id="productPrice" name="price">
        <img src = "images/price.svg">
        <span id="price">Price :</span>
      <?php echo $price ." ". $currency ." per ". $unit?></p>

      <p class="details" id="productVendor"><i class="material-icons left">account_circle</i><span id="seller">Seller :</span><?php echo "$seller"; ?> </a></p>
      <p class="details"><i class="material-icons left">call</i>
       <span id="phoneno">Phone :</span><?php echo "<a href='tel:".$phone."' >".$phone."</a>"?></p>
        
        <p class="details"><i class="material-icons left">assignment</i><span id="Description">Description :</span><?php echo $des;?> </p>

<p class="details"><i class="material-icons left">stars</i><span id="qualification">Qualification :</span><?php echo $Qualification;?></p>

    
    </div>
    <div class="carousel col s8" style="margin:0px;height: 200px;">
<br><br>
<?php
$res3 = mysqli_query($con,$productDetails) or die(mysql_error());

//$filearray=array();
//$rows3= mysqli_fetch_assoc($res3);

while($row3 = mysqli_fetch_assoc($res3)){
//echo $row3["p_image"]; 
  $u = $row3["p_image"];
$array = explode(',', $row3["p_image"]);
//echo sizeof($array);
if(sizeof($array)>0){
foreach ($array as $url) {
  # code...
  $imageData = base64_encode(file_get_contents($url));
  $src = 'data: '.mime_content_type($url).';base64,'.$imageData;
  //echo $src;
    echo "<a class='carousel-item' href='#one!'><img src='".$src."' height='300px' width='300px'></a>";
  }
}
else{
  # code...
  $imageData = base64_encode(file_get_contents($u));
  $src = 'data: '.mime_content_type($row3["p_image"]).';base64,'.$imageData;
  //echo $src;
    echo "<a><img src='".$src."' height='500px' width='500px'></a>";

}
}

?>

</div>
</div>
<!--img src="images/fertilizer.jpg" height="200px" width="200px"-->
 
<a class="btn green white-text modal-trigger" 
 href="#myModal2" id="order">Order<i class="material-icons right">send</i></a>
 
 <a class="btn green white-text modal-trigger" href="cart.php?

     pid=<?php echo $pid;?>" id="addcart">Add to Cart<i class="material-icons right">add_shopping_cart</i></a>
   </div>

 <div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog" style="padding: 48px;">
     <?php
        if (isset($_SESSION['bid'])) {
          $buyerInfo = "SELECT * FROM buyer where bid='".$_SESSION['bid']."'";

          $res3 = mysqli_query($con,$buyerInfo) or die(mysqli_error($con));

          $n3 = mysqli_fetch_array($res3);

          ?>

  <h4>Order Your Items</h4>
  
  <!---Items--------------------------->
    <form id="order_Form" class="col" action="" method="">
          <input type="hidden" name="pid" value="<?php echo $pid;?>">
          <input type="hidden" name="bid" value="<?php echo $n3['bid'];?>">
          <input type="hidden" name="to_addr" value="<?php echo $n3['b_address'];?>">
          <input type="hidden" name="from_addr" value="<?php echo $rows2['s_address'];?>">
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



  <br><br>
    <div style="display:none"><a class="btn green white-text  modal-trigger" href="#myModal" id="call">Comment and rating</a></div>

    <?php 


  //  $q = "SELECT * FROM order_product "
   // if(isset($_SESSION['bid']))


if(isset($_POST['commentSubmit'])){
$sql="INSERT INTO comment(cmt_text,rating,oid) VALUES ('".$_POST["comment"]."','".$_POST["stars"]."',2)";
$result=mysqli_query($con,$sql);
if($result) {
  echo ("<script LANGUAGE='JavaScript'>
  alert('Comment have been recorded');
    </script>");}
  else mysql_errno();
}
?>

<?php
$rating ="SELECT c.rating FROM order_product AS o,comment AS c WHERE o.pid=$pid AND c.oid=o.oid AND c.cmt_time>=(SELECT MAX(c.cmt_time) FROM order_product AS o,comment AS c WHERE o.pid='$pid' AND c.oid=o.oid)";

   $res4 = mysqli_query($con,$rating) or die(mysqli_error($con));
   $rows4  = mysqli_fetch_array($res4);
   $rating = $rows4['rating'];

?>

 <!-----Rating------------------------>
  
       <div class="container padding-normal">

        <h3 style="text-align: center;">Reviews & Rating</h3>
        <?php 
    $r ="SELECT * FROM  ratings where pid= $pid";
   $result = mysqli_query($con,$r) or die(mysqli_error($con));
   $rating  = mysqli_fetch_array($result);
  ?>
  <div class="hreview-aggregate">
          <div class="score" style="text-align: center;">
            <h3>
            <?php echo $rating['total'];?></h3>
          </div>
             
          
    <div class="row">
      <div class="col s3">
      </div>
      
      <div class="col s6 m6 l6" >
        
         <div class='rating-stars'>
    <ul id='stars'>
      <li id="star1" class='star ' title='Poor' data-value='1'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li id="star2" class='star' title='Fair' data-value='2'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li id="star3" class='star' title='Good' data-value='3'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li id="star4" class='star' title='Excellent' data-value='4'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li id="star5" class='star' title='WOW!!!' data-value='5'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      </ul>
      </div>
       <div class="col s3">
      </div>
    </div>
     <?php
     //  echo $rating['total'];
   if($rating['total']>=5){
    ?>
    <script type="text/javascript">
       document.getElementById("star5").classList.add("selected");
          document.getElementById("star4").classList.add("selected");
       document.getElementById("star3").classList.add("selected");
      document.getElementById("star2").classList.add("selected");
      document.getElementById("star1").classList.add("selected");
   </script>
    <?php
   }
   else if($rating['total']>=4){
   ?>
   <script type="text/javascript">
    document.getElementById("star5").classList.remove("hover");
       
    document.getElementById("star4").classList.add("selected");
       document.getElementById("star3").classList.add("selected");
      document.getElementById("star2").classList.add("selected");
      document.getElementById("star1").classList.add("selected");
   
    </script>
   <?php
   }
   else if($rating['total']>=3){
   ?> 
   <script type="text/javascript">
      document.getElementById("star5").classList.remove("hover");
    
      document.getElementById("star3").classList.add("selected");
      document.getElementById("star2").classList.add("selected");
      document.getElementById("star1").classList.add("selected");
   
    </script>

   <?php
   }
   else if($rating['total']>=2){
   ?> 
   <script type="text/javascript">
     document.getElementById("star2").classList.add("selected");
      document.getElementById("star1").classList.add("selected");
    </script>
   <?php
   }
   else if($rating['total']>=1){
   ?> 
   <script type="text/javascript">
      document.getElementById("star1").classList.add("selected");
    </script>
    <?php
  }
    ?>
      </div>

       
        
          <div class="reviews-stats col s12">
            <span class="reviewers-small"></span>
            <span class="reviews-num">

               <?php 
    $r1 ="select count(*) as cot from comment where oid in (select oid from order_product where pid=$pid) group by (oid)";
   $result1 = mysqli_query($con,$r1) or die(mysqli_error($con));
   $rating1 = mysqli_fetch_array($result1);
   echo $rating1['cot'];?>
              </span> total
          </div>
        </div>      
      </div>
 
  </div>


  <!----------------Review Hightlight----------------->
  <section id="reviews" class="comments container">
    
    <?php 
    $cmt ="SELECT o.oid,b.*, c.* FROM buyer AS b, order_product AS o, comment AS c WHERE o.pid=$pid AND b.bid=o.bid AND c.oid=o.oid";
   $result = mysqli_query($con,$cmt) or die(mysql_error());
     while ($rows  = mysqli_fetch_array($result)) 
     { 
      $text = $rows['cmt_text'];
      $time = $rows['cmt_time'];
      $buyer= $rows['bname'];
      $url = $rows['b_profile_image'];

  # code...
  $imageData = base64_encode(file_get_contents($url));
  $src = 'data: '.mime_content_type($url).';base64,'.$imageData;

      ?>
    <article class="comment">
    <a class="comment-img" href="#non">
      <img src="<?php echo $src;?>" alt="" width="50" height="50" />
    </a>
      
    <div class="comment-body">
      <div class="text">
        <!--p>' .$text. '</p-->
        <p><?php echo "$text";?></p>
      </div>
      <p class="attribution">by <a href="#non"></a> <a href="#non"><?php echo "$buyer";?></a>at <?php echo " ".$time;?></p>
    </div>
  </article>
  <?php
    }
?>



</section>​
<script type="text/javascript">
         alert("function");
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



<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">

 // $(document).ready(function(){
  $( "#datepicker" ).datepicker();
    $.datepicker.setDefaults({
     dateFormat: 'yy-mm-dd'
  });
 //   });
 
</script>


  <script>

  function orderline(){
   

   var a = confirm("Are you sure to confirm the order?");
    if(a==true){
     // alert(a);
    var form = document.getElementById('order_Form');
    form.method="post";
    form.action="order.php";
    form.submit();
  }
  }
 
      
</script>

  <script  src="js/rating.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
  $('.modal').modal();
    });

   
</script>
 <?php
}
displayPageFooter();
?>