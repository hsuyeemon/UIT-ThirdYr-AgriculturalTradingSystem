<!--?php 
		
		 if(!isset($_SESSION)) 
      		{ 
        	session_start(); 
      		}

        	
      		if (empty($_POST["email"])) {
    			$status = 0;
  				}
  				else
  					$status = $_POST["email"];
      		

      		//If login success
      		 /*
		       normal user = 0;
		       buyer = 1;
		       seller = 2;
		       */

      		//if($_POST['status'] == "seller"){
		       if($status == "2"){
      			$_SESSION['login']="2";
            $_SESSION['sid']=$_POST["email"];

      		}
      		else if($status == "1"){
      			$_SESSION['login']="1";
             $_SESSION['bid']=$_POST["email"];
      		}

          session_write_close();
       		include("index.php");

          ?-->

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
  //echo "same";

   $_SESSION['login'] = "admin";
  $_SESSION['admin_id'] = $fetchid;
  session_write_close();
  
 
}else{
  echo "<script>alert('User name or password incorrect');</script>";
}

   }
   else{
    echo "<script>alert('No Account Matched.');</script>";
    //include("index.php");
   }
}
}

?>

