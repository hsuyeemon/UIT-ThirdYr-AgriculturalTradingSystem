<?php

include("db_config.php");
$id=$_POST["id"];
$seleced_val1=$_POST["selectitem"];
$seleced_val2=$_POST["selectedsub"];
$seleced_cata = $seleced_val1 . '/' . $seleced_val2;



	$sqlquery="INSERT INTO product (product_id, catagory) VALUES('$id', '$seleced_cata')";
	
	if(mysqli_query($connection,$sqlquery)){
	    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully added package');
    </script>");
	    }
	    else{
	    	echo 'query does not  work ';
	    }



?>

