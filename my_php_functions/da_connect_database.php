<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php
include("db_config.php");

$result=mysqli_query($connection,"SELECT * from approve_table where status=0");

$num_rows = mysqli_num_rows($result);
echo "<table>";
echo "<tr><th>name<th><tr>";
echo "<form action='account_management.php' method='post'>";
while($row = mysqli_fetch_array($result))
{
	$id=$row['id'];
echo "<tr><td>";
echo $row['name'];
echo "</td>";
echo "<td><input type='radio' name='$id' value='1'>approve</td>";
echo "<td><input type='radio' name='$id' value='0'>decline</td>";
echo "</td></tr>";
}
echo "<td><input type='hidden' name='loopcontroller' value='$num_rows'></td>";
echo "<input type='submit' name='submit'>";
echo "</form></table>";
?>

</body>
</html>