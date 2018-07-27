<?php


      include("dblink.php");
      /*$queryForFertilizer = "select * from product where category like 'Fertilizer%'";
      $ret = mysqli_query ($con,$queryForFertilizer);          
     $noRows=mysqli_num_rows($ret);


		
      echo "$noRows";
      for($i=0;$i<$noRows;$i++){
      	 $row=mysqli_fetch_array($ret); 
      
		$url = $row["p_image"];
      	//$image = file_get_contents("$url");
      	//$imageData = base64_encode(file_get_contents($url));
     echo $url;

		echo "
      	<div class='card' style='border:1px solid black;box-shadow: 100px 50px 50px 50px rgba(0,0,0,0);'>
          <a href='productDetails.html'>
        <div class='card-image'>
          <img src='".$url."' height='160px' width='160px'>
        </div></a>
         <div class='card-content' >
        <span class='card-title activator grey-text text-darken-4'>".
        $row['pname']."<i class='material-icons right'>more_vert</i></span>
        
      </div>
      <div class='card-reveal'>
      <span class='card-title grey-text text-darken-4'>".
        $row['pname']."<i class='material-icons right'>close</i></span>
        <p>".$row['p_description']."</p>
    </div></div>
";

      }
*/
      //$query1 = "select count(distinct(catagory)) as numSubCatagory from product where catagory like 'saab/%';";

      $query = "select distinct substring(catagory,5) as subCatagory from product where catagory like 'saab/%';";
      $ret = mysqli_query ($con,$query);          
     $noRows=mysqli_num_rows($ret);

         
 //echo $row;

     for($i=0;$i<$noRows;$i++){
      
$row=mysqli_fetch_array($ret); 
      echo $row["subCatagory"];

  }


      ?>