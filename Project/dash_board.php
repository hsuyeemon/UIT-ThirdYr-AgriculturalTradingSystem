<?php

include( "common.php" );
include( "dblink.php" );

displayPageHeader( "Dashboard" );
 if(isset($_SESSION['login'])){
    $loginStatus = $_SESSION['login'];
  }
  else
    $loginStatus = "normal";

  if($loginStatus!="seller"){
    echo "<script>alert('please log in first');
    location.replace('index.php');</script>";
    //header('Location: index.php');
    exit(); 
  } 
?>



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

                $sid=$_SESSION['sid'];
                $query= "select res.pname,sum(quantity) as amount from order_product inner join (select pid,pname from product where sid = $sid) as res using(pid) group by (res.pname);";
                $ret = mysqli_query ($con,$query);


                $noRows=mysqli_num_rows($ret);
                if($noRows<=0){
                ?>
                <p>There is no data yet</p>
                <?php
                }


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

                $query1 = "select month(order_time) as Month,count(*) as pcount from order_product inner join (select pname,pid from product where sid=$sid)as res using (pid) group by month(order_time)";
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
        </script><?php
displayPageFooter();
?>