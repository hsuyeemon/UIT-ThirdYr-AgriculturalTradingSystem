<?php

if(!isset($_SESSION)) 
  { 
    session_start(); 
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
    document.getElementById('language').innerHTML="ဘာသာစကား";
    document.getElementById("sign_up").innerHTML="အေကာင့္ ဖြင့္ရန္";
    
    document.getElementById("home").innerHTML="ပင္မ စာမ်က္ႏွာ";
    document.getElementById("products").innerHTML="ကုန္ပစၥည္း မ်ား ";
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
    document.getElementById("contact_us").innerHTML="ကြၽန္ပ္တုိ႔ကိုဆက္သြယ္ရန္";
    document.getElementById("about_as1").innerHTML="ကြၽႏုပ္တို႔ အေၾကာင္း";

  }  
</script> 
  <?php
}
//echo "haha";
  if (isset($_SERVER["HTTP_REFERER"])) {
       // exit;
       // header("Location: " . );
    
    echo "<script>location.replace('".$_SERVER["HTTP_REFERER"]."');</script>";
    }


?>