<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
$_SESSION["pid"] = 1;
$_SESSION['unit']="ton";
$_SESSION['fromaddr']="MGDN";
echo "session started";
?>
</form>
</body>
</html>