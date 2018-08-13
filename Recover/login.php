<?php 
             if(!isset($_SESSION)) 
          { 
          session_start(); 
          }

include("dblink.php");
//include("index.php");
?>


<?php 
if(isset($_POST["logemail"])){
$regemail=$_POST["logemail"];
}?>
<?php if(isset($_POST["logpwd"]) && isset($_POST["group3"])){
  $regpwd=$_POST["logpwd"];
  $rdvalue=$_POST['group3'];
 
if (strcmp($rdvalue, 'seller') == 0) {
    $info=mysqli_query($con," SELECT sid,s_pwd FROM seller where s_email='$regemail'");
    while($row=mysqli_fetch_assoc($info)){
        $fetchid=$row['sid'];
        $fetchpwd=$row['s_pwd'];
       
    }
   $row = mysqli_num_rows($info);
   if ($row>0){
    # code...
    //echo "have user";

    if (strcmp($regpwd,$fetchpwd ) == 0) {
  echo "same";
  $_SESSION['login'] = "seller";
  $_SESSION['sid'] = $fetchid;

}else{
   echo "<script>alert('User name or password incorrect');</script>";
}

   }
   else{
    echo "<script>alert('No Account Matched.');</script>";
    
   }
   session_write_close();
   header('Location: index.php');
exit();

    
}elseif(strcmp($rdvalue, 'buyer') == 0){
  $info=mysqli_query($con," SELECT bid,b_pwd FROM buyer where b_email='$regemail'");
  while($row=mysqli_fetch_assoc($info)){
        $fetchid=$row['bid'];
        $fetchpwd=$row['b_pwd'];
       
    }
    $row = mysqli_num_rows($info);
   if ($row>0) {
    # code...
    //echo "have user";
    if (strcmp($regpwd,$fetchpwd ) == 0) {
  //echo "same";

   $_SESSION['login'] = "buyer";
  $_SESSION['bid'] = $fetchid;
  session_write_close();
 include("index.php");
 
}else{
  echo "<script>alert('User name or password incorrect');</script>";
}

   }
   else{
    echo "<script>alert('No Account Matched.');</script>";
    //include("index.php");
   }   

   session_write_close();
   //echo $_SESSION['login'];
   //include("index.php");
   //exit();
   header('Location: index.php');
   exit();

}

elseif(strcmp($rdvalue, 'admin') == 0){
  echo "<script>alert('HI Admin');</script>";
  //echo "admin";
  $info=mysqli_query($con," SELECT admin_id,password FROM admin where user_name='$regemail'");
  while($row=mysqli_fetch_assoc($info)){
        $fetchid=$row['admin_id'];
        $fetchpwd=$row['password'];
       
    }
    $row = mysqli_num_rows($info);
   if ($row>0) {
    # code...
    //echo "have user";
    if (strcmp($regpwd,$fetchpwd ) == 0) {
     // echo "same";

   $_SESSION['login'] ="admin";
  $_SESSION['admin_id'] = $fetchid;
  session_write_close();
   include("admin_product.php");
  
  
 
}else{
  echo "<script>alert('User name or password incorrect');</script>";
}

   }
   else{
    echo "<script>alert('No Account Matched.');</script>";
    //include("index.php");
   }
  
   session_write_close();
   header('Location: admin_product.php');
   exit();
}

}
 session_write_close();
   header('Location: index.php');
   exit();


?>

