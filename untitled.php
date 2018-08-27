
<?php 
include("dblink.php");
if(isset($_POST['commentSubmit'])){
$sql="INSERT INTO admin (user_name,admin_id,password) VALUES ('".$_POST["comment"]."',2,2)";
$result=mysqli_query($con,$sql);
if($result) {
  echo ("<script LANGUAGE='JavaScript'>
  alert('Comment have been recorded');
    </script>");}
  else
    echo mysql_error();
}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form method="post">
<textarea name="username"></textarea>
<button name="commentSubmit">bit</button></form>
</body>
</html>
