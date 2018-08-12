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
  //session_start();
  if(!isset($_SESSION)) 
          { 
          session_start(); 
          }
  include("dblink.php");
  $logemail=$_POST["email"];
  $logpwd=$_POST["loginPwd"];
  $logradio=$_POST["group3"];
  //echo $logpwd;
  if (strcmp($logradio, 'seller') == 0) {
    $authenticate=mysqli_query($con,"SELECT sid,s_pwd FROM seller where s_email='$logemail';");
    while($row=mysqli_fetch_assoc($authenticate)){

   $row=mysqli_fetch_assoc($authenticate);
      $fetchpwd=$row['s_pwd'];
      $fetchid=$row['sid'];}
        echo "f".$fetchpwd;
        echo "l".$logpwd;
      if(password_verify($logpwd,$fetchpwd)){
        $_SESSION['login']="seller";
        $_SESSION['sid']=$fetchid;
       // header("location:index.php");
        echo "<script> alert('User email and password match');</script>";

      }else{
           echo "<script> alert('User email and password do not match');</script>";
           //header("location:index.php");
      }
    }
    else{
      $authenticate=mysqli_query($con,"SELECT bid,b_pwd FROM buyer where b_email='$logemail';");
    while($row=mysqli_fetch_assoc($authenticate)){
      $fetchpwd=$row['b_pwd'];
      $fetchid=$row['bid'];}


      if(password_verify($logpwd,$fetchpwd)){
        $_SESSION['login']="buyer";
        $_SESSION['bid']=$fetchid;
        echo "<script> alert('User email and password match');</script>";


      }else{
           echo "<script> alert('User email and password do not match');</script>";
          // header("location:index.php");
      }


    }


include 'index.php';
?>