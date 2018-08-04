<?php

$dsn = "mysql:dbname=mydatabase";
$username="root";
$pass="root";


try{
	$conn = new PDO($dsn,$username,$pass);
	//$conn->setAttribute($attribute,$value);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOExeption $e){
	echo "connection failed: ".$e->getMessage();
}

?>