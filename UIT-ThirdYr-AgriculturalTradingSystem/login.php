<?php 
		
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
       		include("index.php");

          ?>
