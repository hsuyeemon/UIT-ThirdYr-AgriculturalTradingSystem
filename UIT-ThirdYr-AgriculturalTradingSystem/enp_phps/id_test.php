<?php

include("db_config.php");


	$result = mysqli_query($connection,"select count(*) as total_id from id_table");



	    $row = mysqli_fetch_array($result);
	    echo $row['total_id'];
	    $new_id=$row['total_id']+1;

	    $sqlquery="INSERT INTO id_table (id) VALUES('$new_id')";
	
	if(mysqli_query($connection,$sqlquery)){
	    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully added id');
    </script>");
	    }
	    else{
	    	echo 'query does not  work ';
	    }

	   

?>