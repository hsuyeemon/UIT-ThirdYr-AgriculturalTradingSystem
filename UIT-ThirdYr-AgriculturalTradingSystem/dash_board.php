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

                $query1 = " select pname,count(pid) as cpid from product group by pname";
                $ret1 = mysqli_query ($con,$query1);


                $noRows1=mysqli_num_rows($ret1);


                for($j=1;$j<=$noRows1;$j++){
                    $row1=mysqli_fetch_array($ret1);
                    echo "['".$row1["pname"]."',".$row1["cpid"]."],";}
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

          

            /* initialize as dummy*//*normal user = 0;buyer = 1;seller = 2;*/

            /* get the user id*///$sid = $_POST['seller'];//$bid = $_POST['buyer'];

            $isTouch=empty($_SESSION['login']);

            if($isTouch){
                $loginStatus ="0";

            echo "<script>alert('Please Log in first');setTimeout(function () {window.location.href= 'http://localhost/UIT-ThirdYr-AgriculturalTradingSystem/
            UIT-ThirdYr-AgriculturalTradingSystem/index.php';});</script>";exit();

            }else{$loginStatus = $_SESSION['login'];}


            filter($loginStatus);

            function filter($loginStatus){if ($loginStatus == 2) {?>

        <!--Login--------------------->
        <ul
            class="dropdown-content"
            id="authentication">

            <?php
            include("dblink.php");//$query = "select * from seller where sid ='".$_POST["email"]."'";
            $query = "select * from seller where sid ='1'";
            $ret = mysqli_query ($con,$query);
            $row=mysqli_fetch_array($ret);
            $noRows=mysqli_num_rows($ret);
            if($noRows>0){echo "<li><a href='#!'' id='user_name'>".$row["SNAME"]."</a></li>";}?>
            <li class="divider"></li>

            <li>

                <a
                    href="#!"
                    id="switch_account">Switch account
                </a>
            </li>

            <li class="divider"></li>

            <li>

                <a
                    href="logout.php"
                    id="logout">Logout
                </a>
            </li>
        </ul>

        <!--Product--------------------->
        <ul
            class="dropdown-content"
            id="products">

            <li>

                <a
                    class="modal-trigger "
                    href="products.html"
                    id="product_dropdown">Products
                </a>
            </li>

            <li class="divider"></li>

            <li>

                <a
                    class="modal-trigger "
                    href="userProducts.html"
                    id="my_product">My Products
                </a>
            </li>
        </ul>
        <?php}

            else{?>


        <!--Login--------------------->
        <ul
            class="dropdown-content"
            id="authentication">

            <li>

                <a
                    class="modal-trigger "
                    href="#login"
                    id="login_dropdown">Login
                </a>
            </li>

            <li class="divider"></li>

            <li>

                <a
                    class="modal-trigger "
                    href="#signup"
                    id="sign_up">Sign Up
                </a>
            </li>

            <li class="divider"></li>
        </ul>

        <!--Product--------------------->
        <ul
            class="dropdown-content"
            id="products">

            <li>

                <a
                    class="modal-trigger "
                    href="products.html"
                    id="product_dropdown">Products
                </a>
            </li>

            <li class="divider"></li>
        </ul>

        <?php
        }
        }
        ?>

        <!---Navigation------------------------------------->

        <!-- Dropdown Structure -->

        <!--Language------------------>
        <ul
            class="dropdown-content"
            id="font">

            <li>

                <a
                    href="#"
                    id="myanmar"
                    onclick="language()">ျမန္မာစာ
                </a>
            </li>

            <li class="divider"></li>

            <li>

                <a
                    href="#"
                    id="english"
                    onclick="">English
                </a>
            </li>
        </ul>


        <!--Login Form------------>
        <div
            class="modal fade"
            id="login"
            role="dialog">

            <div
                style="padding: 48px;"
                class="modal-dialog">

                <h3>Login To Your Account</h3>

                <form
                    action="index.php"
                    class="col s12"
                    method="post">

                    <div class="row ">

                        <div class="input-field col s12 ">

                            <i class="material-icons prefix">account_circle</i>

                            <input
                                name="email"
                                class="validate"
                                id="email"
                                required="required"
                                type="text">

                            <label for="name">Name</label>
                        </div>
                    </div>

                    <div class="row ">

                        <div class="input-field col s12 ">

                            <i class="material-icons prefix">lock</i>

                            <input
                                class="validate"
                                id="password"
                                required="required"
                                type="password">

                            <label for="password">Password</label>
                        </div>

                        <label style='float: right;'>

                            <a
                                class='pink-text'
                                href='#!'>

                                <b>Forgot Password?</b>
                            </a>
                        </label>
                    </div>

                    <div>

                        <p>

                            <label>

                                <input
                                    name="group3"
                                    class="with-gap"
                                    required="required"
                                    type="radio" />

                                <span>User Account</span>
                            </label>
                        </p>

                        <p>

                            <label>

                                <input
                                    name="group3"
                                    class="with-gap"
                                    required="required"
                                    type="radio" />

                                <span>Admin Account</span>
                            </label>
                        </p>
                    </div>

                    <br>

                    <input type="hidden">


                    <button
                        class="btn btn-primary green white-text"
                        type="submit">Login
                    </button>
                </form>
            </div>
        </div>

        <!---Sign Up-------------------->
        <div
            class="modal fade large"
            id="signup"
            role="dialog">

            <div
                style="padding: 48px;"
                class="modal-dialog">

                <h3>Create an Account</h3>

                <form
                    class="col s12"
                    onsubmit="return validFunction()">

                    <div class="row">

                        <div class="input-field col s12">

                            <i class="material-icons prefix">account_circle</i>

                            <input
                                class="validate"
                                id="name"
                                required="required"
                                type="text">

                            <label for="icon_prefix">Name</label>
                        </div>

                        <div class="input-field col s12">

                            <i class="material-icons prefix">phone</i>

                            <input
                                class="validate"
                                id="tel"
                                required="required"
                                type="tel">

                            <label for="tel">Telephone</label>
                        </div>
                    </div>

                    <div class="row">

                        <div class="input-field col s12">

                            <i class="material-icons prefix">email</i>

                            <input
                                class="validate"
                                id="email"
                                required="required"
                                type="email">

                            <label for="email">Email</label>
                        </div>
                    </div>

                    <div class="row">

                        <div class="input-field col s12">

                            <i class="material-icons prefix">home</i>

                            <input
                                class="validate"
                                id="address"
                                required="required"
                                type="text">

                            <label for="address">Address</label>
                        </div>
                    </div>

                    <div class="row">

                        <div class="input-field col s12">

                            <i class="material-icons prefix">credit_card</i>

                            <input
                                class="validate"
                                id="nrc"
                                type="text">

                            <label for="nrc">NRC</label>
                        </div>
                    </div>

                    <div class="row">

                        <div class="input-field col s12">

                            <i class="material-icons prefix">lock</i>

                            <input
                                class="validate"
                                id="pw"
                                required="required"
                                type="password">

                            <label for="pw">Password</label>
                        </div>
                    </div>

                    <div class="row">

                        <div class="input-field col s12">

                            <i class="material-icons prefix">lock</i>

                            <input
                                class="validate"
                                id="cpw"
                                required="required"
                                type="password">

                            <label for="cpw">Comfirm Password</label>
                        </div>
                    </div>

                    <div class="row">

                        <div class="input-field col s12">

                            <i class="material-icons prefix">mode_edit</i>

                            <textarea
                                name="brief"
                                class="materialize-textarea validate"
                                id="brief"></textarea>

                            <label for="brief">Brief description</label>
                        </div>
                    </div>

                    <div class="file-field input-field">

                        <div class="btn green white-text">

                            <span>File</span>

                            <input
                                multiple
                                type="file">

                        </div>

                        <div class="file-path-wrapper">

                            <input
                                class="file-path validate"
                                placeholder="Upload one or more files"
                                type="text">
                        </div>
                    </div>

                    <div>

                        <br>

                        <p>

                            <label>

                                <input
                                    name="group3"
                                    checked
                                    class="with-gap"
                                    type="radio" />

                                <span>User Account</span>
                            </label>
                        </p>

                        <p>

                            <label>

                                <input
                                    name="group3"
                                    class="with-gap"
                                    type="radio" />

                                <span>Admin Account</span>
                            </label>
                        </p>
                    </div>

                    <br>

                    <button
                        class="btn btn-primary green white-text"
                        type="submit">Sign Up
                    </button>
                </form>
            </div>
        </div>

        <!---Navigation-->
        <nav style="margin-bottom: 0px;padding: 0;">

            <div class="nav-wrapper green darken-3">

                <a
                    style="margin-left: 16px"
                    class="brand-logo"
                    href="#">AgriculturalTradingSystem</a>

                <ul
                    class="right hide-on-med-and-down"
                    id="nav-mobile">


                    <li>

                        <a
                            class="dropdown-trigger"
                            data-target="font"
                            href="#!"
                            id="language">Language

                            <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>

                    <li>

                        <a
                            href="index.html"
                            id="home">Home
                        </a>
                    </li>

                    <li>

                        <a
                            href="index.html#aboutus"
                            id="about_as">About Us
                        </a>
                    </li>

                    <li>

                        <a
                            href="index.html#contactus"
                            id="contact">Contact
                        </a>
                    </li>


                    <li>

                        <a
                            class="dropdown-trigger"
                            data-target="products"
                            href="#!"
                            id="products">Products

                            <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>


                    <li>

                        <a
                            class="dropdown-trigger"
                            data-target="authentication"
                            href="#!"
                            id="login1">Login

                            <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>
                </ul>

                <!-- for mobile view -->
                <ul
                    class="sidenav"
                    id="slide-out">

                    <li>

                        <div class="user-view">

                            <div class="background">

                                <img src="images/2446.jpg">
                            </div>

                            <a href="#user">

                                <img
                                    class="circle"
                                    src="images/fertilizer.jpg">
                            </a>

                            <a href="#name">

                                <span class="white-text name">John Doe</span>
                            </a>

                            <a href="#email">

                                <span class="white-text email">jdandturk@gmail.com</span>
                            </a>
                        </div>
                    </li>

                    <li>

                        <a href="#!">

                            <i class="material-icons">cloud</i>language
                        </a>

                        <ul>

                            <li>

                                <a href="#!">Myanmar</a>
                            </li>

                            <li>

                                <a href="#!">English</a>
                            </li>
                        </ul>
                    </li>

                    <li>

                        <a href="#!">Products</a>
                    </li>

                    <li>

                        <div class="divider"></div>
                    </li>

                    <li>

                        <a class="subheader">Subheader</a>
                    </li>

                    <li>

                        <a
                            class="waves-effect"
                            href="#!">login
                        </a>
                    </li>
                </ul>

                <a
                    class="sidenav-trigger"
                    data-target="slide-out"
                    href="#">

                    <i class="material-icons">menu</i>
                </a>
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