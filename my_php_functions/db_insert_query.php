<?php
include("db_config.php");
	$sqlquery="INSERT INTO id_test (id, name) VALUES('$userid', '$name')";
	
	if(mysqli_query($connection,$sqlquery)){
	    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully added package');
    </script>");
	    }
	    else{
	    	echo 'query does not  work ';
	    }

?>