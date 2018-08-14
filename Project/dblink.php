<?php
	$con=mysqli_connect("localhost","root","root");
	if(!$con)
	{
		die('couldnt connect:'.mysql_error());
	}


	$databasename="agriProject";
	$db_selected=mysqli_select_db($con,$databasename);


	if(!$db_selected)
	{
		die("Can't use $databasename:".mysql_error());
	}
?>