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
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
       
       
         var data = new google.visualization.DataTable();
        data.addColumn('string', 'Task');
        data.addColumn('number', 'Hours per Day');
        data.addRows([

        <?php
         
    include("dblink.php");

    $query1 = "select *from product where sid=1;";
    
    //$query = "select pname from product where sid=".$_POST["id"];
    $ret = mysqli_query ($con,$query1);   
    $noRows=mysqli_num_rows($ret);

    //$query2 = "select count(pid) as cpid from product where sid=1 group by(pname)";
    
    //$query = "select pname from product where sid=".$_POST["id"];
    //$ret2 = mysqli_query ($con,$query2);   

    for($i=1;$i<=$noRows;$i++)
    {   
      $row=mysqli_fetch_array($ret); 
     //$cpid=mysqli_fetch_array($ret2); 
      
      echo "['".$row["PNAME"]."',"."11"."],"; 
      //echo "['".$cpid."',"."11"."],"; 
    
    }
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

            'filterColumnLabel': 'Hours per Day'
          }
        });

        // Create a pie chart, passing some options
        var pieChart = new google.visualization.ChartWrapper({
          'chartType': 'PieChart',
          'containerId': 'chart_div',
          'options': {
          	'height':300,
'backgroundColor': '#ccff90',
            'pieSliceText': 'value',
            'legend': 'right'
          }
        });

        var columnChart = new google.visualization.ChartWrapper({
          'chartType': 'ColumnChart',
          'containerId': 'chart_div1',
          'options': {
          	'height':500,
            'backgroundColor': '#ccff90',
            'pieSliceText': 'value',
            'legend': 'right'
          }
        });
         // Establish dependencies, declaring that 'filter' drives 'pieChart',
        // so that the pie chart will only display entries that are let through
        // given the chosen slider range.
        dashboard.bind(donutRangeSlider, pieChart);
        dashboard1.bind(donutRangeSlider, columnChart);

        // Draw the dashboard.
       dashboard.draw(data);
       dashboard1.draw(data);
      }
    </script>
</head>

<body class="#ccff90 light-green accent-1">
  	
    <nav>
    <div class="nav-wrapper green darken-3">
      <a href="#" class="branszd-logo" style="margin-left: 16px">AgriculturalTradingSystem</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class="dropdown-trigger" href="#!" data-target="font">Font<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact</a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="authentication">Login<i class="material-icons right">arrow_drop_down</i></a></li>  
      </ul>
    </div>
  </nav>

<div class="content padding normal center-align">
  <div class="row">

  <div class="col s10" >

  		 <div id="dashboard_div">
      <!--Divs that will hold each control and chart-->
      <div id="filter_div"></div>
      <div id="chart_div"></div>
      <div id="chart_div1"></div>
    </div>
  	
<div id="dashboard_div1" >
      <!--Divs that will hold each control and chart-->
      <div id="filter_div"></div>
      <div id="chart_div"></div>
      <div id="chart_div1"></div>
    </div>
  </div>
</div></div>

    <!--Div that will hold the dashboard-->
    <div class="row">
    	<div class="col s1">

     
   
    </div>

    <div class="col s4">


</div>
</div>

     <footer class="page-footer green darken-3">
             <div class="row">
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
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            </div>
          </div>
        </footer>

  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  
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