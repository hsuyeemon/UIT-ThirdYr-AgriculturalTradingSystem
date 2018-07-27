<!DOCTYPE html>
<html>
<head>
	  <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<title></title>
</head>
<body>

<?php
include("db_config.php");

$result = mysqli_query($connection,"SELECT * FROM product");


while($row = mysqli_fetch_array($result))
{

echo  "<div class='card #ccff90 light-green accent-1 padding-normal'>
  <div id='Agricultural_sub2'>

    <h4>Beans</h4>
  <div id='jssor_2' style='position:relative;margin:0 auto;top:0px;left:0px;width:1000px;height:320px;overflow:hidden;visibility:hidden;''>
        <!-- Loading Screen -->
        <!--div data-u='loading' class='jssorl-009-spin' style='position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);'>
            <img style='margin-top:-19px;position:relative;top:50%;width:38px;height:38px;' src='img/spin.svg' />
        </div-->
        <div data-u='slides' style='cursor:default;position:relative;top:0px;left:2px;width:1000px;height:240px;overflow:hidden;padding: 8px;'>
          ";

    //include('dblink.php');
      $queryForFertilizer = 'select * from product where category like 'Fertilizer%'';
      $ret = mysqli_query ($con,$queryForFertilizer);          
     $noRows=mysqli_num_rows($ret);
      for($i=0;$i<$noRows;$i++){
         $row=mysqli_fetch_array($ret); 
      
    $url = $row['p_image'];
        //$image = file_get_contents('$url');
        //$imageData = base64_encode(file_get_contents($url));
     echo "<div class='card' style='border:1px solid black;box-shadow: 100px 50px 50px 50px rgba(0,0,0,0);'>
          <a href='productDetails.html'>
        <div class='card-image'>
          <img src=''.$url.'' height='160px' width='160px'>
        </div></a>
         <div class='card-content' >
        <span class='card-title activator grey-text text-darken-4'>'.
        $row['pname'].'<i class='material-icons right'>more_vert</i></span>
        
      </div>
      <div class='card-reveal'>
      <span class='card-title grey-text text-darken-4'>'.
        $row['pname'].'<i class='material-icons right'>close</i></span>
        <p>'.$row['p_description'].'</p>
    </div></div>
";

      }

         echo "   
        </div>
    
        <!-- Arrow Navigator -->
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
        </div>
</div>
</div>
";
   mysqli_close($connection);
   
?>

       <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
                <script type="text/javascript" src="js/materialize.min.js"></script>
                <script src="js/materialize.js"></script>
                <script src="js/init.js"></script>

</body>
</html>

