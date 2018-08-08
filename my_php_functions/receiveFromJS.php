<?php
include("db_config.php");

$data = json_decode(stripslashes($_POST['data']));
echo "size of the array is ".sizeof($data);
for ($i=0; $i < sizeof($data); $i++) { 
	$j=$i+1;
	$k=$i+2;
		$sqlquery="INSERT INTO fruits (name,price,unit) VALUES('$data[$i]','$data[$j]','$data[$k]')";
	
	if(mysqli_query($connection,$sqlquery)){
	    echo ("query is ok");
	    }
	    else{
	    	echo 'query does not  work ';
	    }

  $i=$i+2;
} 
?>