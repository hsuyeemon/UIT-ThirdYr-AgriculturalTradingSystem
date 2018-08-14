<?php

if(!isset($_SESSION)) 
  { 
    session_start(); 
  }

function displayNavBuyer(){
  ?>
  <!--Login--------------------->
  <ul id="authentication" class="dropdown-content">
     <?php
      include("dblink.php");
      $bid = $_SESSION['bid'];
      $query = "select * from buyer where bid ='".$bid."'";
      //$query = "select * from seller where sid ='1'";
      $ret = mysqli_query ($con,$query);          
      $row=mysqli_fetch_array($ret); 
      $noRows=mysqli_num_rows($ret);
      if($noRows>0){
        echo "<li><a href='#!'' id='user_name'>".$row['bname']."</a></li>";
      }
      ?>
      <li class="divider"></li>
      <li><a href="logout.php" id="switch_account">Switch account</a></li>
      <li class="divider"></li>
      <li><a href="logout.php" id="logout">Logout</a></li>
  </ul>


<!--Login Form------------>
  <div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog" style="padding: 48px;">
      <h3>Login To Your Account</h3>
    <form action="login.php" method="post" class="col s12">

      <div class="row ">
        <div class="input-field col s12 ">
          <i class="material-icons prefix">account_circle</i>
          <input id="email" type="text" class="validate" required="required" 
          name="logemail">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row ">
        <div class="input-field col s12 ">
          <i class="material-icons prefix">lock</i>
          <input id="password" type="password" class="validate" required="required" name="logpwd">
          <label for="password">Password</label>
        </div>
        <label style='float: right;'>
        <a class='pink-text' href='#!'><b>Forgot Password?</b></a>
        </label>
      </div>
      <div>
        <p>
          <label>
            <input class="with-gap" name="group3" value="seller" type="radio" required="required" />
            <span>Seller</span>
          </label>
        </p>
        <p>
          <label>
            <input class="with-gap" name="group3"  value="buyer" type="radio" required="required" />
            <span>Buyer</span>
          </label>
        </p>
        <p>
          <label>
            <input class="with-gap" name="group3" type="radio" required="required" value ="admin"/>
            <span>Admin Account</span>
          </label>
        </p>
      </div>
      <br>
      <button type="submit" class="btn btn-primary green white-text">Login</button>
    </form>
    </div>
  </div>


  <!--Product--------------------->
  <ul id="product" class="dropdown-content">
    <li><a href="products.php" class="modal-trigger " id="product_dropdown">Products</a></li>
    <li class="divider"></li>
    <li><a href="userOrders.php" class="modal-trigger " id="my_order">My Orders</a></li>
    <li class="divider"></li>
    <li><a href="cart.php" class="modal-trigger " id="cart">Cart</a></li>
  </ul>

  <!---Navigation------------------------------------->
  
  <!-- Dropdown Structure -->

    <!--Language------------------>
  <ul id="font" class="dropdown-content">
    <li><a href="index.php?lan_flag=1"  id="myanmar">ျမန္မာစာ</a></li>
    <li class="divider"></li>
    <li><a href="index.php?lan_flag=0" id="english">English</a></li>
  </ul>

  <!---Navigation-->
<nav style="margin-bottom: 0px;height: 80px;">
  <div class="nav-wrapper">
    <a href="#" class="brand-logo" style="margin-left: 16px;padding: 4px;">AgriculturalTradingSystem</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">


      <li><a class="dropdown-trigger" href="#!" data-target="font" 
        id="language">Language<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a href="index.php" id="home1">Home</a></li>
      
      <li><a href="index.php#aboutus" id="about_as">About Us</a></li>
      <li><a href="index.php#contactus" id="contact">Contact</a></li-->
      
       <li><a class="dropdown-trigger" href="#!" data-target="product" 
        id="products">Products<i class="material-icons right">arrow_drop_down</i></a></li>
      

      <li><a class="dropdown-trigger" href="#!" data-target="authentication" id="login1">UserName
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
<?php
}


  //session_start(); 
if(isset($_GET['lan_flag'])){
$_SESSION['lan_flag']=$_GET['lan_flag'];
}
$lan_flag=null;
//echo $_SESSION['lan_flag'];
if(isset($_SESSION['lan_flag'])){
$lan_flag=$_SESSION['lan_flag'];
}

  if ($lan_flag) {
 ?>
<script type="text/javascript">
  language();
  function language(){
   
    document.getElementById('home1').innerHTML="ပင္မ စာမ်က္ႏွာ";
    document.getElementById('language').innerHTML="ဘာသာစကား";  
    document.getElementById("product").innerHTML="ကုန္ပစၥည္း မ်ား ";
    document.getElementById("about_as").innerHTML="ကြၽႏုပ္တို႔ အေၾကာင္း";
    document.getElementById("contact").innerHTML="ဆက္သြယ္ရန္";
    document.getElementById("login1").innerHTML="အေကာင့္ ဝင္ရန္ ";
    document.getElementById("login_dropdown").innerHTML="အေကာင့္ ဝင္ရန္ ";
    document.getElementById("product_dropdown").innerHTML="ကုန္ပစၥည္း မ်ား";
    document.getElementById("my_product").innerHTML="မွာယူထားေသာပစၥည္းမ်ား";
    document.getElementById("my_order").innerHTML="မွာယူရန္စာရင္း";
    document.getElementById("cart").innerHTML="ေၾကာ္ျငာထားေသာပစၥည္းမ်ား";

    
    document.getElementById("user_name").innerHTML="အမည္";
    document.getElementById("switch_account").innerHTML="အေကာင့္ခ်ိန္းရန္";
    document.getElementById("logout").innerHTML="အေကာင့္ထြက္ရန္";
    document.getElementById("contact_us").innerHTML="ဆက္သြယ္ရန္";
    document.getElementById("about_as1").innerHTML="ကြၽႏုပ္တို႔ အေၾကာင္း";

  }  
</script> 
  <?php
}
?>