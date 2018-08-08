 <?php
 if(!isset($_SESSION)) 
  { 
    session_start(); 
  }
  ?>
<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
        <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link href="css/style.css" rel="stylesheet" />  
   <script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>

    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 057 css*/
        .jssorb057 .i {position:absolute;cursor:pointer;}
        .jssorb057 .i .b {fill:none;stroke:#fff;stroke-width:2000;stroke-miterlimit:10;stroke-opacity:0.4;}
        .jssorb057 .i:hover .b {stroke-opacity:.7;}
        .jssorb057 .iav .b {stroke-opacity: 1;}
        .jssorb057 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 073 css*/
        .jssora073 {display:block;position:absolute;cursor:pointer;}
        .jssora073 .a {fill:#ddd;fill-opacity:.7;stroke:#000;stroke-width:160;stroke-miterlimit:10;stroke-opacity:.7;}
        .jssora073:hover {opacity:.8;}
        .jssora073.jssora073dn {opacity:.4;}
        .jssora073.jssora073ds {opacity:.3;pointer-events:none;}
    </style>
     </head>

 <body class="white">
<?php
  
  $isTouch=empty($_SESSION['login']);

  if($isTouch){
   $loginStatus ="0";

  }
  else{
    $loginStatus = $_SESSION['login'];
  }
 
  filter($loginStatus);

  function filter($loginStatus){
      /**
       buyer
       **/
  if($loginStatus==1){
 echo "<script>document.getElementById('#login').innerHTML('My Account');</script>";

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
      <li><a href="#!" id="switch_account">Switch account</a></li>
      <li class="divider"></li>
      <li><a href="logout.php" id="logout">Logout</a></li>
  </ul>

  <!--Product--------------------->
  <ul id="products" class="dropdown-content">

    <li><a href="products.php" class="modal-trigger " id="product_dropdown">Products</a></li>
    <li class="divider"></li>
    <li><a href="userOrders.html" class="modal-trigger " id="my_order">My Orders</a></li>
    <li class="divider"></li>
    <li><a href="cart.html" class="modal-trigger " id="cart">Cart</a></li>
  </ul>

  <?php
  }
 elseif ($loginStatus == 2) {
 ?>            

  <!--Login--------------------->
  <ul id="authentication" class="dropdown-content">

  <?php
      include("dblink.php");
      global $sid;
      //$sid = $_SESSION['sid'];
      $sid = '1';
      $query = "select * from seller where sid ='".$sid."'";
      //$query = "select * from seller where sid ='1'";
      $ret = mysqli_query ($con,$query);          
      $row=mysqli_fetch_array($ret);
      $noRows=mysqli_num_rows($ret);  
      if($noRows>0){
        echo "<li><a href='#!' id='user_name'>".$row['sname']."</a></li>";
      }
      ?>
    <li class="divider"></li>
    <li><a href="#!" id="switch_account">Switch account</a></li>
    <li class="divider"></li>
    <li><a href="logout.php" id="logout">Logout</a></li>
  </ul>

  <!--Product--------------------->
  <ul id="products" class="dropdown-content">
    <li><a href="products.php" class="modal-trigger " id="product_dropdown">Products</a></li>
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
    <li><a href="products.php" class="modal-trigger " id="product_dropdown">Products</a></li>
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
    <form action="login.php" method="post" class="col s12">

      <div class="row ">
        <div class="input-field col s12 ">
          <i class="material-icons prefix">account_circle</i>
          <input id="email" type="text" class="validate" required="required" 
          name="email">
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

        <input type="hidden">



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
    </p-->
    </div>
    <br>
    <button type="submit" class="btn btn-primary green white-text">Sign Up</button>
  </form>
  </div>
</div>


<?php

 include('dblink.php');
$result = mysqli_query($con,"SELECT * FROM product");
$num_rows = mysqli_num_rows($result);
$total=++$num_rows;

// Full Name must be letters, dash and spaces only
     

if(isset($_POST['save'])){
  if(preg_match("/^([a-zA-Z' ]+)$/",$_POST["pname"])){
$seleced_val1=$_POST["selectitem"];
$seleced_val2=$_POST["selectedsub"];
$seleced_cata = $seleced_val1 . '/' . $seleced_val2;
        $sql = "INSERT INTO product(pid, pname, price, p_image,p_description, status, min_amount, max_amount, UNIT, qualification, category,sid) VALUES ('$total','".$_POST["pname"]."','".$_POST["price"]."','".$_POST["image"]."','".$_POST["brief"]."','0','".$_POST["min"]."','".$_POST["max"]."','".$_POST["unit"]."','".$_POST["qualification"]."','$seleced_cata','1')";
       $result=mysqli_query($con,$sql);
       if($result && preg_match("/^([a-zA-Z' ]+)$/",$_POST["pname"])) {
  echo ("<script LANGUAGE='JavaScript'>
  alert('Succesfully added');
    </script>");}
//else {echo mysql_error();}
    # code...

}
else{
 echo ("<script LANGUAGE='JavaScript'>
    alert('Invalid name');
    </script>");
 
}
}
 
# DELETE

    if(isset($_GET['delnews'])){
        echo "string";
              //add ALert to confirm delete

//if(confirm)
$sql2 = "DELETE FROM product WHERE pid='10'";
       $result2=mysql_query($sql2);
       if($result2) {echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully deleted');
    </script>");}
else {echo mysql_error();}
    }

             //UPDATE
 //$result = mysqli_query($con,"SELECT * FROM product");
//$num_rows = mysqli_num_rows($result);
//$total=++$num_rows;
 $result = mysqli_query($con,"SELECT * FROM product WHERE pid='11'");

$row = mysqli_fetch_array($result);
echo $row["p_description"];
echo $row["UNIT"];
    if(isset($_POST['update'])){
       
        

//$sql3 ="UPDATE product set pname=$_POST['pname'],price=$_POST['pname'],p_image=,$_POST['p_image'],p_description=$_POST['description'], 
     // min_amount=$_POST['min'], max_amount=$_POST['max'], UNIT=$_POST['unit'], qualification=$_POST['qualification'] WHERE pid='1'";
$sql3 ="UPDATE product set pname='".$_POST['pname']."',price='".$_POST['pname']."',p_image='".$_POST['image']."',p_description='".$_POST['brief']."', 
      min_amount='".$_POST['min']."', max_amount='".$_POST['max']."', UNIT='".$_POST['unit']."', qualification='".$_POST['qualification']."' WHERE pid='11'";


       $result3=mysql_query($sql3);
       if($result3) {echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully update');
    </script>");}
else {echo mysql_error();}
 # code...
    }

    ?>

    <div id="addProducts" class="modal fade" role="dialog">
    <div class="padding-normal modal-dialog">
      <h3>Add your Products</h3>
 <div class="row">
    <form id="form" action="userProducts.php" class="col s12" method="post" >
      <div class="row ">
        <div class="input-field col s12 ">
          <input id="pname" name="pname" type="text" class="validate" required="#">
          <label for="pname">Product name</label>
         
        </div>
      </div>

      <!-- for price per unit -->

       <div class="row ">
        <div class="input-field inline col s5">
          <input id="price" name="price" type="number" class="validate" required="required">
          <label for="price">Price</label>
        </div>
        <span class="col s1">per</span>
        <div class="input-field inline col s3 row s5">
          
  <select class="browser-default green lighten-3" id="unit" name="unit" required="#">
    <option value=""  disabled selected>Choose your option unit</option>
    <option value="1">Gram</option>
    <option value="2">mililiter</option>
    <option value="3">Kyat Thar</option>
  </select>
        </div>
      </div>

      <!-- for minimum amount -->

      <div class="row">
        <div class="input-field col s5">
          <input id="min" name="min" type="number" class="validate" required="required">
          <label for="min">Minimum buyable amount</label>
          
        </div>
     

      <!-- for maximum amount -->

      
        <div class="input-field col s5">
          <input id="max" name="max" type="number" class="validate" required="required">
          <label for="max">Maximum buyable amount</label>
          
        </div>
      </div>

   <!-- for brief description  -->

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
        <textarea id="brief" name="brief"  class="materialize-textarea validate"></textarea>
        <label for="brief">Brief description of the product</label>
        </div>
      </div>
      <div class="input-field inline col s5">
        <br><br>
<label>Category</label>

<select class="browser-default green lighten-2" id="selectitem" name="selectitem" onchange="changeData()" >
  <option value="" disabled selected>Choose your option</option>
  <option value="agri">agricultural products</option>
  <option value="fert">fertilizers</option>
  <option value="equi">equipments</option>
</select>
</div>
<div class="input-field inline col s5">
   <br><br>
<label>Brand</label> 
<select class="browser-default green lighten-2" id="selectedsub" name="selectedsub" onchange="changeData()">
  <option value="" disabled selected>Choose your option</option>
  <option value="fruits" id="0">fruits</option>
  <option value="grocery" id="1" >grocery</option>
  <option value="stable" id="2">stable foods</option>
  <option value="hello" id="3" style="display:none;">stable foods</option>
  <option value="hello" id="4" style="display:none;">stable foods</option>
  <option value="hello" id="5" style="display:none;">stable foods</option>
  <option value="hello" id="6" style="display:none;">stable foods</option>
</select>
</div>
   <!-- for maximum amount -->


<!-- for qualification
--><div class="input-field inline col s10">
<br><br>
     <label>Qualification</label> 
  <select class="browser-default green lighten-2" id="qualification"  name="qualification">
    <option value="" disabled selected>Choose your option</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
  </select>
</div>

<!-- for media for product image
--><br><br>
<div class="file-field input-field col s10">
      <div class="btn green white-text">

        <span>File</span>
        <input type="file" name="image" id="image" multiple required="#">

      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload one or more files">
      </div>
    </div>

    <br>
    <br><div>
<table><tr><td></td><td><button class="btn green white-text" type="submit" name="save">ADD
    <i class="material-icons right">send</i>
  </button> </td>
  <td>
  <button class="btn green white-text" type="submit" name="cancel">Cancle
    <i class="material-icons right">cancel</i>
  </button></td></tr></table>
</div>

     </form>

  </div>
  </div>
</div>

  <!---Navigation------------------------------------->
  <!--editProductsForm-->
<div id="editProducts" class="modal fade" role="dialog">
    <div class="padding-normal modal-dialog">
      <h3>Edit your Products</h3>
 <div class="row">
    <form id="form1" action="userProducts.php" class="col s12" method="post" >
      <div class="row ">
        <div class="input-field col s12 ">
          <input  name="pname" type="text" value="<?php echo $row["pname"]?>" class="validate">
          <label for="pname">Product name</label>
        </div>
      </div>

      <!-- for price per unit -->

       <div class="row ">
        <div class="input-field inline col s5">
          <input  name="price" type="number" value="<?php echo $row["price"]?>" class="validate">
          <label for="price">Price</label>
        </div>
        <span class="col s1">per</span>
        <div class="input-field inline col s3 row s5">
          
  <select class="browser-default green lighten-3" name="unit" required="#">
    <option value="<?php echo $row["UNIT"];?>"  disabled selected><?php echo $row["UNIT"];?></option>
    <option value="" disabled selected>Choose your option</option>
    <option value="1">Gram</option>
    <option value="2">mililiter</option>
    <option value="3">Kyat Thar</option>
  </select>
        </div>
      </div>

      <!-- for minimum amount -->

       <div class="row">
        <div class="input-field col s5">
          <input id="min" name="min" type="number" class="validate" required="required" value="<?php echo $row["min_amount"]?>">
          <label for="min">Minimum buyable amount</label>
          
        </div>
     

      <!-- for maximum amount -->

      
        <div class="input-field col s5">
          <input id="max" name="max" type="number" class="validate" required="required" value="<?php echo $row["max_amount"]?>">
          <label for="max">Maximum buyable amount</label>
          
        </div>
      </div>

   <!-- for brief description  -->

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
        <textarea class="materialize-textarea validate" name="brief" value="<?php echo $row["p_description"]?>" ></textarea>
        <label for="brief">Brief description of the product</label>
        </div>
      </div>
      <div class="input-field inline col s5">
        <br><br>
<label>Category</label>

<select class="browser-default green lighten-2" id="selectitem" name="selectitem" onchange="changeData()" >
  <option value="" disabled selected>Choose your option</option>
  <option value="agri">agricultural products</option>
  <option value="fert">fertilizers</option>
  <option value="equi">equipments</option>
</select>
</div>
<div class="input-field inline col s5">
   <br><br>
<label>Brand</label> 
<select class="browser-default green lighten-2" id="selectedsub" name="selectedsub" onchange="changeData()">
  <option value="" disabled selected>Choose your option</option>
  <option value="fruits" id="0">fruits</option>
  <option value="grocery" id="1" >grocery</option>
  <option value="stable" id="2">stable foods</option>
  <option value="hello" id="3" style="display:none;">stable foods</option>
  <option value="hello" id="4" style="display:none;">stable foods</option>
  <option value="hello" id="5" style="display:none;">stable foods</option>
  <option value="hello" id="6" style="display:none;">stable foods</option>
</select>
</div>
   <!-- for maximum amount -->


<!-- for qualification
--><div class="input-field inline col s10">
<br><br>
     <label>Qualification</label> 
  <select class="browser-default green lighten-2" id="qualification"  name="qualification">
    <option value="" disabled selected>Choose your option</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
  </select>
</div>

<!-- for media for product image
--><br><br>
<div class="file-field input-field col s10">
      <div class="btn green white-text">
        
        <span>File</span>
        <input type="file" name="image" id="image" multiple>

      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload one or more files">
      </div>
    </div>



    <br>
    <br><div>
<table><tr><td></td><td>
<form action="post">
  <button class="btn green white-text" type="submit" name="update" >UPDATE
    <i class="material-icons right">send</i>
  </button>
</form>
   </td>
  <td>
  <button class="btn green white-text" type="submit" name="cancel">Cancle
    <i class="material-icons right">cancel</i>
  </button></td></tr></table>
</div>

     </form>

  </div>
  </div>
</div>


<!---Navigation-->
<nav style="margin-bottom: 0px;padding: 0;">
  <div class="nav-wrapper">
    <a href="#" class="brand-logo">AgriculturalTradingSystem</a>
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
<?php

static $jssor = 0;
include("dblink.php");

            $sliderCount= "select count(distinct(category))as ct from product where sid='$sid'";
      
            $result = mysqli_query ($con,$sliderCount);          
           
            $r=mysqli_fetch_array($result);
            $count = $r['ct'];

function showProducts($category){

  global $jssor;
  $length = strlen($category);
  $length=$length+2;

 include("dblink.php");
  $sid = $_SESSION['sid'];
//$sid=1;

  $query = "select distinct substring(category,$length) as subCatagory from product where category like '$category/%' and sid='$sid';";
      
  $ret = mysqli_query ($con,$query);          
  $noRows=mysqli_num_rows($ret);
  //echo $noRows;
  if($noRows>0){
  for($i=0;$i<$noRows;$i++){
  
  $jssor +=1;
  $row=mysqli_fetch_array($ret); 
  //echo $jssor;

  echo "
  <div class='card padding-normal'>
    <div>
      <h4>".$row['subCatagory']."</h4>
      <div id='jssor_".$jssor."' style='position:relative;margin:0 auto;top:0px;left:0px;width:1000px;height:280px;overflow:hidden;visibility:hidden;'>
        
        <div data-u='slides' style='cursor:default;position:relative;top:0px;left:2px;width:1000px;height:300px;overflow:hidden;padding: 8px;'>";

        $subCatagory = $row['subCatagory'];
        
  $query2 = "select * from product where category like '$category%$subCatagory' and sid='$sid'";

  $ret2 = mysqli_query ($con,$query2);          
  $noRows2=mysqli_num_rows($ret2);

  for($j=0;$j<$noRows2;$j++){
    $row2=mysqli_fetch_array($ret2); 
      
    $url = $row2["p_image"];
    $imageData = base64_encode(file_get_contents($url));

    // Format the image SRC:  data:{mime};base64,{data};
    $src = 'data: '.mime_content_type($url).';base64,'.$imageData;

    ?>

        <div class='card' style='border:1px solid black;box-shadow: 100px 50px 50px 50px rgba(0,0,0,0);'>
          <a href="productDetails.php?productId=<?php echo $row2['pid'];?>">
            <div class='card-image'>
            <img src='<?php echo "$src";?>'height='160px' width='160px'>
            </div>
          </a>
          <div class='card-content'>
          <span class='card-title activator grey-text text-darken-4'>
            <?php echo $row2['pname']; ?>
          </span>
          <div class='row'>
             <div class='col s6'>

           <button href = '#editProducts' class='btn green modal-trigger'>Edit<i class='material-icons right'>edit</i></button>
          </div>
         
          
          <div class='col s6'>

          <!--input type="hidden" name="productId" 
            value="<?php echo $row2['pid'];?>"-->
          <button class='btn green'>Delete<i class='material-icons right'>delete</i></button>
          </div>
          </div>
          </div>
        </div>

        <?php
            }
            ?>
      </div>
        <div data-u='arrowleft' class='jssora073' style='width:50px;height:50px;top:0px;left:30px;' data-autocenter='2' data-scale='0.75' data-scale-left='0.75'>

          <svg viewbox='0 0 16000 16000' style='position:absolute;top:0;left:0;width:100%;height:100%;'>

            <path class='a' d='M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z'></path>

          </svg>

        </div>

        <div data-u='arrowright' class='jssora073' style='width:50px;height:50px;top:0px;right:30px;' data-autocenter='2' data-scale='0.75' data-scale-right='0.75'>
            <svg viewbox='0 0 16000 16000' style='position:absolute;top:0;left:0;width:100%;height:100%;'>
                <path class='a' d='M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z'></path>
            </svg>
        </div>
      </div>
  </div></div>

  <?php

  }
}
else
{
  echo "There is no product in this category yet!!!";
}
  }

  ?>
<div class="content padding-normal">
  <div>
  <a href="#">Category/</a>
  <a href="#">SubCategory/</a>
  </div>


<div id="Agricultural">
  <h3>Agricultural</h3>
   <?php
    showProducts("agricultural");
    ?>
</div>

<div id="fertilizer">
  <h3>Fertilizer</h3>
   <?php
    showProducts("fertilizer");
    ?>
</div>

<div id="Equipments">
  <h3>Equipments</h3>
   <?php
    showProducts("Equipment");
    ?>
</div>

<div class="fixed-action-btn padding-normal">
  <a class="btn-floating btn-large red">
    <i class="large material-icons">mode_edit</i>
  </a>
  <ul>
    <li><a class="btn-floating red modal-trigger" href="#addProducts"><i class="material-icons">add</i></a></li>
    
    <li><a class="btn-floating blue" href="dash_board.html"><i class="material-icons">insert_chart</i></a></li>
  </ul>
</div>
</div>

  <!---Footer-------------------------------------------------->
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
        jssor_slider_init = function() {

            var jssor_options = {
              $AutoPlay: 0,
              $AutoPlaySteps: 5,
              $SlideDuration: 160,
              $SlideWidth: 240,
              $SlideSpacing:16,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 5
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var count =parseInt("<?php echo $count;?>");

            for (var i = 1; i <= count; i++) {
              //Things[i]
              eval("jssor_" + i +"_slider"+ " = new $JssorSlider$('jssor_"+i+"', jssor_options)");
            }
           
            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {

              for (var i = 1; i <= count; i++) {
              
              eval("var containerElement = jssor_"+i+"_slider.$Elmt.parentNode;");
              var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    eval("jssor_"+i+"_slider.$ScaleWidth(expectedWidth);");
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }

                eval("$Jssor$.$AddEvent(window, 'load', ScaleSlider"+i+");       $Jssor$.$AddEvent(window, 'resize', ScaleSlider"+i+");    $Jssor$.$AddEvent(window, 'orientationchange', ScaleSlider"+i+");");
                }
                 
                }

            ScaleSlider();
        };
    </script>

<!-----Script to Import---------------------->

  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
   <script type="text/javascript">jssor_slider_init();</script>
   <!--script type="text/javascript">jssor_2_slider_init();</script>
    <script type="text/javascript">jssor_3_slider_init();</script-->
  


<!------------Script in Index.html--------------->
 
     <script>

    $(document).ready(function(){
    //drop dowm
    $(".dropdown-trigger").dropdown({ hover: true });
    $('.modal').modal();
    $('select').formSelect();
 $('.fixed-action-btn').floatingActionButton();

    });
       
   
  </script>

  <script type="text/javascript">
            function delnews(newsID)
            {
            if (confirm("Are you sure you want to delete '"))
            {
            window.location.href = 'userProducts.php';
              }
                }
            </script>

<!-- script for mobile nav -->

                  <script type="text/javascript">
                   $(document).ready(function(){
                   $('.sidenav').sidenav();
                    });

                </script>

    
            
</body>
</html>
