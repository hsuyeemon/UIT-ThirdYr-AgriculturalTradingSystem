<?php 
$source=$_POST['point1'];
$destination=$_POST['point2'];

// https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=Washington,DC&destinations=New+York+City,NY&key=AIzaSyCPH1BAti2fYnBTZaqOyKqWh3Yr8WBAvWU

$jsonobj=file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".urlencode($source)."&destination=".urlencode($destination)."&key
	=AIzaSyCPH1BAti2fYnBTZaqOyKqWh3Yr8WBAvWU");

			 $obj = json_decode($jsonobj,true);
 //echo $obj;

			 // $distance=$obj->distance;
			 // echo $distance;

			 if(isset($obj))
			 {
			 	echo "api return true value";

			 }
$obj1['rows'][0]['distance']['text']=1;
echo $obj1['rows'][0]['distance']['text'];
?>