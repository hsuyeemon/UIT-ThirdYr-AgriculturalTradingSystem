<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
<title></title>
<link href="auth-buttons.css" rel="stylesheet" />
<link href="StyleSheet.css" rel="stylesheet" />
   </head>
<body>

<div id="wrap">
<div id="wrapHome">
<p><a class="btn-auth btn-facebook large" href="lan_index.php?lan_flag=1"> change to  <b>myanmar language</b> </a></p>
<p><a class="btn-auth btn-facebook large" href="lan_index.php?lan_flag=0"> change to  <b>English language</b> </a></p>

</div>
</div>
<p id="para">change it to myanmar</p>
<?
session_start(); 
$_SESSION['lan_flag']=$_GET['lan_flag'];
$lan_flag=$_GET['lan_flag'];
echo $_SESSION['lan_flag'];
if ($lan_flag) {
  echo '<script type="text/javascript">' . 
      'document.getElementById("para").innerHTML = "changed it to myanmar";' .
      '</script>';
}

?>
</body>
</html>