<?php
  if(!isset($_SESSION)){session_start();}
  ?>
<!DOCTYPE html>
<html>

    <head>
        <!--Import Google Icon Font-->
        <link
            href="https://fonts.googleapis.com/icon?family=Material+Icons"
            rel="stylesheet" />
        <!--Import materialize.css-->
        <link
            href="css/materialize.min.css"
            media="screen,projection"
            rel="stylesheet"
            type="text/css" />

        <!--Let browser know website is optimized for mobile-->
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0" />

        <style
            class="green darken 3"
            type="text/css">


            }
            .input-field label {color: green;}
        </style>
        <!--Load the AJAX API-->
        <script
            src="https://www.gstatic.com/charts/loader.js"
            type="text/javascript"></script>

        <script type="text/javascript">

            // Load the Visualization API and the controls package.
            google.charts.load('current', {'packages':['corechart', 'controls']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawDashboard);

            // Callback that creates and populates a data table,
            // instantiates a dashboard, a range slider and a pie chart,
            // passes in the data and draws it.
            function drawDashboard() {

            // Create our data table.

            //data for pie chart
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Task');
            data.addColumn('number', 'Sold amount');
            data.addRows([

            <?php

                include("dblink.php");

                //$query = "select res.pname,count(oid) as coid from order_product inner join (select pid,pname from product where sid = 1) as res using(pid) group by (res.pname)";

                //$ret = mysqli_query ($con,$query);


                $query= "select res.pname,sum(quantity) as amount from order_product inner join (select pid,pname from product where sid = 2) as res using(pid) group by (res.pname);";
                $ret = mysqli_query ($con,$query);


                $noRows=mysqli_num_rows($ret);


                for($i=1;$i<=$noRows;$i++){
                    $row=mysqli_fetch_array($ret);
                    //echo "['".$row["pname"]."',".$row["coid"]."],";}
                    echo "['".$row["pname"]."',".$row["amount"]."],";}
                    ?>
            ]);

            //This is for column chart
            var data1 = new google.visualization.DataTable();
            data1.addColumn('string', 'Task');
            data1.addColumn('number', 'Montly Sale');
            data1.addRows([

            <?php

                $query1 = "select month(order_time) as Month,count(*) as pcount from order_product inner join (select pname,pid from product where sid=2)as res using (pid) group by month(order_time)";
                $ret1 = mysqli_query ($con,$query1);

                $noRows1=mysqli_num_rows($ret1);

                
                for($j=1;$j<=$noRows1;$j++){
                $row1=mysqli_fetch_array($ret1);
                $monthNum = $row1["Month"];
                $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                $monthName = $dateObj->format('F');
                    echo "['".$monthName."',".$row1["pcount"]."],";}
                   // echo "['".$row["pname"]."',".$row["amount"]."],";}
                    ?>
            ]);


            // Create a dashboard.
            var dashboard = new google.visualization.Dashboard(
            document.getElementById('dashboard_div'));

            var dashboard1 = new google.visualization.Dashboard(
            document.getElementById('dashboard_div1'));

            // Create a range slider, passing some options
            var donutRangeSlider = new google.visualization.ControlWrapper({
            'controlType': 'NumberRangeFilter',
            'containerId': 'filter_div',
            'options': {

            'filterColumnLabel': 'Sold amount'
            }
            });

            var donutRangeSlider1 = new google.visualization.ControlWrapper({
            'controlType': 'NumberRangeFilter',
            'containerId': 'filter_div1',
            'options': {

            'filterColumnLabel': 'Montly Sale'
            }
            });

            // Create a pie chart, passing some options
            var pieChart = new google.visualization.ChartWrapper({
            'chartType': 'PieChart',
            'containerId': 'chart_div',
            'options': {
            'height':300,
            'backgroundColor': '#ffffff',
            'pieSliceText': 'value',
            'legend': 'right'
            }
            });

            var columnChart = new google.visualization.ChartWrapper({
            'chartType': 'ColumnChart',
            'containerId': 'chart_div1',
            'options': {
            'height':500,
            'backgroundColor': '#ffffff',
            'pieSliceText': 'value',
            'legend': 'right'
            }
            });
            //'backgroundColor': '#ccff90',

            // Establish dependencies, declaring that 'filter' drives 'pieChart',
            // so that the pie chart will only display entries that are let through
            // given the chosen slider range.
            dashboard.bind(donutRangeSlider, pieChart);
            dashboard1.bind(donutRangeSlider1, columnChart);

            // Draw the dashboard.
            dashboard.draw(data);
            //dashboard1.draw(data);
            dashboard1.draw(data1);
            }
        </script>
    </head>

    <!--body class="#ccff90 light-green accent-1"-->
    <body class="white">


<?php
  /* initialize as dummy*/
  /*
   normal user = 0;
   buyer = 1;
   seller = 2;
   */

  /* get the user id*/
  //$sid = $_POST['seller'];
  //$bid = $_POST['buyer'];

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

    <li><a href="products.html" class="modal-trigger " id="product_dropdown">Products</a></li>
    <li class="divider"></li>
    <li><a href="userOrders.html" class="modal-trigger " id="my_order">My Orders</a></li>
    <li class="divider"></li>
    <li><a href="cart.html" class="modal-trigger " id="cart">Cart</a></li>
  </ul>

  <?php
  }
 elseif ($loginStatus == 2) {
  echo "<script>document.getElementById('#login').innerHTML('My Account');</script>";
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
    <li><a href="#!" id="switch_account">Switch account</a></li>
    <li class="divider"></li>
    <li><a href="logout.php" id="logout">Logout</a></li>
  </ul>

  <!--Product--------------------->
  <ul id="products" class="dropdown-content">
    <li><a href="products.html" class="modal-trigger " id="product_dropdown">Products</a></li>
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
    <li><a href="products.html" class="modal-trigger " id="product_dropdown">Products</a></li>
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
      <button type="submit" class="btn btn-primary green white-text">Login</button>
    </form>
    </div>
  </div>


  <!--div id="signupType" class="modal fade large center-align" role="dialog">

    <div class="modal-dialog" style="padding: 48px;">

      <button id="seller" href="#signup_seller" class="modal-trigger btn btn-primary green white-text">Sign up as SELLER</button><br><br>
      <button id="buyer" href="#signup_buyer" class="modal-trigger btn btn-primary green white-text">Sign up as BUYER</button>
   
    </div></div-->
      

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

 <!---Sign Up-------------------->
 <!--div id="signup_buyer" class="modal fade large" role="dialog">

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
    <div>
 
    </div>
    <br>
    <button type="submit" class="btn btn-primary green white-text">Sign Up</button>
  </form>
  </div>
</div-->

<!---Navigation-->
<nav style="margin-bottom: 0px;padding: 0;">
  <div class="nav-wrapper green darken-3">
    <a href="#" class="brand-logo" style="margin-left: 16px">AgriculturalTradingSystem</a>
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
        <div class="content padding-normal center-align">
            <div class="row">
                <br>
            </div>

            <div class="row">

                <div class="col s12">

                    <div
                        class="padding-normal"
                        id="dashboard_div">
                        <!--Divs that will hold each control and chart-->

                        <h4>Products<br>

                        <div id="filter_div"></div>

                        <div id="chart_div"></div>

                        <hr>
                        <h4>Monthy sale products<br>

                        <div id="filter_div1"></div>

                        <div id="chart_div1"></div>
                    </div>

                    <div id="dashboard_div1">
                        <!--Divs that will hold each control and chart-->
                        <div id="filter_div"></div>

                        <div id="chart_div"></div>

                        <div id="chart_div1"></div>
                    </div>
                </div>
            </div>


            <!--Div that will hold the dashboard-->
            <div class="row">

                <div class="col s1">


                </div>

                <div class="col s4">


                </div>
            </div>
        </div>

        <footer class="page-footer green darken-3 ">

            <div
                class="row padding-normal container"
                id="aboutus">


                <h5
                    style="text-align: center;padding: 16px;"
                    class="white-text"
                    id="about_as1">About Us</h5>

                <p class="grey-text text-lighten-4 center-align">

                    Our project team is organized with 7 students from UIT.Our idea is that to help
                    trading agricultural products directly via B2B system.

                    <br>

                    <br>

                    Trading between sellers and customers needs many steps and may face warehouse
                    problems.
                    Repeated contributions may make the price up to double(or even triple) for
                    buyers.

                    <br>

                    <br>

                    We try hard to solve this problem in our system.
                    In our website, we efficiently provide logistics service to both sellers and
                    contributors.

                    <br>

                    <br>
                    Sellers and customers can directly trade without needing unnecessary steps that
                    increase cost.

                    <br>

                    <br>
                    It also saves time!!!

                    <br>

                    <br>

                    The important benefit is that "Public can buy agricultural products cheeper than
                    before."

                    <br>


                </p>
            </div>

            <div class="row">

                <hr style="width: 300px;color: white">
            </div>


            <div
                class="row padding-normal container"
                id="contactus">

                <h5
                    style="text-align: center;padding: 16px"
                    class="white-text"
                    id="contact_us">Contact Us</h5>

                <div class="col s6">

                    <ul>

                        <li>Ei Nghon Phoo- Project leader and supervisor

                            <br>
                            email-einghonphoo@uit.edu.mm
                        </li>

                        <br>

                        <br>

                        <li>Yamin Thiri Aung- Designer and programmer

                            <br>
                            email-yaminthiriaung@uit.edu.mm
                        </li>

                        <br>

                        <br>

                        <li>Yamin Theint Theint- Programmer and Language Analyst

                            <br>
                            email- yamintheinttheint@uit.edu.mm
                        </li>

                        <br>

                        <br>

                        <li>Khine Min Htwe- Programmer

                            <br>
                            email- khineminhtwe@uit.edu.mm
                        </li>
                    </ul>
                </div>

                <div class="col s6">

                    <ul>

                        <li>Khin Thantsin- Data analyst

                            <br>
                            email-khinthantsin@uit.edu.mm
                        </li>

                        <br>

                        <br>

                        <li>Ye Yint Aung- Content writer and market researcher

                            <br>
                            email-yeyintaung@uit.edu.mm
                        </li>

                        <br>

                        <br>

                        <li>Hsu Yee Mon- Coordinator and analyst

                            <br>
                            email- hsuyeemon@uit.edu.mm
                        </li>
                    </ul>

                    <h4>if you have any conflicts or problems feel free to contact us</h4>
                </div>


            </div>

            <div class="footer-copyright">

                <div class="container center-align">
                    © 2018 Agricultural Trading System
                </div>
            </div>
        </footer>

        <script
            src="js/jquery-3.1.1.min.js"
            type="text/javascript"></script>

        <script
            src="js/materialize.min.js"
            type="text/javascript"></script>

        <script src="js/materialize.js"></script>

        <script src="js/init.js"></script>


        <script src='https://tympanus.net/Development/DialogEffects/js/modernizr.custom.js'></script>

        <script src='https://tympanus.net/Development/DialogEffects/js/classie.js'></script>


        <script src="js/index.js"></script>

        <script>
            $(document).ready(function(){
            $(".dropdown-trigger").dropdown({ hover: true });
            });

            $(document).ready(function(){
            $('.carousel').carousel();
            });

            $(document).ready(function(){
            $('.slider').slider();
            });
        </script>

    </body>
</html>