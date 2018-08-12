<!DOCTYPE html>
<html>
<head>
	
 
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <style type="text/css" class="green darken 3">
  


}
  .input-field label {color: green;}
</style>
    </head>

    <body class="#ccff90 light-green accent-1">
  <!--Language------------------>
  <ul id="font" class="dropdown-content">
    <li><a href="#" id="myanmar" onclick="language();">ျမန္မာစာ</a></li>
    <li class="divider"></li>
    <li><a href="#" id="english" onclick="">English</a></li>
  </ul>
       <nav>
    <div class="nav-wrapper green darken-3">
      <a href="#" class="brand-logo" style="margin-left: 16px">AgriculturalTradingSystem</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a class="dropdown-trigger" href="#!" data-target="font" id="language">Language<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="font">Font<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="index.html" id="home">Home</a></li>
        <li><a href="#" id="about_as">About Us</a></li>
        <li><a href="#" id="contact">Contact</a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="authentication">Login<i class="material-icons right">arrow_drop_down</i></a></li>  
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
   
      <table width="600" id="mytable">
        <thead>
          <tr>
          	  <th id="no">No.</th>
              <th id="Pname">Product Name</th>
              <th id="Sname">Seller Name</th>
              <th id="PhNo">phone number</th>
              <th id="email">email</th>
              <th id="AppDecl">approve/decline</th>
          </tr>
        </thead>

        <tbody>
          <tr>
          	<td><br>1</td>
            <td><br>Alvin</td>
            <td><br>Alvin</td>
            <td><br>00000000</td>
            <td><br>aaaaa@gmail.com</td>
            <td><br> <label>
                 <input class="with-gap" name="group1" type="radio"  />
                 <span>approve</span>
                 </label>
               <label>
                 <input class="with-gap" name="group1" type="radio"  />
                 <span>decline</span>
                 </label></td>

          </tr>
          <tr>
          	<td><br>2</td>
            <td><br>Alan</td>
             <td><br>Alan</td>
            <td><br>11111111</td>
            <td><br>bbbbb@gmail.com</td>
                 <td><br> <label>
                 <input class="with-gap" name="group2" type="radio"  />
                 <span>approve</span>
                 </label>
               <label>
                 <input class="with-gap" name="group2" type="radio"  />
                 <span>decline</span>
                 </label>
               </td>
          </tr>
             <tr>
             	<td><br>3</td>
            <td><br>Alan</td>
             <td><br>Alan</td>
            <td><br>222222222</td>
            <td><br>ccccc@gmail.com</td>
                 <td><br> <label>
                 <input class="with-gap" name="group2" type="radio"  />
                 <span>approve</span>
                 </label>
               <label>
                 <input class="with-gap" name="group2" type="radio"  />
                 <span>decline</span>
                 </label>
               </td>
          </tr>
</table>

    <div class="container">  <!-- for form -->
 <div class="row">
    <form class="col s12">

            <!-- for name -->
<br><br>
      
     <a align="margin-right" type="cancel" class="waves-effect waves-light btn">Cancel<i class="material-icons">cancel</i></a>
     <a align="margin-right" type="cancel" class="waves-effect waves-light btn">update<i class="material-icons">send</i></a>
   
         <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
     
     <!-- script for mobile nav -->

                  <script type="text/javascript">
                   $(document).ready(function(){
                   $('.sidenav').sidenav();
                   $('.dropdown-trigger').dropdown({hover:true});
                    });

                </script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
  function language(){

   
    document.getElementById("language").innerHTML="ဘာသာစကား";
    document.getElementById("home").innerHTML="ပင္မ စာမ်က္ႏွာ";
    document.getElementById("products").innerHTML="ကုန္ပစၥည္း မ်ား ";
    document.getElementById("about_as").innerHTML="ကြၽႏုပ္တို႔ အေၾကာင္း";
    document.getElementById("contact").innerHTML="ကြၽန္ပ္တုိ႔ကိုဆက္သြယ္ရန္";
    document.getElementById("mytable").rows[0].cells[0].innerHTML = "စဥ္";



document.getElementById("mytable").row[0].cells[1].innerHTML="ကုန္ပစၥည္းအမည္";

document.getElementById("mytable").row[0].cells[2].innerHTML="ေရာင္းသူအမည္";

document.getElementById("mytable").row[0].cells[3].innerHTML="ဖုန္းနံပါတ္";

document.getElementById("mytable").row[0].cells[4].innerHTML="အီးေမးလ္";


}



  </script>
}
</body>
</html>