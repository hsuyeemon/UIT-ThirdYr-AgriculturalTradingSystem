<?php

include("db_config.php");
$result=mysqli_query($connection,"SELECT count(*) as total from id_test");
$data=mysqli_fetch_assoc($result);

$userid=$data['total']+1;
$name=$_POST["name"];
echo "user id is ".$userid;
echo $name;

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

