<?php

if(!isset($_SESSION)) 
  { 
    session_start(); 
  }
function displayNavSeller(){


 ?> 
  <!--Login--------------------->
  <ul id="authentication" class="dropdown-content">

  <?php
      include("dblink.php");
      $sid = $_SESSION['sid'];
      $query = "select * from seller where sid ='".$sid."'";
      //$query = "select * from seller where sid ='1'";
      $ret = mysqli_query ($con,$query);          
      $row=mysqli_fetch_array($ret);
      $noRows=mysqli_num_rows($ret);  
      if($noRows>0){
        echo "<li><a href='#!'' id='user_name'>".$row['sname']."</a></li>";
      }
      ?>
    <li class="divider"></li>
    <li><a href="logout.php" href="#login" class="modal-trigger" id="switch_account">Switch account</a></li>
    <li class="divider"></li>
    <li><a href="logout.php" id="logout">Logout</a></li>
  </ul>

  <!--Product--------------------->
  <ul id="product" class="dropdown-content">
    <li><a href="products.php" class="modal-trigger " id="product_dropdown">Products</a></li>
    <li class="divider"></li>
    <li><a href="userProducts.php" class="modal-trigger " id="my_product">My Products</a></li>
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
  <!---Navigation-->
  <div class="navbar-fixed">
<nav style="margin-bottom: 0px;height: 80px;">
  <div class="nav-wrapper">
    <a href="#" class="brand-logo" style="margin-left: 16px;padding: 4px;font-family: 'Acme'">AgriculturalTradingSystem</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">

      <li><a class="dropdown-trigger" href="#!" data-target="font" id="language">Language<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a href="index.php" id="home1">Home</a></li>
      
      <li><a href="index.php#aboutus" id="about_us">About Us</a></li>
      <li><a href="index.php#contactus" id="contact_us">Contact</a></li>

      
       <li><a class="dropdown-trigger" href="#!" data-target="product" id="products">Products<i class="material-icons right">arrow_drop_down</i></a></li>
      

      <li><a class="dropdown-trigger" href="#!" data-target="authentication" id="username">User
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
</div>
<?php
}
?>