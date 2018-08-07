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

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_options);
            var jssor_2_slider = new $JssorSlider$("jssor_2", jssor_options);
            var jssor_3_slider = new $JssorSlider$("jssor_3", jssor_options);
            var jssor_4_slider = new $JssorSlider$("jssor_4", jssor_options);
            var jssor_5_slider = new $JssorSlider$("jssor_5", jssor_options);
            var jssor_6_slider = new $JssorSlider$("jssor_6", jssor_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider1() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider1();

            $Jssor$.$AddEvent(window, "load", ScaleSlider1);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider1);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider1);

                        function ScaleSlider2() {
                var containerElement = jssor_2_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_2_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider2();

            $Jssor$.$AddEvent(window, "load", ScaleSlider2);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider2);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider2);

                        function ScaleSlider3() {
                var containerElement = jssor_3_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_3_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider3();

            $Jssor$.$AddEvent(window, "load", ScaleSlider3);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider3);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider3);


            function ScaleSlider4() {
                var containerElement = jssor_4_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_4_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider4();

            $Jssor$.$AddEvent(window, "load", ScaleSlider4);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider4);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider4);

            

            function ScaleSlider5() {
            var containerElement = jssor_5_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

              if (containerWidth) {
                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_5_slider.$ScaleWidth(expectedWidth);
                }
              else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider5();

            $Jssor$.$AddEvent(window, "load", ScaleSlider5);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider5);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider5);

                        function ScaleSlider6() {
                var containerElement = jssor_6_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_6_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
             ScaleSlider6();

            $Jssor$.$AddEvent(window, "load", ScaleSlider6);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider6);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider6);

        };
    </script>
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

<!--body class="#ccff90 light-green accent-1"-->
<body>


<?php

static $jssor = 0;


function showProducts($category){

  global $jssor;
  $length = strlen($category);
  $length=$length+2;

  include("dblink.php");

  $query = "select distinct substring(category,$length) as subCatagory from product where category like '$category/%';";
      
  $ret = mysqli_query ($con,$query);          
  $noRows=mysqli_num_rows($ret);
  //echo $noRows;
  for($i=0;$i<$noRows;$i++){
  
  $jssor +=1;
  $row=mysqli_fetch_array($ret); 
  //echo $jssor;

  echo "
  <div class='card #ccff90 light-green accent-1 padding-normal'>
    <div>
      <h4>".$row['subCatagory']."</h4>
      <div id='jssor_".$jssor."' style='position:relative;margin:0 auto;top:0px;left:0px;width:1000px;height:320px;overflow:hidden;visibility:hidden;'>
        
        <div data-u='slides' style='cursor:default;position:relative;top:0px;left:2px;width:1000px;height:240px;overflow:hidden;padding: 8px;'>";
        
  $query2 = "select * from product where category like 'Fertilizer%'";

  $ret2 = mysqli_query ($con,$query2);          
  $noRows2=mysqli_num_rows($ret2);

  for($j=0;$j<$noRows2;$j++){
    $row2=mysqli_fetch_array($ret2); 
      
    $url = $row2["p_image"];
    //$image = file_get_contents("$url");
    //$imageData = base64_encode(file_get_contents($url));
    //echo $url;
    echo "

        <div class='card' style='border:1px solid black;box-shadow: 100px 50px 50px 50px rgba(0,0,0,0);'>
          <a href='productDetails.html'>
            <div class='card-image'>
            <img src='".$url."' height='160px' width='160px'>
            </div>
          </a>
          <div class='card-content'>
          <span class='card-title activator grey-text text-darken-4'>".
            $row2['pname']."<i class='material-icons right'>more_vert</i>
          </span>
          </div>
          <div class='card-reveal'>
            <span class='card-title grey-text text-darken-4'>".
            $row2['pname']."<i class='material-icons right'>close</i>
            </span>
            <p>".$row2['p_description']."</p>
          </div>
        </div>
        ";
    }
      
    echo"</div>
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

";

  }
}

  

  ?>

  <!---Navigation------------------------------------->
  
  <!-- Dropdown Structure -->

  <!--Language------------------>
  <ul id="font" class="dropdown-content">
    <li><a href="#" id="myanmar" onclick="">ျမန္မာစာ</a></li>
    <li class="divider"></li>
    <li><a href="#" id="english" onclick="">English</a></li>
  </ul>

  <!--Login--------------------->
  <ul id="authentication" class="dropdown-content">
    <li><a href="#login" class="modal-trigger ">Login</a></li>
    <li class="divider"></li>
    <li><a href="#signup" class="modal-trigger ">Sign Up</a></li>
  </ul>

  <!--Login Form------------>
  <div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog" style="padding: 48px;">
    <form class="col s12">

      <div class="row ">
        <div class="input-field col s12 ">
          <i class="material-icons prefix">account_circle</i>
          <input id="email" type="text" class="validate">
          <label for="email">Name</label>
        </div>
      </div>
      <div class="row ">
        <div class="input-field col s12 ">
          <i class="material-icons prefix">lock</i>
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
        <label style='float: right;'>
        <a class='pink-text' href='#!'><b>Forgot Password?</b></a>
        </label>
      </div>
      <div>
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
      <button type="submit" class="btn btn-primary green darken-3">Login</button>
    </form>
    </div>
  </div>

  <!---Sign Up-------------------->
 <div id="signup" class="modal fade large" role="dialog">
    <div class="modal-dialog" style="padding: 48px;">
    <form class="col s12">
      
      <div class="row">      
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">Name</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">phone</i>
          <input id="icon_telephone" type="tel" class="validate">
          <label for="icon_telephone">Telephone</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
    
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">home</i>
          <input id="email" type="email" class="validate">
          <label for="email">Address</label>
        </div>
      </div>

     <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">NRC</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input id="email" type="email" class="validate">
          <label for="email">Comfirm Password</label>
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
        <div class="btn green darken-3">
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
    <button type="submit" class="btn btn-primary green darken-3">Sign Up</button>
  </form>
  </div>
</div>

<!---------------------Navigation--------------------->
<nav style="margin-bottom: 0px;padding: 0;">
  <div class="nav-wrapper green darken-3">
    <a href="#" class="brand-logo" style="margin-left: 16px">AgriculturalTradingSystem</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a class="dropdown-trigger" href="#!" data-target="font">Language<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a href="index.html">Home</a></li>
      <li><a href="#Products ">Products</a></li>
      <!--li><a href="#">About Us</a></li>
      <li><a href="#">Contact</a></li-->
      <li><a class="dropdown-trigger" href="#!" data-target="authentication">Login
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
<br>
<div class="content padding-normal">
  <div>
  <a href="#">Category/</a>
  <a href="#">SubCategory/</a>
  </div>


<div id="Agricultural">
  <h3>Agricultural</h3>
   <?php
    showProducts("fertilizer");
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

</div>

    <!---Footer-------------------------------------------------->
<footer class="page-footer green darken-3 ">
  <div class="row padding-normal">

    <div class="col s4" style="padding-left: 32px;">
      <h5 class="white-text">About Us</h5>
      <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
    </div>

    <div class="col s4">
      <h5 class="white-text">Services</h5>
    </div>

    <div class="col s4">
      <h5 class="white-text">Contact Us</h5>
      <ul>
        <li><a class="grey-text text-lighten-3" href="#!">einghonphoo@uit.edu.mm</a></li>
        <li><a class="grey-text text-lighten-3" href="#!">khineminhtwe@uit.edu.mm</a></li>
        <li><a class="grey-text text-lighten-3" href="#!">yaminthiriaung@uit.edu.mm</a></li>
        <li><a class="grey-text text-lighten-3" href="#!">yamintheintheint@uit.edu.mm</a></li>
        <li><a class="grey-text text-lighten-3" href="#!">yeyintaung@uit.edu.mm</a></li>
        <li><a class="grey-text text-lighten-3" href="#!">khinthantsin@uit.edu.mm</a></li>
        <li><a class="grey-text text-lighten-3" href="#!">hsuyeemon@uit.edu.mm</a></li>
        
      </ul>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      © 2014 Copyright Text
    </div>
  </div>
</footer>



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


    });
      
   
  </script>

<!-- script for mobile nav -->

                  <script type="text/javascript">
                   $(document).ready(function(){
                   $('.sidenav').sidenav();
                    });

                </script>

    
            
</body>
</html>