<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
$json = file_get_contents('https://sendkudo.org/api/v1/getstream/73f81700a13a19873d31c66090e564f8747fd3f2480cacecdb5c80496d40a98a');
 $obj = json_decode($json);
 //echo $obj;

 echo $obj->data;
 $hex=hex2bin($obj->data);
var_dump($hex);
//echo $json;
?>
</body>
</html>