<!DOCTYPE html>
<html>
<head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <link href="css/style.css" rel="stylesheet" />  


</head>

<body class="#ccff90 light-green accent-1">

<?php
      //include("dblink.php");
      session_start();

      /* initialize as dummy*/
      /*
       normal user = 0;
       buyer = 1;
       seller = 2;
       */

      $_SESSION['login']="1";

      /* get the user id*/
      //$sid = $_POST['seller'];
      //$bid = $_POST['buyer'];

      $isTouch=empty($_SESSION['login']);
      if($isTouch){
       $loginStatus ="0";
      }
      else{
        $loginStatus = $_SESSION['login'];
      }

            filter($loginStatus);

      
            ?>

            <?php 
            function test(){
              echo "test";
              //filter(0);
            }
            ?>
            <?php



  function filter($loginStatus){
 echo $loginStatus;
    
      /**
       buyer
       **/

      if($loginStatus==1){
      ?> 
      <!--Drop Down Structure-->  
      <!--Login--------------------->
      <ul id="authentication" class="dropdown-content">
         <?php

      
          //$user_name = "select name from buyer where sid ='".$_POST["buyer"]."'";
          //$ret = mysqli_query ($con,$query);
         $user_name = "Hsu";
           
          echo "<li><a href='#!'' id='user_name'>".$user_name."</a></li>";
    
            ?>
        <li class="divider"></li>
        <li><a href="#!" id="switch_account">Switch account</a></li>
        <li class="divider"></li>
        <li><a href="#!"  id="logout">Logout</a></li>
      </ul>

      <!--Product--------------------->
      <ul id="products" class="dropdown-content">
        <li><a href="products.html" class="modal-trigger " id="product_dropdown">Products</a></li>
        <li class="divider"></li>
        <li><a href="userOrders.html" class="modal-trigger " id="my_order">My Orders</a></li>
        <li class="divider"></li>
        <li><a href="cart.html" class="modal-trigger " id="cart">Cart</a></li>
      </ul>

        <?php
              }

              /**seller**/
              else if($loginStatus==2){
              ?>
                

    <!--Login--------------------->
    <ul id="authentication" class="dropdown-content">

         <?php
          //$user_name = "select name from seller where sid ='".$_POST["seller"]."'";
          //$ret = mysqli_query ($con,$query);
          $user_name = "Hsu";
           
          echo "<li><a href='#!'' id='user_name'>".$user_name."</a></li>";
    
            ?>
      <li class="divider"></li>
      <li><a href="#!" id="switch_account">Switch account</a></li>
      <li class="divider"></li>
      <li><a href="#!" id="logout" onclick="test()">Logout</a></li>
    </ul>

    <!--Product--------------------->
    <ul id="products" class="dropdown-content">
      <li><a href="products.html" class="modal-trigger " id="product_dropdown">Products</a></li>
      <li class="divider"></li>
      <li><a href="userProducts.html" class="modal-trigger " id="my_product">My Products</a></li>
    </ul>
                <?php
                }
                else{
                ?>
                 <!--Login--------------------->
  <ul id="authentication" class="dropdown-content">
    <li><a href="#login" class="modal-trigger " id="login_dropdown">Login</a></li>
    <li class="divider"></li>
    <li><a href="#signup" class="modal-trigger " id="sign_up">Sign Up</a></li>
    <li class="divider"></li>
  </ul>

  <!--Product--------------------->
  <ul id="products" class="dropdown-content">
    <li><a href="products.html" class="modal-trigger " id="product_dropdown">Products</a></li>
    <li class="divider"></li>
  </ul>
  <?php
              }
  } 
?>
              


  <!---Navigation------------------------------------->
  
  <!-- Dropdown Structure -->

  <!--Language------------------>
  <ul id="font" class="dropdown-content">
    <li><a href="#" id="myanmar" onclick="language()">ျမန္မာစာ</a></li>
    <li class="divider"></li>
    <li><a href="#" id="english" onclick="">English</a></li>
  </ul>

 
  <!--Login Form------------>
  <div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog" style="padding: 48px;">
      <h3>Login To Your Account</h3>
    <form class="col s12">

      <div class="row ">
        <div class="input-field col s12 ">
          <i class="material-icons prefix">account_circle</i>
          <input id="email" type="text" class="validate" required="required">
          <label for="name">Name</label>
        </div>
      </div>
      <div class="row ">
        <div class="input-field col s12 ">
          <i class="material-icons prefix">lock</i>
          <input id="password" type="password" class="validate" required="required">
          <label for="password">Password</label>
        </div>
        <label style='float: right;'>
        <a class='pink-text' href='#!'><b>Forgot Password?</b></a>
        </label>
      </div>
      <div>
        <p>
          <label>
            <input class="with-gap" name="group3" type="radio" required="required" />
            <span>User Account</span>
          </label>
        </p>
        <p>
          <label>
            <input class="with-gap" name="group3" type="radio" required="required" />
            <span>Admin Account</span>
          </label>
        </p>
      </div>
      <br>
      <button type="submit" class="btn btn-primary green white-text">Login</button>
    </form>
    </div>
  </div>

  <!---Sign Up-------------------->
 <div id="signup" class="modal fade large" role="dialog">

    <div class="modal-dialog" style="padding: 48px;">
      <h3>Create an Account</h3>
    <form class="col s12" onsubmit="return validFunction()">
      
      <div class="row">      
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="name" type="text" class="validate" required="required">
          <label for="icon_prefix">Name</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">phone</i>
          <input id="tel" type="tel" class="validate"required="required">
          <label for="tel">Telephone</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" type="email" class="validate" required="required">
          <label for="email">Email</label>
        </div>
      </div>
    
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">home</i>
          <input id="address" type="text" class="validate" required="required">
          <label for="address" >Address</label>
        </div>
      </div>

     <div class="row">
        <div class="input-field col s12">
           <i class="material-icons prefix">credit_card</i>
          <input id="nrc" type="text" class="validate">
          <label for="nrc">NRC</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input id="pw" type="password" class="validate" required="required">
          <label for="pw">Password</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input id="cpw" type="password" class="validate" required="required">
          <label for="cpw">Comfirm Password</label>
        </div>
      </div>
     
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
        <textarea name="brief" id="brief" class="materialize-textarea validate"></textarea>
        <label for="brief">Brief description</label>
        </div>
      </div>

      <div class="file-field input-field">
        <div class="btn green white-text">
          <span>File</span>
          <input type="file" multiple>

        </div>    
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" placeholder="Upload one or more files">
        </div>
      </div>
    <div>
    <br>
    <p>
      <label>
        <input class="with-gap" name="group3" type="radio" checked />
        <span>User Account</span>
      </label>
    </p>
    <p>
      <label>
        <input class="with-gap" name="group3" type="radio" />
        <span>Admin Account</span>
      </label>
    </p>
    </div>
    <br>
    <button type="submit" class="btn btn-primary green white-text">Sign Up</button>
  </form>
  </div>
</div>

<!---Navigation-->
<nav style="margin-bottom: 0px;padding: 0;">
  <div class="nav-wrapper green darken-3">
    <a href="#" class="brand-logo" style="margin-left: 16px">AgriculturalTradingSystem</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">


      <li><a class="dropdown-trigger" href="#!" data-target="font" id="language">Language<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a href="index.html" id="home">Home</a></li>
      
      <li><a href="index.html#aboutus" id="about_as">About Us</a></li>
      <li><a href="index.html#contactus" id="contact">Contact</a></li-->

      
       <li><a class="dropdown-trigger" href="#!" data-target="products" id="products">Products<i class="material-icons right">arrow_drop_down</i></a></li>
      

      <li><a class="dropdown-trigger" href="#!" data-target="authentication" id="login1">Login
        <i class="material-icons right">arrow_drop_down</i></a></li>  
    </ul>

    <!-- for mobile view --> 
      <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="images/2446.jpg">
      </div>
      <a href="#user"><img class="circle" src="images/fertilizer.jpg"></a>
      <a href="#name"><span class="white-text name">John Doe</span></a>
      <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
    </div></li>
    <li><a href="#!"><i class="material-icons">cloud</i>language</a>
    <ul>
      <li><a href="#!">Myanmar</a></li>
      <li><a href="#!">English</a></li>
    </ul></li>
    <li><a href="#!">Products</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">login</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>  
<!-- end of mobile nav  -->
  </div>
</nav>


<!-- HeroShot & HeadLine-------------------------------->
<div class = "content hero-shot">
  <div class = "transparent">
   	<div class="white-text center-align" style="
        padding: 64px;margin: 0px;">
   		 <h4 style ="text-shadow: 3px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">
         <!--ကၽြနု္ပ္တုိ႔သည္ ယူေကမွ သင္ၾကားေရးအခြင့္အလမ္းမ်ားႏွင့္ ထိုးထြင္းတီထြင္တတ္ေသာစိတ္ကူးအေတြးအေခၚမ်ားအား အမ်ားျပည္သူတို႕ထံ ေဆာင္က်ဥ္းေပးပါသည္။ -->
           Marketplace for people in agricultural sector
         </h4>
         <br><br>
         <a href="#" class="btn btn-default waves-effect pulse white green-text">View how it works</a>
   	</div>   
   </div>
</div>

          
<!--Products---------------------------------------------------------------->
  
<div id="Products" class="padding-normal center-align">
 <h3 class="center-align header">Our products</h3>
 <p class="center-align">Agricultural Products,Fertilizer, tools and equipments companies can also sell their products
</p>

  <div class="row"  style="padding-top: 16px;">
   
  <!-- card for agricultural products --------------------------------->

  <a href="products.html#Agricultural">
    <div class="col s12 m5 l4" >
    <div class="card hoverable ">
    <div class="product-category card-image waves-effect waves-block waves-light">
      <!--img class="activator" src="images/2446.jpg"  height="240px"-->
      <div class="slider" >
        <ul class="slides carousel-fixed-item center" >
          <li>
            <img src="images/2446.jpg">
          </li>
          <li>
            <img src="images/2446.jpg">
          </li>
          <li>
            <img src="images/Equipments.jpg">
          </li>
          <li>
            <img src="images/2446.jpg">
          </li>
        </ul> 
      </div>   
    </div></a>
    <div class="card-content">
        <span class="card-title activator grey-text text-darken-4">Agricultural<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Agricultural<i class="material-icons right">close</i></span>
       <div class="collection">
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/Equipments.jpg" alt="" class="circle">
              </div>
              <div class="col s4 m8 l9">
                <p class="title">SubCategory Name</p>

              </div>

            </div>
        </div>
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/Equipments.jpg" alt="" class="circle">
              </div>
              <div class="col s4">
                <p class="title">SubCategory Name</p>
              </div>

            </div>
            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        </div>
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/Equipments.jpg" alt="" class="circle">
              </div>
              <div class="col s4">
                <p class="title">SubCategory Name</p>
              </div>

            </div>
            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        </div>
         
        </div>
    </div>
    </div>
    </div>


<!-- card for fertilizers products ------------------------------->

<a href="products.html#fertilizer">
    <div class="col s12 m5 l4">
    <div class="card hoverable">
    <div class="product-category card-image waves-effect waves-block waves-light">
      <!--img class="activator" src="images/fertilizer.jpg"  height="240px"-->
      <div class="slider">
        <ul class="slides">
          <li>
            <img src="images/fertilizer.jpg">
          </li>
          <li>
            <img src="images/fertilizer.jpg">
          </li>
          <li>
            <img src="images/fertilizer.jpg">
          </li>
          <li>
            <img src="images/fertilizer.jpg">
          </li>
        </ul>
      </div>   </a>
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Fertilizers<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Fertilizers<i class="material-icons right">close</i></span>
         <div class="collection">
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/Equipments.jpg" alt="" class="circle">
              </div>
              <div class="col s4 m8 l9">
                <p class="title">SubCategory Name</p>

              </div>

            </div>
        </div>
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/fertilizer.jpg" alt="" class="circle">
              </div>
              <div class="col s4">
                <p class="title">SubCategory Name</p>
              </div>

            </div>
            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        </div>
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/Equipments.jpg" alt="" class="circle">
              </div>
              <div class="col s4">
                <p class="title">SubCategory Name</p>
              </div>

            </div>
            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        </div>
         
        </div>
    </div>
    </div>
    </div>

  <!-- card for equipments products --------------->

<a href="products.html#Equipments">
    <div class="col s12 m5 l4">    
    <div class="card hoverable"">
    <div class="product-category card-image waves-effect waves-block waves-light">
      <!--img class="activator" src="images/equipments.jpg"  height="240px"-->
      <div class="slider" height="240px">
        <ul class="slides">
          <li>
            <img src="images/equipments.jpg">
          </li>
          <li>
            <img src="images/equipments.jpg">
          </li>
          <li>
            <img src="images/equipments.jpg">
          </li>
          <li>
            <img src="images/equipments.jpg">
          </li>
        </ul>
      </div>   </a>
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Equipments<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Equipments<i class="material-icons right">close</i></span>
        <div class="collection">
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/Equipments.jpg" alt="" class="circle">
              </div>
              <div class="col s4 m8 l9">
                <p class="title">SubCategory Name</p>

              </div>

            </div>
        </div>
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/Equipments.jpg" alt="" class="circle">
              </div>
              <div class="col s4">
                <p class="title">SubCategory Name</p>
              </div>

            </div>
            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        </div>
        <div class="collection-item">
            <div class="row collection-item avatar">
              <div class="col s2">
              <img src="images/Equipments.jpg" alt="" class="circle">
              </div>
              <div class="col s4">
                <p class="title">SubCategory Name</p>
              </div>

            </div>
            <!--div class="row">
            <h6>Our mission is profitable growth through superior customer service, innovation, quality and commitment</h6>
            </div--> 
        </div>
         
        </div >    </div>
    </div>
    </div>

  </div>
</div>
        
       
<!--Slider-->
    <div class="row">
<div class="slider" style="height: 400px;width: 100%;margin-bottom: 8px;">
  <ul class="slides">
    <li>
      <img src="images/Screenshot (214).png" class="responsive">
    </li>
    <li>
      <img src="images/get-blog-image.jpg">
    </li>
    <li>
      <img src="images/dummy.jpg">
    </li>
  </ul>
    </div>
    </div>



<!--Features-->
<div class="feature #b9f6ca green accent-1 padding-normal-sync">
  <h4 class="center-align header">What we do</h4>
  <div class="row text-center container">
   
    <div class="col s6 center-align">
      <div>
        <i class="circle material-icons md-dark" >transfer_within_a_station
</i>  
        <h6>Logistic service </h6>
        <p>Our backbone business will be logistic service.</p>
      </div>
    </div>
    <div class="col s6 center-align">
      <div>
         <i class="circle material-icons md-dark">shop</i>  
        <h6>MarketPlace</h6>
        <p>Seek customers by creating a market place for them.</p>
      </div>
    </div>
    
  </div>
</div>

<!---Footer-------------------------------------------------->
<footer class="page-footer green darken-3 ">
  <div class="row padding-normal container" id="aboutus">


      <h5 class="white-text" id="about_as1" style="text-align: center;padding: 16px;">About Us</h5>
      <p class="grey-text text-lighten-4 center-align">

  Our project team is organized with 7 students from UIT.Our idea is that to help trading agricultural products directly via B2B system.<br><br>

Trading between sellers and customers needs many steps and may face warehouse problems.
Repeated contributions may make the price up to double(or even triple) for buyers.<br><br>

We try hard to solve this problem in our system.
In our website, we efficiently provide logistics service to both sellers and contributors.<br><br>
Sellers and customers can directly trade without needing unnecessary steps that increase cost.<br><br>
It also saves time!!!<br><br>

The important benefit is that "Public can buy agricultural products cheeper than before."<br>



</p></div>
   <div class="row">
    <hr style="width: 300px;color: white">
  </div>

   
<div class="row padding-normal container" id="contactus">
    
      <h5 class="white-text" id="contact_us" style="text-align: center;padding: 16px">Contact Us</h5>

<div class="col s6">
  <ul>
        <li>Ei Nghon Phoo- Project leader and supervisor<br>
            email-einghonphoo@uit.edu.mm</li><br><br>
        <li>Yamin Thiri Aung- Designer and programmer<br>
            email-yaminthiriaung@uit.edu.mm</li><br><br>
        <li>Yamin Theint Theint- Programmer and Language Analyst <br>
            email- yamintheinttheint@uit.edu.mm</li><br><br>
        <li>Khine Min Htwe- Programmer <br>
            email- khineminhtwe@uit.edu.mm</li>      
      </ul>
</div>
<div class="col s6">
  <ul>
        <li>Khin Thantsin- Data analyst<br>
            email-khinthantsin@uit.edu.mm</li><br><br>
        <li>Ye Yint Aung- Content writer and market researcher<br>
            email-yeyintaung@uit.edu.mm</li><br><br>
        <li>Hsu Yee Mon- Coordinator and analyst<br>
            email- hsuyeemon@uit.edu.mm</li>   
      </ul>
      <h4> if you have any conflicts or problems feel free to contact us</h4>
</div>
      
    
  </div>
  <div class="footer-copyright">
    <div class="container center-align">
      © 2018 Agricultural Trading System
    </div>
  </div>
</footer>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
	function language(){
		document.getElementById("language").innerHTML="ဘာသာစကား";
		
		document.getElementById("home").innerHTML="ပင္မ စာမ်က္ႏွာ";
		document.getElementById("products").innerHTML="ကုန္ပစၥည္း မ်ား ";
		document.getElementById("about_as").innerHTML="ကြၽႏုပ္တို႔ အေၾကာင္း";
		document.getElementById("contact").innerHTML="ကြၽန္ပ္တုိ႔ကိုဆက္သြယ္ရန္";
		document.getElementById("login1").innerHTML="အေကာင့္ ဝင္ရန္ ";
		document.getElementById("login_dropdown").innerHTML="အေကာင့္ ဝင္ရန္ ";
		document.getElementById("product_dropdown").innerHTML="ကုန္ပစၥည္း မ်ား";
		document.getElementById("my_product").innerHTML="မွာယူထားေသာပစၥည္းမ်ား";
		document.getElementById("my_order").innerHTML="မွာယူရန္စာရင္း";
		document.getElementById("cart").innerHTML="ေၾကာ္ျငာထားေသာပစၥည္းမ်ား";
		document.getElementById("sign_up").innerHTML="အေကာင့္ ဖြင့္ရန္";
		document.getElementById("user_name").innerHTML="အမည္";
		document.getElementById("switch_account").innerHTML="အေကာင့္ခ်ိန္းရန္";
		document.getElementById("logout").innerHTML="အေကာင့္ထြက္ရန္";
		document.getElementById("contact_us").innerHTML="ကြၽန္ပ္တုိ႔ကိုဆက္သြယ္ရန္";
		document.getElementById("about_as1").innerHTML="ကြၽႏုပ္တို႔ အေၾကာင္း";

	}
</script>	


<!-----Script to Import---------------------->
  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>  
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  


<!------------Script in Index.html--------------->
  <script>

    $(document).ready(function(){
    //drop dowm
    $(".dropdown-trigger").dropdown({ hover: true });
    $('.carousel').carousel();
    $('.modal').modal();
    $('select').formSelect();
    $('.slider').slider();

    });
      
    
  </script>
  <!-- script for mobile nav -->

                  <script type="text/javascript">
                   $(document).ready(function(){
                   $('.sidenav').sidenav();
                    });
                 //filter(0));

                </script>
                 <script>
                   function validFunction()
                   {
                    var name=document.getElementById("name").value;
                    var tel=document.getElementById("tel").value;
                    var email=document.getElementById("email").value
                    var pw=document.getElementById("pw").value;
                    var cpw=document.getElementById("cpw").value;

                    var nameReg=/^[A-Za-z\s]+$/;
                    var telReg=/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;

                    var pwReg= /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
                    if(name.match(nameReg))
                    {
                       if(tel.match(telReg))
                       {
                        if (true) {}
                          if(pw.match(pwReg))
                          {
                             if (pw==cpw)
                             {
                              elert ("Successful ");
                              return false;
                             }else{
                              alert("Please enter same password");
                              return false;
                             }
                          }else{
                            alert("Invalid password");
                            return false;
                          }
                       }else
                       {
                        alert("Invalid telephone");
                        return false;
                       }
                    }else
                    {
                      alert ("Invalid Name");
                      return false;
                    }



                   }
                 </script>

</body>
</html>