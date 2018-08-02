<?php
// db properties
require 'dblink.php';

if(isset($_GET['delnews']))
{
$query = mysql_query("DELETE FROM test WHERE newsID = '{$_GET['delnews']}'")or die('Error : ' . mysql_error());
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
}
?>

<html>
<head>
<script language="JavaScript" type="text/javascript">
function delnews(newsID, newsTitle)
{
if (confirm("Are you sure you want to delete '" + newsTitle + "'"))
{
window.location.href = 'admin.php?delnews=' + newsID;
}
}
</script>
</head>

<body>
<?php
$result = mysql_query("SELECT * FROM test")or die(mysql_error());
while($row = mysql_fetch_object($result))
{
echo "<ul>n";
echo "<li>$row->name <a href='javascript:delnews('$row->id','$row->name')'>Delete</a></li>n";
echo "</ul>n";
}
?>
</body>