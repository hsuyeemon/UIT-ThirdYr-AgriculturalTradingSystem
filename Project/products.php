<?php

include "common.php";
include 'dblink.php';

displayPageHeader( "product" );
?>

<?php

static $jssor = 0;
  //$sid = $_SESSION['sid'];

            $sliderCount= "select count(distinct(category))as ct from product";
      
            $result = mysqli_query($con,$sliderCount);          
           
            $r=mysqli_fetch_array($result);
            $count = $r['ct'];

function showProducts($category){
    include 'dblink.php';
  
  global $jssor;
  $length = strlen($category);
  $length=$length+2;
//$sid = $_SESSION['sid'];
  $query = "select distinct substring(category,$length) as subCatagory from product where category like '$category/%';";
  $ret = mysqli_query ($con,$query);          
  $noRows=mysqli_num_rows($ret);
  //echo $noRows;
  if($noRows>0){
  for($i=0;$i<$noRows;$i++){
  
  $jssor +=1;
  $row=mysqli_fetch_array($ret); 
  //echo $jssor;

  echo "
  <div class='card padding-normal'>
    <div>
      <h4>".$row['subCatagory']."</h4>
      <div id='jssor_".$jssor."' style='position:relative;margin:0 auto;top:0px;left:0px;width:1000px;height:320px;overflow:hidden;visibility:hidden;'>
        
        <div data-u='slides' style='cursor:default;position:relative;top:0px;left:2px;width:1000px;height:240px;overflow:hidden;padding: 8px;'>";

        $subCatagory = $row['subCatagory'];
        
  $query2 = "select * from product where category like '$category%$subCatagory'";

  $ret2 = mysqli_query ($con,$query2);          
  $noRows2=mysqli_num_rows($ret2);

  for($j=0;$j<$noRows2;$j++){
    $row2=mysqli_fetch_array($ret2); 
      
      
    $url = $row2["p_image"];
    $imageData = base64_encode(file_get_contents($url));

    // Format the image SRC:  data:{mime};base64,{data};
    $src = 'data: '.mime_content_type($url).';base64,'.$imageData;
    ?>

        <div class='card' style='border:1px solid black;box-shadow: 100px 50px 50px 50px rgba(0,0,0,0);'>
          <a href="productDetails.php?productId=<?php echo $row2['pid'];?>">
            <div class='card-image'>
            <img src='<?php echo "$src";?>'height='160px' width='160px'>
            </div>
          </a>
          <div class='card-content'>
          <span class='card-title activator grey-text text-darken-4'>
             <?php echo $row2['pname']; ?><i class='material-icons right'>more_vert</i>
          </span>
          </div>
          <div class='card-reveal'>
            <span class='card-title grey-text text-darken-4'>
            <?php echo $row2['pname'];?>
            <i class='material-icons right'>close</i>
            </span>
            <p><?php echo $row2['p_description'];?></p>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
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

<?php

  }}

else
{
  echo "There is no product in this category yet!!!";
}
  }

  ?>
<div class="content padding-normal">
  <div>
  <a href="#">Category/</a>
  <a href="#">SubCategory/</a>
  </div>


<div id="Agricultural">
  <h3>Agricultural</h3>
   <?php
    showProducts("agricultural");
    ?>
</div>

<div id="fertilizer">
  <h3>Fertilizer</h3>
   <?php
    showProducts("fertilizers");
    ?>
</div>

<div id="Equipments">
  <h3>Equipments</h3>
   <?php
    showProducts("equipments");
    ?>
</div>

</div>
  
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
            
            var count =parseInt("<?php echo $count;?>");

            for (var i = 1; i <= count; i++) {
              //Things[i]
              eval("jssor_" + i +"_slider"+ " = new $JssorSlider$('jssor_"+i+"', jssor_options)");
            }
           
            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {

              for (var i = 1; i <= count; i++) {
              
              eval("var containerElement = jssor_"+i+"_slider.$Elmt.parentNode;");
              var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    eval("jssor_"+i+"_slider.$ScaleWidth(expectedWidth);");
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }

                eval("$Jssor$.$AddEvent(window, 'load', ScaleSlider"+i+");       $Jssor$.$AddEvent(window, 'resize', ScaleSlider"+i+");    $Jssor$.$AddEvent(window, 'orientationchange', ScaleSlider"+i+");");
                }
                 
                }

            ScaleSlider();
        };
    </script>

   <script type="text/javascript">jssor_slider_init();</script>

 <?php
displayPageFooter();
?>