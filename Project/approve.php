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
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <style type="text/css" class="green darken 3">

  .input-field label {color: green;}
</style>
    </head>

    <body class="#ccff90 light-green accent-1">
    <div id="wrap">
<div id="wrapHome">
<p><a class="btn-auth btn-facebook large" href="lan_index.php?lan_flag=1"> change to  <b>myanmar language</b> </a></p>
<p><a class="btn-auth btn-facebook large" href="lan_index.php?lan_flag=0"> change to  <b>English language</b> </a></p>

</div>
</div>
<p id="para">change it to myanmar</p>
     <!--Language------------------>
  <ul id="font" class="dropdown-content">
    <li><a href="#" id="myanmar" onclick="language()">á€»á€™á€”á€¹á€™á€¬á€…á€¬</a></li>
    <li class="divider"></li>
    <li><a href="#" id="english" onclick="">English</a></li>
  </ul>
  
       <nav>
    <div class="nav-wrapper green darken-3">
      <a href="#" class="brand-logo" style="margin-left: 16px">AgriculturalTradingSystem</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a class="dropdown-trigger" href="#!" data-target="font" id="language">Language<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="font" id="font">Font<i class="material-icons right">arrow_drop_down</i></a></li>
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
              <th id="price">price</th>
              <th id="unit">unit</th>
              <th id="miniamount">minimum amount</th>
              <th id="maxamount">maximum amount</th>
              <th>approve/decline</th>
          </tr>
        </thead>

        <tbody>
          <tr>
          	<td><br>1</td>
            <td><br>apple</td>
            <td><br>Alvin</td>
            <td><br>100000</td>
            <td><br>ton</td>
            <td><br>0.1 ton</td>
            <td><br>3 ton</td>
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
            <td><br>orange</td>
            <td><br>Alvin</td>
            <td><br>100000</td>
             <td><br>ton</td>
            <td><br>0.1 ton</td>
            <td><br>3 ton</td>
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
            <td><br>banana</td>
            <td><br>Alvin</td>
            <td><br>100000</td>
               <td><br>ton</td>
            <td><br>0.1 ton</td>
            <td><br>3 ton</td>
                 <td><br> <label>
                 <input class="with-gap" name="group2" type="radio"  />
                 <span>approve</span>
                 </label>
               <label>
                 <input class="with-gap" name="group2" type="radio"  />
                 <span>decline</span>
                 </label>
               </td>
          </tr></tbody>
</table>
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
<?php
//session_start(); 
$_SESSION['lan_flag']=$_GET['lan_flag'];
$lan_flag=$_GET['lan_flag'];
echo $_SESSION['lan_flag'];
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

</body>
</html>
