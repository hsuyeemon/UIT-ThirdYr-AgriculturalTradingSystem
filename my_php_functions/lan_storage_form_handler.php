<?php
include("db_config.php");

	$name=$_POST['name'];

$sqlquery="INSERT INTO unicoded_names (name) VALUES('$name')";
	
	if(mysqli_query($connection,$sqlquery)){
	    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully added name');
    </script>");
	    }
	    else{
	    	echo 'query does not  work because of';
	    	echo mysqli_error($connection);
	    }
?>