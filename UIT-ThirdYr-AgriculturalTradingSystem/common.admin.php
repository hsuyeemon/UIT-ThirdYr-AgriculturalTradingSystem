<?php

if(!isset($_SESSION)) 
  { 
    session_start(); 
  }
function displayPageHeader( $pageTitle ) {    
  ?>
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

<!--body class="#ccff90 light-green accent-1"-->
  <body>

<?php

  if(isset($_SESSION['login'])){
    $loginStatus = $_SESSION['login'];
  }
  else
    $loginStatus = "normal";
 
  if($loginStatus=="admin"){
  echo "<script>document.getElementById('#login').innerHTML('My Account');</script>";
  ?>
                

  <!--Login--------------------->
  <ul id="authentication" class="dropdown-content">
     <?php
      include("dblink.php");
      $adminId = $_SESSION['adminId'];
      $query = "select * from admin where admin_id ='".$adminId."'";
      //$query = "select * from seller where sid ='1'";
      $ret = mysqli_query ($con,$query);          
      $row=mysqli_fetch_array($ret); 
      $noRows=mysqli_num_rows($ret);
      if($noRows>0){
        echo "<li><a href='#!'' id='user_name'>".$row['user_name']."</a></li>";
      }
      ?>
      <li class="divider"></li>
      <li><a href="#!" id="switch_account">Switch account</a></li>
      <li class="divider"></li>
      <li><a href="logout.php" id="logout">Logout</a></li>
  </ul>

  <!--Control--------------------->
  <ul id="control" class="dropdown-content">
    <li><a href="products.php" class="modal-trigger " id="product_dropdown">Control</a></li>
    <li class="divider"></li>
    <li><a href="approveProducts.php" class="modal-trigger " id="approveProducts">Products</a></li>
    <li class="divider"></li>
    <li><a href="approveUsers.php" class="modal-trigger " id="approveUsers">Users</a></li>
  </ul>

  <?php
  }
  
  else{
    echo "<script>alert('please log in first');
    windows.</script>";
    header('Location: index.php');
    exit(); 
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

 
<nav style="margin-bottom: 0px;height: 80px;">
  <div class="nav-wrapper">
    <a href="#" class="brand-logo" style="margin-left: 16px;padding: 4px;">AgriculturalTradingSystem</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">


      <li><a class="dropdown-trigger" href="#!" data-target="font" id="language">Language<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a href="index.html" id="home">Home</a></li>
      
      <li><a href="index.html#aboutus" id="about_as">About Us</a></li>
      <li><a href="index.html#contactus" id="contact">Contact</a></li-->

      
       <li><a class="dropdown-trigger" href="#!" data-target="products" id="products">Products<i class="material-icons right">arrow_drop_down</i></a></li>
      

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
function displayPageFooter() {
?><!---Footer-------------------------------------------------->
<footer class="page-footer">
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
    $('.sidenav').sidenav();

    });
      
  </script>
  
</body>
</html>
<?php
}
?>
