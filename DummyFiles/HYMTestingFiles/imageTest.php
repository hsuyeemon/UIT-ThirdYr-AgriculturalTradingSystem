<?php

include("dblink.php");


$queryForFertilizer = "select * from product where category like 'Fertilizer%'";
      $ret = mysqli_query ($con,$queryForFertilizer);          
     $noRows=mysqli_num_rows($ret);

     for($i=0;$i<$noRows;$i++){
         $row=mysqli_fetch_array($ret); 
      
    $image = $row["p_image"];
$imageData = base64_encode(file_get_contents($image));

// Format the image SRC:  data:{mime};base64,{data};
$src = 'data: '.mime_content_type($image).';base64,'.$imageData;

// Echo out a sample image
echo '<img src="' . $src . '">';}

?>