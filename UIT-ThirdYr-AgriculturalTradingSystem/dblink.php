<?php
	
            $usernm   = "root";
            $passwd   = "";
            $host     = "localhost";
            $database = "agri";

            //$Name=$_POST['Name'];
            //$Username=$_POST['User_name'];
            //$Password=$_POST['Password'];

            mysql_connect($host,$usernm,$passwd);

            mysql_select_db($database);

	mysql_select_db($database);
	echo "connect";
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


?>

 
	