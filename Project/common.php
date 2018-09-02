<?php

  if(!isset($_SESSION)) 
  { 
    session_start(); 
  }

  include 'common.buyer.php';
  include 'common.seller.php';
  include 'common.admin.php';
  include 'dblink.php';
?>
<?php
function displayPageHeader( $pageTitle ) {  
 ?>
<!DOCTYPE html>
<html>
<head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Acme' rel='stylesheet'>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <link href="css/style.css" rel="stylesheet" />  
      <link href="css/jssor.css" rel="stylesheet" />  
      <script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
</head>
<body>

<?php

  if(isset($_SESSION['login'])){
    $loginStatus = $_SESSION['login'];
  }
  else{
    $loginStatus = "normal";
  }
 

  if($loginStatus=="buyer"){
  //if($loginStatus==1){
    displayNavBuyer();
  }
  elseif($loginStatus=="seller"){
  //elseif ($loginStatus == 2) {
    displayNavSeller();
  }
  elseif($loginStatus =="admin"){
    displayNavAdmin();
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
  <ul id="product" class="dropdown-content">
    <li><a href="products.php" class="modal-trigger " id="product_dropdown">Products</a></li>
    
  </ul>
 
  <!--Language------------------>
  <ul id="font" class="dropdown-content">
    <li><a href="index.php?lan_flag=1"  id="myanmar" onclick="language()">ျမန္မာစာ</a></li>
    <li class="divider"></li>
    <li><a href="index.php?lan_flag=0" id="english" onclick="language()">English</a></li>
  </ul>

  <!---Navigation-->
    <div class="navbar-fixed">
<nav style="margin-bottom: 0px;height: 80px;position: fixed;
  ">
  <div class="nav-wrapper" >
    <a href="#" class="brand-logo" style="margin-left: 16px;padding: 4px;font-family: 'Acme'">AgriculturalTradingSystem</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down" style="max-width: 70%">
      <li><a class="dropdown-trigger" href="#!" data-target="font" id="language" >Language<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a href="index.php" id="home1">Home</a></li>
      
      <li><a href="index.php#aboutus" id="about_us">About Us</a></li>
      <li><a href="index.php#contactus" id="contact_us">Contact</a></li>

      
       <li><a class="dropdown-trigger" href="#!" data-target="product" id="products">Products<i class="material-icons right">arrow_drop_down</i></a></li>
      

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
    <li><a href="products.php">Products</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#login" class="modal-trigger">login</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>  
<!-- end of mobile nav  -->
  </div>
</nav></div>
<?php
}
}
?>
 
  <!--Login Form------------>
  <div id="login" class="modal simple fade" role="dialog">
    <div class="modal-dialog" style="padding: 48px;">
      <h3 id="login_id">Login To Your Account</h3>
    <form action="login.php" method="post" class="col s12">

      <div class="row ">
        <div class="input-field col s12 ">
          <i class="material-icons prefix">account_circle</i>
          <input id="emailtext" type="text" class="validate" required="required" 
          name="logemail">

          <label for="email" id="email">Email</label>
        </div>
      </div>
      <div class="row ">
        <div class="input-field col s12 ">
          <i class="material-icons prefix">lock</i>
          <input id="passwordtext" type="password" class="validate" required="required" name="logpwd">
          <label for="password" id="password">Password</label>
        </div>
        <!--label style='float: right;'>
        <a class='pink-text' href='#!'><b>Forgot Password?</b></a>
        </label-->
      </div>
      <div>
        <p>
          <label>
            <input class="with-gap" name="group3" value="seller" type="radio" required="required" />
            <span id="acc">Seller</span>
          </label>
        </p>
        <p>
          <label>
            <input class="with-gap" name="group3"  value="buyer" type="radio" required="required" />
            <span id="acc1">Buyer</span>
          </label>
        </p>
        <p>
          <label>
            <input class="with-gap" name="group3" type="radio" required="required" value ="admin"/>
            <span id="acc2">Admin Account</span>
          </label>
        </p>
      </div>
      <br>
      <button type="submit" class="btn btn-primary green white-text" id="loginbut">Login</button>
    </form>
    </div>
  </div>


 
  <!---Sign Up-------------------->
 <div id="signup" class="modal simple fade large" role="dialog">

    <div class="modal-dialog" style="padding: 48px;">
      <h3 id="textid">Create an Account</h3>
    <form class="col s12" action="" method="" id="form1" enctype="multipart/form-data">
      
      <div class="row">      
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="name" type="text" class="validate" required="required" name="username">
          <label for="icon_prefix" id='myanName'>Name</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">phone</i>
          <input id="tel" type="tel" class="validate"required="required" name="telph">
          <label for="tel" id="tele">Telephone</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="emailtext1" type="email" class="validate" required="required" name="em">
          <label for="email" id="email1">Email</label>
        </div>
      </div>
    
      
      <div class="row">
        <div class="input-field col s4">
          <i class="material-icons prefix">home</i>
          <input id="home" type="text" class="validate" required="required" name="no">
          <label for="home" id="Home">Home No.</label>
        </div>
   
        <div class="input-field col s4">
         
          <input id="Street" type="text" class="validate" required="required" name="street">
          <label for="Street" id="street" >Street</label>
        </div>
     
        <div class="input-field col s4">
         
          <input id="Quarter" type="text" class="validate" required="required" name="quarter">
          <label for="Quarter" id="quarter" >Quarter</label>
        </div>
      </div>
    <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">home</i>
          <input id="Township" type="text" class="validate" required="required" name="township">
          <label for="Township" id="township" >Township</label>
        </div>
      
        <div class="input-field col s6">
          <input id="Division" type="text" class="validate" required="required" name="division">
          <label for="Division" id="division" >Division</label>
        </div>
      </div>



     <div class="row">
        <div class="input-field col s12">
           <i class="material-icons prefix">credit_card</i>
          <input id="nrc" type="text" class="validate" name="nrcname">
          <label for="nrc" id="NRC">NRC</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input id="pw" type="password" class="validate" required="required" name="pwname">
          <label for="pw" id="password1">Password</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input id="cpw" type="password" class="validate" required="required" name="cpwname">
          <label for="cpw" id="CPW">Comfirm Password</label>
        </div>
      </div>
     
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
        <textarea id="brief" class="materialize-textarea validate" name="briefName"></textarea>
        <label for="brief" id="Brief">Brief description</label>
        </div>
      </div>

      <div class="file-field input-field">
        <div class="btn green white-text">
          <span id="file">File</span>
          <input type="file" name="files[]"/>

        </div>    
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" placeholder="Upload your profile image">
        </div>
      </div>
    <div>
    <br>
    <p>
      <label>
        <input class="with-gap" value="buyer" name="group3" type="radio" checked />
        <span id="account">User Account:BUYER</span>
      </label>
    </p>
    <p>
      <label>
        <input class="with-gap" value="seller" name="group3" type="radio" checked />
        <span id="account1">User Account:SELLER</span>
      </label>
    </p>
    
    </div>
    <br>
    <button type="submit" class="btn btn-primary green white-text" onclick="return validFunction()" id="signbut">Sign Up</button>
  </form>
  </div>
</div>

<?php

function displayPageFooter() {
?>

<script type="text/javascript" src="js/materialize.min.js"></script>

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
    $('.modal.simple').modal();
    $('.modal.addProducts').modal();
    $('select').formSelect();
    $('.slider').slider();
    $('.sidenav').sidenav();
    $('.fixed-action-btn').floatingActionButton();
    // $('.datepicker').datepicker();
   


    });


    

  </script>
 <script type="text/javascript">
       
  $('.modal.m1').modal({
    ready: function(modal, trigger) {
        
        modal.find('input[name="pname1"]').val(trigger.data('pname'))
        modal.find('input[name="price1"]').val(trigger.data('price'))
        modal.find('input[name="currency1"]').val(trigger.data('currency'))
        modal.find('input[name="description1"]').val(trigger.data('description'))
        modal.find('input[name="unit1"]').val(trigger.data('unit'))
        modal.find('input[name="max1"]').val(trigger.data('max'))
        modal.find('input[name="min1"]').val(trigger.data('min'))
        modal.find('input[name="qualification1"]').val(trigger.data('qualification'))
        modal.find('input[name="category1"]').val(trigger.data('category'))
        
    }
});


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
          
            if(pw.match(pwReg))
            {
               if (pw==cpw)
               {
              
                var form =document.getElementById("form1");
                form.method="post";
                form.action="sign1.php";
                form.submit();
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


   <?php


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


if(document.getElementById('back')!=null){
    document.getElementById('back').innerHTML="ေနာက္သို႔";
    }
    //all pages
    if(document.getElementById('language')!=null){
    document.getElementById('language').innerHTML="ဘာသာစကား";
    }

    if(document.getElementById("home1")!=null){
      document.getElementById("home1").innerHTML="ပင္မ စာမ်က္ႏွာ";
    }
    
    if(document.getElementById('about_us')!=null){
    document.getElementById('about_us').innerHTML="ကြၽႏ္​ုပ္​တို႔အေၾကာင္း";
    }
    if(document.getElementById('about_us1')!=null){
    document.getElementById('about_us1').innerHTML="ကြၽႏ္​ုပ္​တို႔အေၾကာင္း";
    }
  
    if(document.getElementById("contact_us")!=null){
    document.getElementById("contact_us").innerHTML="ဆက္သြယ္ရန္";
    }
    
    if(document.getElementById("products")!=null){
      document.getElementById("products").innerHTML="ကုန္ပစၥည္း မ်ား ";
    }
    
    //index for normal
    if(document.getElementById("product_dropdown")!=null){
       document.getElementById("product_dropdown").innerHTML="ကုန္ပစၥည္း မ်ား";
    }

    if(document.getElementById("sign_up")!=null){
     document.getElementById("sign_up").innerHTML="အေကာင့္ ဖြင့္ရန္"; 
    }
if(document.getElementById("signbut")!=null){
     document.getElementById("signbut").innerHTML="အေကာင့္ ဖြင့္ရန္"; 
    }
    if(document.getElementById("login1")!=null){
     document.getElementById("login1").innerHTML= "အေကာင့္ ဝင္ရန္ "; 
    }
    if(document.getElementById("loginbut")!=null){
     document.getElementById("loginbut").innerHTML= "အေကာင့္ ဝင္ရန္ "; 
    }

    if(document.getElementById("login_dropdown")!=null){
     document.getElementById("login_dropdown").innerHTML= "အေကာင့္ ဝင္ရန္ "; 
    }
     if(document.getElementById("login_id")!=null){
     document.getElementById("login_id").innerHTML= "အေကာင့္ ဝင္ရန္ "; 
    }
    
    if(document.getElementById("textid")!=null){
     document.getElementById("textid").innerHTML="အေကာင့္အသစ္ဖြင့္ရန္"; 
    }
    if(document.getElementById("myanName")!=null){
     document.getElementById("myanName").innerHTML="အမည္"; 
    }
   if(document.getElementById("tele")!=null){
     document.getElementById("tele").innerHTML="ဖုန္းနံပါတ္ "; 
    }
     if(document.getElementById("email")!=null){
     document.getElementById("email").innerHTML="အီးလ္ေမး "; 
    }
    if(document.getElementById("email1")!=null){
     document.getElementById("email1").innerHTML="အီးလ္ေမး "; 
    }
    
    
     if(document.getElementById("seller")!=null){
     document.getElementById("seller").innerHTML="ေရာင္းသူ :"; 
    }
 if(document.getElementById("seller1")!=null){
     document.getElementById("seller1").innerHTML="ေရာင္းသူ"; 
    }


     if(document.getElementById("buyer")!=null){
     document.getElementById("buyer").innerHTML=" ဝယ္သူ "; 
    }
      if(document.getElementById("buyer1")!=null){
     document.getElementById("buyer1").innerHTML=" ဝယ္သူ "; 
    }
    if(document.getElementById("Home")!=null){
     document.getElementById("Home").innerHTML=" အိမ္အမွတ္"; 
    }
    if(document.getElementById("street")!=null){
     document.getElementById("street").innerHTML="လမ္းအမည္"; 
    }
    if(document.getElementById("quarter")!=null){
     document.getElementById("quarter").innerHTML="ရပ္ကြက္"; 
    }
    if(document.getElementById("township")!=null){
     document.getElementById("township").innerHTML="ၿမိဳ႕နယ္ "; 
    }
    if(document.getElementById("division")!=null){
     document.getElementById("division").innerHTML=" တိုင္းေဒသႀကီး "; 
    }
    if(document.getElementById("NRC")!=null){
     document.getElementById("NRC").innerHTML="မွတ္ပံုတင္အမွတ္"; 
    }
     if(document.getElementById("password")!=null){
     document.getElementById("password").innerHTML=" လ်ိဳ႕ဝွက္နံပါတ္"; 
    }
    if(document.getElementById("password1")!=null){
     document.getElementById("password1").innerHTML=" လ်ိဳ႕ဝွက္နံပါတ္"; 
    }
     if(document.getElementById("CPW")!=null){
     document.getElementById("CPW").innerHTML=" လ်ိဳ႕ဝွက္နံပါတ္ျပန္​႐ိုက္​ရန္​a"; 
    }
    if(document.getElementById("Brief")!=null){
     document.getElementById("Brief").innerHTML="ေဖာ္ျပခ်က္"; 
    }
    if(document.getElementById("file")!=null){
     document.getElementById("file").innerHTML="ဖိုင္​"; 
    }
    if(document.getElementById("account1")!=null){
     document.getElementById("account1").innerHTML="ေရာင္​းသူအ​ေကာင္​့"; 
    }
    if(document.getElementById("acc")!=null){
     document.getElementById("acc").innerHTML="ေရာင္​းသူအ​ေကာင္​့"; 
    }
    if(document.getElementById("account")!=null){
     document.getElementById("account").innerHTML="ဝယ္​ယူသူအ​ေကာင္​့"; 
    }
    if(document.getElementById("acc1")!=null){
     document.getElementById("acc1").innerHTML="ဝယ္​ယူသူအ​ေကာင္​့"; 
    }
    if(document.getElementById("acc2")!=null){
     document.getElementById("acc2").innerHTML="ထိန္​းခ်ဳပ္​သူ"; 
    }
   
if(document.getElementById("product_p")!=null){
     document.getElementById("product_p").innerHTML="ေရာင္းခ်ေသာကုန္ပစၥည္းမ်ား"; 
    }

    if(document.getElementById("login2")!=null){
    document.getElementById("login2").innerHTML=" အေကာင့္ ဝင္ရန္";
  }
   
if(document.getElementById("whatwedo")!=null){
     document.getElementById("whatwedo").innerHTML="၀န္ေဆာင္မႈမ်ား"; 
    }

    //index for buyer and seller
    if(document.getElementById("username")!=null){
     document.getElementById("username").innerHTML="အသံုးျပဳသူ"; 
    }

    if(document.getElementById("switch_account")!=null){
     document.getElementById("switch_account").innerHTML="အေကာင့္ခ်ိန္းရန္"; 
    }
    if(document.getElementById("logout")!=null){
     document.getElementById("logout").innerHTML="အေကာင့္ထြက္ရန္"; 
    }


    //buyer
    if(document.getElementById("my_order")!=null){
     document.getElementById("my_order").innerHTML="ဝယ္ယူထားေသာပစၥည္းမ်ား"; 
    }
    if(document.getElementById("cart")!=null){
     document.getElementById("cart").innerHTML="မွာယူရန္စာရင္း"; 
    }

    
    //seller
    if(document.getElementById("my_product")!=null){
     document.getElementById("my_product").innerHTML= "ေၾကာ္ျငာထားေသာပစၥည္းမ်ား"; 
    }



  
  //index.php
  if(document.getElementById("AU")!=null){
    document.getElementById("AU").style.fontSize="18px";
    document.getElementById("AU").style.lineHeight="2";
    document.getElementById("AU").innerHTML="ကြၽႏ္​ုပ္​တို႔ ပေရာဂ်က္ကို သတင္းအခ်က္အလက္နည္းပညာတကၠသိုလ္မွ ေက်ာင္းသား ေက်ာင္းသူ ၇ ဦးျဖင့္လုပ္ေဆာင္ထားပါတယ္။ကြၽန္ုပ္တို႔ရည္႐ြယ္ခ်က္ကေတာ့ B2B လို႔ေခၚတဲ့ စီးပြားေရးလုပ္ငန္းအခ်င္းခ်င္း စိုက္ပ်ိဳးေရးလုပ္ငန္းသုံး ထုတ္ကုန္ေတြကိုျဖန႔္ေဝရာမွာ တစ္ဖက္တစ္လမ္းမွအကူအညီေပးႏိုင္ဖို႔ျဖစ္ပါတယ္။ေရာင္းသူႏွင့္ ဝယ္သူၾကား ကုန္ပစၥည္းပို႔ေဆာင္ရာမွာ ယခုအခါ အဆင့္ဆင့္ပို႔ေဆာင္ျခင္းျဖင့္ အခက္အခဲေတြရွိေနပါတယ္။အထူးသျဖင့္ ကုန္စည္ဒိုင္မ်ားႏွင့္ဆက္သြယ္ေဆာင္႐ြက္တဲ့အခါ ေဈးႏူန္းျမင့္တက္ျခင္းမ်ားျဖစ္ေပၚေလ့ရွိပါတယ္။အဆင့္ဆင့္ပို႔ေဆာင္ရျခင္းမွာ ေဈးႏူန္းမ်ားမွာ ယခင္မူလထပ္ ၂ ဆ ၃ ဆ ျမင့္တက္လာပါတယ္။ကြၽႏု္ပ္တို႔၏ စီမံခ်က္စနစ္မွာ ထိုျပသနာကို အတက္ႏိုင္ဆုံး ေလွ်ာ့ခ်ႏိုင္ဖို႔ ရည္႐ြယ္ေဆာင္႐ြက္ထားပါတယ္။ ကြၽန္ုပ္တို႔၏ ဝက္ဆိုက္ မွာ ေရာင္းသူႏွင့္ဝယ္သူၾကား ကုန္စည္စလယ္ပို႔ေဆာင္ေရးကိုအထူးေထာက္ပံ့ကူညီထားပါတယ္။ေရာင္းသူႏွင့္ဝယ္သူၾကား ၾကားအဆင့္မ်ားမခံပဲ တိုက္႐ိုက္ေရာင္းဝယ္ႏိုင္ျခင္းအားျဖင့္ အပိုကုန္က်စရိတ္မ်ားကိုေလွ်ာ့ခ်ႏိုင္မွာျဖစ္ၿပီး အခ်ိန္ကုန္သက္သာေစမွာျဖစ္ပါတယ္။ အဓိကအက်ိဳးေက်းဇူးအေနနဲ႔ စားသုံးဝယ္ယူသူမ်ားက ယခင္ကထပ္ ပိုမိုသက္သာေသာ ေဈးႏူန္းျဖင့္ ဝယ္ယူႏိုင္ျခင္းျဖစ္ပါတယ္။.";

  }
   if(document.getElementById("contact")!=null){
    document.getElementById("contact").innerHTML=" ဆက္သြယ္ရန္";
  }
  if(document.getElementById("freeContact")!=null){
      document.getElementById("freeContact").style.fontSize="24px";
      document.getElementById("freeContact").style.lineHeight="1.5";
    
   
   
    document.getElementById("freeContact").innerHTML=" အခက္အခဲတစ္စံုတစ္ရာ႐ွိလ်ွင္လြတ္လပ္စြာဆက္သြယ္ေမးျမန္းႏိုင္ပါသည္။";
  }
  if(document.getElementById("para")!=null){
    document.getElementById("para").innerHTML="လယ္ယာထြက္ပစၥည္းကုမၸဏီမ်ား၊ဓာတ္ေျမျသဇာကုမၸဏီမ်ား၊လယ္ယာသံုးစက္ပစၥည္းကုမၸဏီမ်ားမွကုန္ပၥည္းမ်ားကိုလာေရာက္ေရာင္းခ်ႏိုင္ပါသည္။";
    document.getElementById("para").style.fontSize="18px";
  }
  if(document.getElementById("logistic")!=null){

    document.getElementById("logistic").style.fontSize="18px";
   
    document.getElementById("logistic").innerHTML=" ေထာက္ပ့ံပို႔ေဆာင္ေရးဝန္ေဆာင္မႈ";
  }
  if(document.getElementById("logicPara")!=null){
    document.getElementById("logicPara").innerHTML="ကြၽႏုပ္တို႔၏ ဝက္ဆိုက္က ေထာက္ပ့ံပုို႔ေဆာင္ေရးကိုအဓိကထားတာေၾကာင့္ ထုတ္ကုန္မ်ားရဲ႕ သယ္ယူပို႔ေဆာင္ေရးအတြက္ ထပ္မံမလိုအပ္ေတာ့ပါဘူး။ ကုန္စည္ဒိုင္အတြက္ကုန္က်စရိတ္ကိုလည္းေလ်ွာ့ခ်ႏိုင္မွာျဖစ္ပါတယ္။";
  }

 if(document.getElementById("agricultural1")!=null){
    document.getElementById("agricultural1").innerHTML=" လယ္ယာထြက္ကုန္မ်ား";
  }
if(document.getElementById("Market")!=null){

    document.getElementById("Market").style.fontSize="18px";
   
    document.getElementById("Market").innerHTML=" လယ္ယာလုပ္ငန္းေစ်းကြက္";
  }
  if(document.getElementById("marketPara")!=null){
    document.getElementById("marketPara").innerHTML="လူႀကီးမင္းရဲလိုအပ္ခ်က္မ်ားကိုျဖည့္ဆည္းဖို႔ ဒီဝက္ဆိုက္မွာကုန္ပစၥည္းေတြကိုတစ္ေနရာထဲမွာေရာင္းဝယ္ႏိုင္ေအာင္လို႔စီစဥ္ထားပါတယ္။ ကုိယ့္ရဲ႕ေရာင္းသူ ဝယ္သူနဲ႔လည္းတိုက္႐ိုက္ဆက္သြယ္ႏိုင္ပါတယ္။";
  }

  if(document.getElementById("onestop")!=null){
   
    document.getElementById("onestop").style.fontSize="18px";
   
    document.getElementById("onestop").innerHTML=" လံုးခ်င္းၿပီးဝန္ေဆာင္မႈ";
  }
  if(document.getElementById("onestoppara")!=null){
    document.getElementById("onestoppara").innerHTML="လယ္ယာလုပ္ကိုင္သူမ်ားအေနနဲ႔ မိမိလိုအပ္တဲ့ပစၥည္းမ်ားကို ဝယ္ယူႏိုင္မွာျဖစ္ၿပီး လယ္ယာထြက္ကုန္မ်ားကိုလည္းတစ္ေနရာတည္းမွာေကာင္းခ်ႏိုင္မွာျဖစ္လို႔ တစ္ေနရာတည္းမွာအၿပီးအစီးေဆာင္ရြက္ႏိုင္မွာျဖစ္ပါတယ္။";
  }

  if(document.getElementById("statistics")!=null){
   
    document.getElementById("statistics").style.fontSize="18px";
   
    document.getElementById("statistics").innerHTML=" စာရင္းဇယား ထိန္းသိမ္းထား႐ွိျခင္း";
  }
  if(document.getElementById("statisticspara")!=null){
    document.getElementById("statisticspara").innerHTML="မိမိလိုအပ္တဲ့အခ်ိန္တိုင္း မိမိထြက္ကုန္မ်ားရဲ႕ ေရာင္းခ်ရမႈစာရင္းကိုၾကည့္႐ႈစစ္ေဆးႏိုင္မွာျဖစ္ပါတယ္။ဒါေၾကာင့္ကိုယ့္ကုန္ပစၥည္းေတြကိုအေကာင္းဆံုးစီမံခန္႔ခြဲေရာင္းခ်ႏိုင္မွာျဖစ္ပါတယ္။";
  }
  if(document.getElementById("phoneno")!=null){
    document.getElementById("phoneno").innerHTML="ဖုန္းနံပါတ္ :";
  }
  if(document.getElementById("addcart")!=null){
    document.getElementById("addcart").innerHTML="ျခင္းထဲသို႔ထည့္မည္";
  }
  if(document.getElementById("send")!=null){
    document.getElementById("send").innerHTML=" ပို႔မည္";
  }
  if(document.getElementById("order")!=null){
    document.getElementById("order").innerHTML="ဝယ္ယူမည္";
  }
  if(document.getElementById("send1")!=null){
    document.getElementById("send1").innerHTML="ပို႔မည္";
  }
  if(document.getElementById("Description")!=null){
    document.getElementById("Description").innerHTML="ကုန္ပစၥည္းအေၾကာင္း :";
  }
  if(document.getElementById("qualification")!=null){
    document.getElementById("qualification").innerHTML="ကုန္ပစၥည္းအရည္အေသြး :";
  }
  if(document.getElementById("orderItem")!=null){
    document.getElementById("orderItem").innerHTML="ကုန္ပစၥည္းမွာယူပါ";
  }
 
  if(document.getElementById("fertilizers")!=null){
    document.getElementById("fertilizers").innerHTML=" ဓာတ္ေျမျသဇာမ်ား";
    
  }
  if(document.getElementById("equipments")!=null){
    document.getElementById("equipments").innerHTML="လယ္ယာသံုးစက္ပစၥည္းမ်ား";
  }
  if(document.getElementById("p_name")!=null){
    document.getElementById("p_name").innerHTML=" ကုန္ပစၥည္းအမည္";
  }
  if(document.getElementById("sellerAddr ")!=null){
    document.getElementById("sellerAddr ").innerHTML="ေရာင္းသူလိပ္စာ";
  }
  if(document.getElementById("pickup")!=null){
    document.getElementById("pickup").innerHTML="လာေရာက္ယူေဆာင္ရန္လိပ္စာ";
  }
  if(document.getElementById("deliDate")!=null){
    document.getElementById("deliDate").innerHTML="ပို႔ေဆာင္လိုေသာရက္";
  }
  if(document.getElementById("add1")!=null){
    document.getElementById("add1").innerHTML="ေပါင္းထည့္မည္";
  }
  if(document.getElementById("orderTime")!=null){
    document.getElementById("orderTime").innerHTML="မွာယူေသာအခ်ိန္";
  }
  if(document.getElementById("quantity")!=null){
    document.getElementById("quantity").innerHTML="အေရအတြက္";
  }
  if(document.getElementById("cost")!=null){
    document.getElementById("cost").innerHTML=" က်သင့္ေငြ";
  }
  if(document.getElementById("pending")!=null){
    document.getElementById("pending").innerHTML=" ေဆာင္ရြက္ဆဲ";
  }
  if(document.getElementById("delivered_order")!=null){
    document.getElementById("delivered_order").innerHTML=" ပို႔ေဆာင္ၿပီးေသာေအာ္ဒါမ်ား";
  }
  if(document.getElementById("comment")!=null){
    document.getElementById("comment").innerHTML=" ထင္ျမင္ခ်က္ေပးရန္";
  }
  if(document.getElementById("addProducts1")!=null){
    document.getElementById("addProducts1").innerHTML=" ကုန္ပစၥည္းထပ္ထည့္ရန္";
  }
  if(document.getElementById("p_name1")!=null){
    document.getElementById("p_name1").innerHTML=" ကုန္ပစၥည္းအမည္";
  }
  if(document.getElementById("price")!=null){
    document.getElementById("price").innerHTML=" ေစ်ႏႈန္း :";
  }
  if(document.getElementById("currency")!=null){
    document.getElementById("currency").innerHTML=" ေငြေၾကး";
  }
  if(document.getElementById("dollar")!=null){
    document.getElementById("dollar").innerHTML="ေဒၚလာ";
  }
  if(document.getElementById("kyat")!=null){
    document.getElementById("kyat").innerHTML="က်ပ္";
  }
  if(document.getElementById("unit")!=null){
    document.getElementById("unit").innerHTML="အတိုင္းအတာ";
  }
  if(document.getElementById("min_amount")!=null){
    document.getElementById("min_amount").innerHTML="အနည္းဆံုးဝယ္ယူႏိုင္ေသာပမာဏ";
  }
  if(document.getElementById("max_amount")!=null){
    document.getElementById("max_amount").innerHTML=" အမ်ားဆံုးဝယ္ယူႏိုင္ေသာပမာဏ";
  }
  if(document.getElementById("productDescri")!=null){
    document.getElementById("productDescri").innerHTML="ကုန္ပစၥည္းေဖာ္ျပခ်က္";
  }
  if(document.getElementById("cate")!=null){
    document.getElementById("cate").innerHTML=" အမ်ိဳးအစား";
  }
  if(document.getElementById("Choose")!=null){
    document.getElementById("Choose").innerHTML=" ကုန္ပစၥည္းအမ်ိဳးအစားေရြးခ်ယ္ပါ";
  }
  if(document.getElementById("agriProduct ")!=null){
    document.getElementById("agriProduct ").innerHTML="လယ္ယာထြက္ပစၥည္းမ်ား";
  }
  if(document.getElementById("fertilizers1")!=null){
    document.getElementById("fertilizers1").innerHTML=" ဓာတ္ေျမျသဇာမ်ား";
  }
    if(document.getElementById("equipments1")!=null){
    document.getElementById("equipments1").innerHTML="လယ္ယာသံုးစက္ပစၥည္းမ်ား";
  }
  if(document.getElementById("Choose1")!=null){
    document.getElementById("Choose1").innerHTML="ကုန္ပစၥည္းအမ်ိဳးအစားေရြးခ်ယ္ပါ";
  }
  if(document.getElementById("Add")!=null){
    document.getElementById("Add").innerHTML="ေပါင္းထည့္မည္";
  }
  if(document.getElementById("cancel")!=null){
    document.getElementById("cancel").innerHTML="ပယ္ဖ်က္မည္";
  }
  if(document.getElementById("edit")!=null){
    document.getElementById("edit").innerHTML=" ျပင္ဆင္မည္";
  }
  if(document.getElementById("p_name2")!=null){
    document.getElementById("p_name2").innerHTML="ကုန္ပစၥည္းအမည္";
     }
 
  if(document.getElementById("Price1")!=null){
    document.getElementById("Price1").innerHTML="ေစ်းႏႈန္း";
    
  }
   if(document.getElementById("min_amount1")!=null){
    document.getElementById("min_amount1").innerHTML="အနည္းဆံုးဝယ္ယူႏိုင္ေသာပမာဏ";
  }
   if(document.getElementById("max_amount1")!=null){
    document.getElementById("max_amount1").innerHTML="အမ်ားဆံုးဝယ္ယူႏိုင္ေသာပမာဏ";
  }
   
   if(document.getElementById("productDescri1")!=null){
    document.getElementById("productDescri1").innerHTML="ကုန္ပစၥည္းေဖာ္ျပခ်က္";
  }
  if(document.getElementById("delete")!=null){
    document.getElementById("delete").innerHTML=" ဖ်က္မည္";
  }
  if(document.getElementById("agricultural2")!=null){
    document.getElementById("agricultural2").innerHTML="လယ္ယာထြက္ပစၥည္းမ်ား";
  }
  if(document.getElementById("fertilizers2")!=null){
    document.getElementById("fertilizers2").innerHTML=" ဓာတ္ေျမျသဇာမ်ား";
  }
  if(document.getElementById("equipments2")!=null){
    document.getElementById("equipments2").innerHTML="လယ္ယာသံုးစက္ပစၥည္းမ်ား";
  }
   if(document.getElementById("marketplacetitle")!=null){
    document.getElementById("marketplacetitle").innerHTML="စိုက္ပ်ိဳးေရးက႑ထုတ္ကုန္ေစ်းကြက္";
  }
  }  
</script> 
  <?php
}
?>

</body>
</html>
<?php
}
?>
