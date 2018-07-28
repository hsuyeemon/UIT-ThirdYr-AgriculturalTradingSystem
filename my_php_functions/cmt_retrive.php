<!DOCTYPE html>
<html>
<head>
	 <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<title></title>
</head>
<body>
<?php
include('db_config.php');
$result = mysqli_query($connection,"SELECT o.oid,b.bname,b.bid, c.* FROM buyer AS b, order_product AS o, comment AS c WHERE o.pid=1 AND b.bid=o.bid AND c.oid=o.oid
");


while($row = mysqli_fetch_array($result))
{

echo  "<div class='row'>
    <div class='col s4 m4'>
      <div class='card blue-grey darken-1'>
        <div class='card-content white-text'>";
echo "<span class='card-title'>". $row['bname'] ."</span>";
echo "<p>".$row['cmt_text']."</p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
 echo "</div>"; 
}


   mysqli_close($connection);
   
?>
   <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
   <script type="text/javascript" src="js/materialize.min.js"></script>
   <script src="js/materialize.js"></script>
   <script src="js/init.js"></script>

</body>
</html>