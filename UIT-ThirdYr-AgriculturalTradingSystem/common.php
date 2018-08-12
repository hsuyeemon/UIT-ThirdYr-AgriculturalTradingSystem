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
 

  //if($loginStatus=="buyer"){
  if($loginStatus==1){
    displayNavBuyer();
  }
  //elseif($loginStatus=="seller"){
  elseif ($loginStatus == 2) {
    displayNavSeller();
  }
  elseif($loginStatus == "admin"){
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
  <ul id="products" class="dropdown-content">
    <li><a href="products.php" class="modal-trigger " id="product_dropdown">Products</a></li>
    
  </ul>
 
  <!--Language------------------>
  <ul id="font" class="dropdown-content">
    <li><a href="index.php?lan_flag=1" id="myanmar" onclick="language()">ျမန္မာစာ</a></li>
    <li class="divider"></li>
    <li><a href="lan_index.php?lan_flag=1" id="english" onclick="">English</a></li>
  </ul>

  <!---Navigation-->
<nav style="margin-bottom: 0px;height: 80px;">
  <div class="nav-wrapper">
    <a href="#" class="brand-logo" style="margin-left: 16px;padding: 4px;">AgriculturalTradingSystem</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">


      <li><a class="dropdown-trigger" href="#!" data-target="font" id="language">Language<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a href="index.php" id="home">Home</a></li>
      
      <li><a href="index.php#aboutus" id="about_as">About Us</a></li>
      <li><a href="index.php#contactus" id="contact">Contact</a></li-->

      
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
}
}
?>
 
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
          <label for="email">Email</label>
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
            <span>User Account:BUYER</span>
          </label>
        </p>
        <p>
          <label>
            <input class="with-gap" name="group3" type="radio" required="required" />
            <span>User Account:SELLER</span>
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
    <form class="col s12" action="" method="" id="form1">
      
      <div class="row">      
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="name" type="text" class="validate" required="required" name="username">
          <label for="icon_prefix">Name</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">phone</i>
          <input id="tel" type="tel" class="validate"required="required" name="telph">
          <label for="tel">Telephone</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" type="email" class="validate" required="required" name="em">
          <label for="email">Email</label>
        </div>
      </div>
    
      
      <div class="row">
        <div class="input-field col s4">
          <i class="material-icons prefix">home</i>
          <input id="home" type="text" class="validate" required="required" name="no">
          <label for="home">Home No.</label>
        </div>
   
        <div class="input-field col s4">
         
          <input id="Street" type="text" class="validate" required="required" name="street">
          <label for="Street" >Street</label>
        </div>
     
        <div class="input-field col s4">
         
          <input id="Quarter" type="text" class="validate" required="required" name="quarter">
          <label for="Quarter" >Quarter</label>
        </div>
      </div>
    <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">home</i>
          <input id="Township" type="text" class="validate" required="required" name="township">
          <label for="Township" >Township</label>
        </div>
      
        <div class="input-field col s6">
          <input id="Division" type="text" class="validate" required="required" name="division">
          <label for="Division" >Division</label>
        </div>
      </div>



     <div class="row">
        <div class="input-field col s12">
           <i class="material-icons prefix">credit_card</i>
          <input id="nrc" type="text" class="validate" name="nrcname">
          <label for="nrc">NRC</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input id="pw" type="password" class="validate" required="required" name="pwname">
          <label for="pw">Password</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input id="cpw" type="password" class="validate" required="required" name="cpwname">
          <label for="cpw">Comfirm Password</label>
        </div>
      </div>
     
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
        <textarea name="brief" id="brief" class="materialize-textarea validate" name="briefName"></textarea>
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
        <input class="with-gap" value="seller" name="group3" type="radio" checked />
        <span>User Account:BUYER</span>
      </label>
    </p>
    <p>
      <label>
        <input class="with-gap" value="buyer" name="group3" type="radio" checked />
        <span>User Account:SELLER</span>
      </label>
    </p>
    
    </div>
    <br>
    <button type="submit" class="btn btn-primary green white-text" onclick="return validFunction()">Sign Up</button>
  </form>
  </div>
</div>



<?php

function displayPageFooter() {
?>
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
    $('.sidenav').sidenav();
    $('.fixed-action-btn').floatingActionButton();

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
          if (true) {}
            if(pw.match(pwReg))
            {
               if (pw==cpw)
               {
                elert ("Registration Successful ");
                var form =document.getElementById("form1");
                form.method="post";
                form.action="signup1.php";
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

</body>
</html>
<?php
}


//session_start(); 
if(isset($_GET['lan_flag'])){
$_SESSION['lan_flag']=$_GET['lan_flag'];
}
$lan_flag=null;
if(isset($_GET['lan_flag'])){
$lan_flag=$_GET['lan_flag'];
}
//echo $_SESSION['lan_flag'];
if ($lan_flag) {
  echo "<script type='text/javascript'>document.getElementById('para').innerHTML = 'changed it to myanmar';
       document.getElementById('language').innerHTML='á€˜á€¬á€žá€¬á€…á€€á€¬á€¸';
    
    document.getElementById('home').innerHTML='á€•á€„á€¹á€™ á€…á€¬á€™á€ºá€€á€¹á‚�á€½á€¬';
    document.getElementById('products').innerHTML='á€€á€¯á€”á€¹á€•á€…á�¥á€Šá€¹á€¸ á€™á€ºá€¬á€¸ ';
    document.getElementById('about_as').innerHTML='á€€á€¼á�½á‚�á€¯á€•á€¹á€�á€­á€¯á‚” á€¡á€±á�¾á€€á€¬á€„á€¹á€¸';
    document.getElementById('contact').innerHTML='á€€á€¼á�½á€”á€¹á€•á€¹á€�á€¯á€­á‚”á€€á€­á€¯á€†á€€á€¹á€žá€¼á€šá€¹á€›á€”á€¹';
  document.getElementById('mytable').row[0].cells[0].innerHTML='á€…á€¥á€¹';
    document.getElementById('mytable').row[0].cells[1].innerHTML=' á€€á€¯á€”á€¹á€•á€…á�¥á€Šá€¹á€¸á€¡á€™á€Šá€¹';
      document.getElementById('mytable').row[0].cells[2].innerHTML='á€±á€›á€¬á€„á€¹á€¸á€žá€°á€¡á€™á€Šá€¹';
        document.getElementById('mytable').row[0].cells[3].innerHTML='á€±á€…á€ºá€¸á‚�á‚ˆá€”á€¹á€¸';
          document.getElementById('mytable').row[0].cells[4].innerHTML=' á€¡á€±á€›á€¡á€�á€¼á€€á€¹';
            document.getElementById('mytable').row[0].cells[5].innerHTML='á€¡á€”á€Šá€¹á€¸á€†á€¶á€¯á€¸á€•á€™á€¬á€�';
              document.getElementById('mytable').row[0].cells[6].innerHTML='á€¡á€™á€ºá€¬á€¸á€†á€¶á€¯á€¸á€•á€™á€¬á€�';</script>";}

              

?>
