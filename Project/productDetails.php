<?php

include( "common.php" );
include( "dblink.php" );
displayPageHeader( "productDetails" );
?>

<?php 
global $pid;
if(isset($_POST['order'])){
  echo "<script>alert('haha')</script>";

  $_GET['productId'] = $_POST['pid'];

  // getting current Date Time OOP way
 $currentDateTime = new \DateTime();
 echo $currentDateTime;

 //set timeZone
 $currentDateTime->setTimezone(new \DateTimeZone('America/New_York'));
 $dateTime = $currentDateTime->format('l-j-M-Y H:i:s A');
}

if(isset($_GET['productId'])){
$pid = $_GET['productId'];
//$sid = $_SESSION['sid'];


?>

 <div class="content padding-normal-sync">
  <div>
  <a href="#">Category/</a>
  <a href="#">SubCategory/</a>
  <a href="#">ProductName/</a>
  </div>

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


?>

<div class="row ">
    <div class="col s3 padding-normal">
      <h3 id="productName" name="pname">
        <?php echo $pname;?>  
      </h3>
      <p class="details" id="productPrice" name="price">
      <?php echo $price ." ". $currency ." per ". $unit?></p>
      <p class="details" id="productVendor"><a> <?php echo "Seller :$seller"; ?> </a></p><br>
        <?php echo $phone;?>
        <a class="btn green white-text" href="tel:
        <?php echo $phone;?>" id="call">Call to Vendor</a>
    
    </div>
    <div class="carousel col s9" style="margin:0px;height: 200px; ">
<?php
$res3 = mysqli_query($con,$productDetails) or die(mysql_error());

//$filearray=array();
//$rows3= mysqli_fetch_assoc($res3);

while($row3 = mysqli_fetch_assoc($res3)){
//echo $row3["p_image"]; 
$array = explode(',', $row3["p_image"]);
//echo sizeof($array);
if(sizeof($array)>0){
foreach ($array as $url) {
  # code...
  $imageData = base64_encode(file_get_contents($url));
  $src = 'data: '.mime_content_type($url).';base64,'.$imageData;
  //echo $src;
    echo "<a class='carousel-item' href='#one!'><img src='".$src."' height='500px' width='500px'></a>";
  }
}
else{
  # code...
  $imageData = base64_encode(file_get_contents($url));
  $src = 'data: '.mime_content_type($row3["p_image"]).';base64,'.$imageData;
  //echo $src;
    echo "<a class='carousel-item modal-trigger' href='#mymodal3'><img src='".$src."' height='500px' width='500px'></a>";

}
}
?>

</div>
</div>
<!--img src="images/fertilizer.jpg" height="200px" width="200px"-->
 <p class="details"><b>Product Description: </b><?php echo $des;?> </p>
 <p class="details"><b>Product Qualification: </b><?php echo $Qualification;?> </p>
 
 <a class="btn green white-text modal-trigger" 
 href="#myModal2" id="order">Order<i class="material-icons right">send</i></a>

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
           <div class="row">

<div class="input-field col s12 ">
          <input id="phoneno" type="text" class="validate" value="<?php echo $n3['b_phoneno'];?>" required>
          <label for="phoneno">PhoneNo</label>
        </div>
        
      </div>
      <div class="row">
        
        <div class="input-field col s12 ">
          <input id="email" type="email" class="validate" value="<?php echo $n3['b_email'];?>" required="required">
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
      <input id="date" type="text" class="datepicker">
      <label for="date" id="date_label">Pick the preferred date</label>
    </div>
     <div class="row">
        <button class="btn green white-text" name="order1" onclick="confirm_alert()">Confirm Order
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
     <script>
    alert("hah");
  function confirm_alert() {
   
  if(confirm("Are you sure to confirm the order?")){
    var form = document.getElementById('order_Form');
    form.action="productDetails.php";
    form.method="post";
    form.submit():
  }
  }
  $(document).ready(function(){
    $('.datepicker').datepicker();
  });
      
</script>
 
 <a class="btn green white-text modal-trigger" href="cart.php?
     pid=<?php echo $pid;?>">Add to Cart<i class="material-icons right">send</i></a>


  <br><br>
  <div><a class="btn green white-text  modal-trigger" href="#myModal" id="call">Comment and rating</a></div>
  <?php 
if(isset($_POST['commentSubmit'])){
$sql="INSERT INTO comment VALUES ('6','2234',".$_POST["comment"]."',2,2)";
$result=mysqli_query($con,$sql);
if($result) {
  echo ("<script LANGUAGE='JavaScript'>
  alert('Comment have been recorded');
    </script>");}
}
?>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="padding: 48px;">

      <h2 id="review">Review</h2>

     <div class="row">
    <div class="input-field col s12">
      <!--If not used prefix class the icon overflow the textarea-->
      <i class="material-icons prefix">comment</i>
      <textarea id="txt" name="comment" class="materialize-textarea" maxlength="400"></textarea>
      <label for="txta1">Comment</label>

    </div>
     <input type="submit" class="btn btn-success right green white-text" name="commentSubmit" value="Submit" id="review"  onclick=""/>
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
    </div>
</div>
</div>
    </div>
  <br><hr>

<?php
$rating ="SELECT c.rating FROM order_product AS o,comment AS c WHERE o.pid=$pid AND c.oid=o.oid AND c.cmt_time>=(SELECT MAX(c.cmt_time) FROM order_product AS o,comment AS c WHERE o.pid='$pid' AND c.oid=o.oid)";

   $res4 = mysqli_query($con,$rating) or die(mysqli_error($con));
   $rows4  = mysqli_fetch_array($res4);
   $rating = $rows4['rating'];

?>

 <!-----Rating------------------------>
  
       <div class="container padding-normal">
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
                              <?php echo $rating;?>
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
                             <?php echo $rating;?>
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
                              <?php echo $rating;?>
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
                              <?php echo $rating;?>
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
                              <?php echo $rating;?>
                              </span>
        </div>
      </div>
    </div>
  </div>
</div>


  <!----------------Review Hightlight----------------->
  <section id="reviews" class="comments container">
    <?php 
    $cmt ="SELECT o.oid,b.bname,b.bid, c.* FROM buyer AS b, order_product AS o, comment AS c WHERE o.pid=1 AND b.bid=o.bid AND c.oid=o.oid";
   $result = mysqli_query($con,$cmt) or die(mysql_error());
     while ($rows  = mysqli_fetch_array($result)) 
     { 
      $text = $rows['cmt_text'];
      $time = $rows['cmt_time'];
      $buyer= $rows['bname'];
    echo  '<article class="comment">
    <a class="comment-img" href="#non">
      <img src="http://lorempixum.com/50/50/people/1" alt="" width="50" height="50" />
    </a>
      
    <div class="comment-body">
      <div class="text">
        <p>' .$text. '</p>
      </div>
      <p class="attribution">by <a href="#non"></a> <a href="#non">' .$buyer.'</a>' ." at " .$time. '</p>
    </div>
  </article>';
    }
?>



</section>​

  




 <?php
}
displayPageFooter();
?>