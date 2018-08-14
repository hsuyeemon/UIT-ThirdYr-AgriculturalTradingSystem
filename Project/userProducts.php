<?php

//include( "common.seller.php" );
include("common.php");
include( "dblink.php" );

//displayPageHeaderSeller( "product" );
displayPageHeader("product");


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

<?php
$result = mysqli_query($con,"SELECT * FROM product");
$num_rows = mysqli_num_rows($result);
$total=++$num_rows;

// Full Name must be letters, dash and spaces only
     

if(isset($_POST['save'])){
  
$seleced_val1=$_POST["selectitem"];
$seleced_val2=$_POST["selectedsub"];
$seleced_cata = $seleced_val1 . '/' . $seleced_val2;
for ($i = 0; $i < count($_FILES['product']['name']); $i++) {
        
$filenames=$_FILES['product']['name'][$i];
            //Get the temp file path
            $tmpFilePath = $_FILES['product']['tmp_name'][$i];
            //echo $tmpFilePath;

            //Make sure we have a filepath
            if ($tmpFilePath != "") {
                //Setup our new file path
                $newFilePath = "images/products/" . $_FILES['product']['name'][$i];

                move_uploaded_file($tmpFilePath, $newFilePath);
                
                  $photoarr[]=$newFilePath;
                    //Handle other code here

                }
            }
         
          $arr =  implode(",",$photoarr);
          echo $arr;  

        $qualification = isset($_POST['qualification'])?$_POST['qualification']:"";    
        $sid = $_SESSION['sid'];
        echo $sid; 

        $sql = "INSERT INTO product(pname, price, currency, p_image,p_description, status, min_amount, max_amount, UNIT, qualification, category,sid) VALUES ('".$_POST["pname"]."','".$_POST["price"]."','".$_POST["currency"]."','".$arr."','".$_POST["brief"]."','0','".$_POST["min"]."','".$_POST["max"]."','".$_POST["unit"]."','".$qualification."','$seleced_cata',".$sid.")";
        
       $result=mysqli_query($con,$sql);
       if($result) {
  echo ("<script LANGUAGE='JavaScript'>
  alert('Succesfully added');
    </script>");}
//else {echo mysql_error();}
    # code...
 }


# DELETE

             //UPDATE
 //$result = mysqli_query($con,"SELECT * FROM product");
//$num_rows = mysqli_num_rows($result);
//$total=++$num_rows;
 $result = mysqli_query($con,"SELECT * FROM product WHERE pid='11'");

$row = mysqli_fetch_array($result);
echo $row["p_description"];
echo $row["UNIT"];
    if(isset($_POST['update'])){
       
        

//$sql3 ="UPDATE product set pname=$_POST['pname'],price=$_POST['pname'],p_image=,$_POST['p_image'],p_description=$_POST['description'], 
     // min_amount=$_POST['min'], max_amount=$_POST['max'], UNIT=$_POST['unit'], qualification=$_POST['qualification'] WHERE pid='1'";
$sql3 ="UPDATE product set pname='".$_POST['pname']."',price='".$_POST['pname']."',p_image='".$_POST['image']."',p_description='".$_POST['brief']."', 
      min_amount='".$_POST['min']."', max_amount='".$_POST['max']."', UNIT='".$_POST['unit']."', qualification='".$_POST['qualification']."' WHERE pid='11'";


       $result3=mysql_query($sql3);
       if($result3) {echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully update');
    </script>");}
else {echo mysql_error();}
 # code...
    }

    ?>

    <div id="addProducts" class="modal fade" role="dialog">
    <div class="padding-normal modal-dialog">
      <h3>Add your Products</h3>
 <div class="row">
    <form id="form" action="userProducts.php" class="col s12" method="post" enctype="multipart/form-data">
      <div class="row ">
        <div class="input-field col s12 ">
          <input id="pname" name="pname" type="text" class="validate" required="#">
          <label for="pname">Product name</label>
         
        </div>
      </div>

      <!-- for price per unit -->

       <div class="row ">
        <div class="input-field inline col s3">
          <input id="price" name="price" type="number" class="validate" required="required">
          <label for="price">Price</label>
        </div>
         <div class="input-field inline col s1 row s4">
        <select class="browser-default green lighten-3" id="currency" name="currency" required="#">
    <option value=""  disabled selected>Choose your currency</option>
    <option value="Dollar">Dollar</option>
    <option value="Kyat">Kyat</option>
    
  </select>
</div>
        <span class="col s1">per</span>
        <div class="input-field inline col s2 row s4">
          
  <select class="browser-default green lighten-3" id="unit" name="unit" required="#">
    <option value=""  disabled selected>Choose your option unit</option>
    <option value="Gram">Gram</option>
    <option value="Bag">Bag</option>
    <option value="Basket">Basket</option>
    <option value="Liter">Liter</option>
    <option value="Kilogram">Kilogram</option>
    <option value="Item">Item</option>
    <option value="Unit">Unit</option>
  </select>
        </div>
      </div>

      <!-- for minimum amount -->

      <div class="row">
        <div class="input-field col s5">
          <input id="min" name="min" type="number" class="validate" required="required">
          <label for="min">Minimum buyable amount</label>
          
        </div>
     

      <!-- for maximum amount -->

      
        <div class="input-field col s5">
          <input id="max" name="max" type="number" class="validate" required="required">
          <label for="max">Maximum buyable amount</label>
          
        </div>
      </div>

   <!-- for brief description  -->

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
        <textarea id="brief" name="brief"  class="materialize-textarea validate"></textarea>
        <label for="brief">Brief description of the product</label>
        </div>
      </div>
      <div class="input-field inline col s5">
        <br><br>
<label>Category</label>

<select class="browser-default green lighten-2" id="selectitem" name="selectitem" onchange="changeData()">
  <option value="" disabled selected>Choose your option</option>
  <option value="agricultural">agricultural products</option>
  <option value="fertilizers">fertilizers</option>
  <option value="equipments">equipments</option>
</select>
</div>
<div class="input-field inline col s5">
   <br><br>
<label>Brand</label> 
<select class="browser-default green lighten-2" id="selectedsub" name="selectedsub" onchange="changeData()">
  <option value="" disabled selected>Choose your option</option>
  <option value="fruits" id="0">fruits</option>
  <option value="grocery" id="1" >grocery</option>
  <option value="stable" id="2">stable foods</option>

  <option value="hello" id="3" style="display:none;">stable foods</option>
  <option value="hello" id="4" style="display:none;">stable foods</option>
  <option value="hello" id="5" style="display:none;">stable foods</option>
  <option value="hello" id="6" style="display:none;">stable foods</option>
</select>
</div>
   <!-- for maximum amount -->


<!-- for qualification
--><div class="input-field inline col s10">
<br><br>
     <label>Qualification</label> 
  <select class="browser-default green lighten-2" id="qualification"  name="qualification">
    <option value="" disabled selected>Choose your option</option>
    <option value="MM FDA registered">MM FDA registered</option>
    <option value="ABE coporation certifined">ABE coporation certifined</option>
    <option value="Ministry certifined">Ministry certifined</option>
  </select>
</div>

<!-- for media for product image
--><br><br>
<div class="file-field input-field col s10">
      <div class="btn green white-text">

        <span>File</span>
        <input type="file" name="product[]" multiple required />

      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload one or more files">
      </div>
    </div>

    <br>
    <br><div>
<table><tr><td></td><td><button class="btn green white-text" type="submit" name="save">ADD
    <i class="material-icons right">send</i>
  </button> </td>
  <td>
  <button class="btn green white-text modal-close" type="submit" name="cancel">Cancle
    <i class="material-icons right">cancel</i>
  </button></td></tr></table>
</div>

     </form>

  </div>
  </div>
</div>

 
  <!--editProductsForm-->
<div id="editProducts" class="modal fade" role="dialog">
    <div class="padding-normal modal-dialog">
      <h3>Edit your Products</h3>
 <div class="row">
    <form id="form1" action="userProducts.php" class="col s12" method="post" >
      <div class="row ">
        <div class="input-field col s12 ">
          <input  name="pname" type="text" value="<?php echo $row["pname"]?>" class="validate">
          <label for="pname">Product name</label>
        </div>
      </div>

      <!-- for price per unit -->

       <div class="row ">
        <div class="input-field inline col s5">
          <input  name="price" type="number" value="<?php echo $row["price"]?>" class="validate">
          <label for="price">Price</label>
        </div>
        <span class="col s1">per</span>
        <div class="input-field inline col s3 row s5">
          
  <select class="browser-default green lighten-3" name="unit" required="#">
    <option value="<?php echo $row["UNIT"];?>"  disabled selected><?php echo $row["UNIT"];?></option>
    <option value="" disabled selected>Choose your option</option>
    <option value="1">Gram</option>
    <option value="2">mililiter</option>
    <option value="3">Kyat Thar</option>
  </select>
        </div>
      </div>

      <!-- for minimum amount -->

       <div class="row">
        <div class="input-field col s5">
          <input id="min" name="min" type="number" class="validate" required="required" value="<?php echo $row["min_amount"]?>">
          <label for="min">Minimum buyable amount</label>
          
        </div>
     

      <!-- for maximum amount -->

      
        <div class="input-field col s5">
          <input id="max" name="max" type="number" class="validate" required="required" value="<?php echo $row["max_amount"]?>">
          <label for="max">Maximum buyable amount</label>
          
        </div>
      </div>

   <!-- for brief description  -->

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
        <textarea class="materialize-textarea validate" name="brief" value="<?php echo $row["p_description"]?>" ></textarea>
        <label for="brief">Brief description of the product</label>
        </div>
      </div>
      <div class="input-field inline col s5">
        <br><br>
<label>Category</label>

<select class="browser-default green lighten-2" id="selectitem" name="selectitem" onchange="changeData()" >
  <option value="" disabled selected>Choose your option</option>
  <option value="agricultural">agricultural products</option>
  <option value="fertilizers">fertilizers</option>
  <option value="equipments">equipments</option>
</select>
</div>
<div class="input-field inline col s5">
   <br><br>
<label>Brand</label> 
<select class="browser-default green lighten-2" id="selectedsub" name="selectedsub" onchange="changeData()">
  <option value="" disabled selected>Choose your option</option>
  <option value="fruits" id="0">fruits</option>
  <option value="grocery" id="1" >grocery</option>
  <option value="stable" id="2">stable foods</option>

  <option value="hello" id="3" style="display:none;">stable foods</option>
  <option value="hello" id="4" style="display:none;">stable foods</option>
  <option value="hello" id="5" style="display:none;">stable foods</option>
  <option value="hello" id="6" style="display:none;">stable foods</option>
</select>
</div>
   <!-- for maximum amount -->


<!-- for qualification
--><div class="input-field inline col s10">
<br><br>
     <label>Qualification</label> 
  <select class="browser-default green lighten-2" id="qualification"  name="qualification">
    <option value="" disabled selected>Choose your option</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
  </select>
</div>

<!-- for media for product image
--><br><br>
<div class="file-field input-field col s10">
      <div class="btn green white-text">
        
        <span>File</span>
        <input type="file" name="image" id="image" multiple>

      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload one or more files">
      </div>
    </div>



    <br>
    <br><div>
<table><tr><td></td><td>
<form action="post">
  <button class="btn green white-text" type="submit" name="update" >UPDATE
    <i class="material-icons right">send</i>
  </button>
</form>
   </td>
  <td>
  <button class="btn green white-text modal-close" type="submit" name="cancel">Cancle
    <i class="material-icons right">cancel</i>
  </button></td></tr></table>
</div>

     </form>

  </div>
  </div>
</div>
<!--deleteProductsForm-->
<div id="deleteProducts" class="modal fade" role="dialog">
    <div class="padding-normal modal-dialog">
      <h3>Delete your Products</h3>

    </div>
  <div>
    <table border="0">
      <tr>
         <td>
           <form method="post" action="userProducts.php">
       <button class="btn green white-text" type="submit" name="confirm" >Confirm
        <i class="material-icons right">update</i>
       </button>
       </form>
     </td>
   
    <td>
    <form method="post" action="userProducts.php">
  <button class="btn green white-text" type="submit" name="cancel">Cancel<i class="material-icons right">cancel</i>
  </button>
</form>
</td>
</tr>
</table>
</div>


     

</div>

<?php

static $jssor = 0;
$sid = $_SESSION['sid'];

            $sliderCount= "select count(distinct(category))as ct from product where sid='$sid'";
      
            $result = mysqli_query ($con,$sliderCount);          
           
            $r=mysqli_fetch_array($result);
            $count = $r['ct'];

function showProducts($category){

  global $jssor;
  $length = strlen($category);
  $length=$length+2;

 include("dblink.php");
  $sid = $_SESSION['sid'];
//$sid=1;

  $query = "select distinct substring(category,$length) as subCatagory from product where category like '$category/%' and sid='$sid';";
      
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
      <div id='jssor_".$jssor."' style='position:relative;margin:0 auto;top:0px;left:0px;width:1000px;height:280px;overflow:hidden;visibility:hidden;'>
        
        <div data-u='slides' style='cursor:default;position:relative;top:0px;left:2px;width:1000px;height:300px;overflow:hidden;padding: 8px;'>";

        $subCatagory = $row['subCatagory'];
        
  $query2 = "select * from product where category like '$category%$subCatagory' and sid='$sid'";

  $ret2 = mysqli_query ($con,$query2);          
  $noRows2=mysqli_num_rows($ret2);

  for($j=0;$j<$noRows2;$j++){
    $row2=mysqli_fetch_array($ret2); 
      $array = explode(',', $row2["p_image"]);
    $url = $array[0];
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
            <?php echo $row2['pname']; ?>
          </span>
          <div class='row'>
             <div class='col s6'>

           <button href = '#editProducts' class='btn green modal-trigger'>Edit<i class='material-icons right'>edit</i></button>
          </div>
         
          
          <div class='col s6'>

          <!--input type="hidden" name="productId" 
            value="<?php echo $row2['pid'];?>"-->
          <button  href='#deleteProducts'class='btn green modal-trigger'>Delete<i class='material-icons right'>delete</i></button>
          </div>
          </div>
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

  }
}
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

<div class="fixed-action-btn padding-normal">
  <a class="btn-floating btn-large red">
    <i class="large material-icons">mode_edit</i>
  </a>
  <ul>
    <li><a class="btn-floating red modal-trigger" href="#addProducts"><i class="material-icons">add</i></a></li>
    
    <li><a class="btn-floating blue" href="dash_board.php"><i class="material-icons">insert_chart</i></a></li>
  </ul>
</div>
</div>
 <script type="text/javascript">
  function changeData() {
  var e = document.getElementById("selectitem");
  var strUser = e.options[e.selectedIndex].value;

  switch(strUser){
  
    case "fertilizers":document.getElementById("0").value="pesticide";
                document.getElementById("0").innerHTML="pesticide";
                document.getElementById("1").value="Nitrogen";
                document.getElementById("1").innerHTML="Nitrogen fertilizer";
                document.getElementById("2").value="phosphorous";
                document.getElementById("2").innerHTML="phosphorous fertilizer";
                document.getElementById("3").value="Potassium";
                document.getElementById("3").innerHTML="Potassium fertilizer";


                document.getElementById("3").style.display = "block";

    break;
    case "equipments":document.getElementById("0").value="Cultipacker";
                document.getElementById("0").innerHTML="Cultipacker";
                document.getElementById("1").value="Harrow";
                document.getElementById("1").innerHTML="Harrow";
                document.getElementById("2").value="Roller";
                document.getElementById("2").innerHTML="Roller";
                document.getElementById("3").value="Subsoiler";
                document.getElementById("3").innerHTML="Subsoiler";
                document.getElementById("3").style.display = "block";
    break;

  }


    }

</script>


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
   <!--script type="text/javascript">jssor_2_slider_init();</script>
    <script type="text/javascript">jssor_3_slider_init();</script-->

  <script type="text/javascript">
            function delnews(newsID)
            {
            if (confirm("Are you sure you want to delete '"))
            {
            window.location.href = 'userProducts.php';
              }
                }
            </script>
           
<?php
displayPageFooter();
?>