
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p id="para1">change it to myanmar</p>
</body>
<?php
session_start(); 
$lan_flag=$_SESSION['lan_flag'];
if ($lan_flag) {
  echo '<script type="text/javascript">' . 
      'document.getElementById("para1").innerHTML = "changed it to myanmar";' .
      '</script>';
}
?>
</html>
