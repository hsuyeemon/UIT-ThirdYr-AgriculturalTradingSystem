<?php
echo "Haha";
if(isset($_POST['orderid'])){
  echo $_POST['oid'];
  $setDelivered = mysqli_query($con,"UPDATE order_product
   SET delivered=1 where oid='".$_POST['orderid']."'");
   echo "<script>alert('update successful');</script>";
  }


  if(isset($_POST['submitRating'])){

  	echo "comment";
        $oid = $_POST['oid'];
        echo "<script>alert('haha')</script>";

  $comment ="INSERT into comment (cmt_text,oid) values ('".$_POST["cmt"]."', '".$oid."')";
  $res1 = mysqli_query($con,$comment) or die(mysqli_error($con));
   echo "<script>alert('Comment have been recorded');</script>";
      } 
      else{
      	echo "No comment clicked";
      }

      ?>