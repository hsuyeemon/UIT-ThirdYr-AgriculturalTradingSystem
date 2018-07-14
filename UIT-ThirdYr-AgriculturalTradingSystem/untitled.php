<?php
    $username="root";
    $password="";
    $database="ATS";

    #get the data from form fields
    $Id=$_POST['SID'];
    $P_name=$_POST['SNAME'];
    $address1=$_POST['S_PHONENO'];
    $address2=$_POST['S_ADDRESS'];
    $email=$_POST['S_EMAIL'];

    mysql_connect("localhost",$username,$password);
    mysql_select_db($database) or die("unable to select database");

    if($_POST['insertrecord']=="insert"){
        $query="INSERT into SELLER (SID,SNAME,S_PHONENO,S_ADDRESS,S_EMAIL) values('$Id','$P_name','$address1','$address2','$email')";
        echo "inside";
        mysql_query($query);
        $query1="SELECT * from SELLER";
        $result=mysql_query($query1);
        $num= mysql_numrows($result);

        #echo"<b>output</b>";
        print"<table border size=1 > 
        <tr><th>Id</th>
        <th>P_name</th>
        <th>address1</th>
        <th>address2</th>
        <th>email</th>
        </tr>";
        $i=0;
        while($i<$num)
        {
            $Id=mysql_result($result,$i,"SID");
            $P_name=mysql_result($result,$i,"SNAME");
            $address1=mysql_result($result,$i,"S_PHONENO");
            $address2=mysql_result($result,$i,"S_ADDRESS");
            $email=mysql_result($result,$i,"S_EMAIL");
            echo"<tr><td>$Id</td>
            <td>$P_name</td>
            <td>$address1</td>
            <td>$address2</td>
            <td>$email</td>
            </tr>";
            $i++;
        }
        print"</table>";
    }

    if($_POST['searchdata']=="Search")
    {
        $P_name=$_POST['SNAME'];
        $query="SELECT * from SELLER where SNAME='$P_name'";
        $result=mysql_query($query);
        print"<table border size=1><tr><th>Id</th>
        <th>P_name</th>
        <th>address1</th>
        <th>address2</th>
        <th>email</th>
        </tr>";
        while($row=mysql_fetch_array($result))
        {
            $Id=$row['SID'];
            $P_name=$row['SNAME'];
            $address1=$row['S_PHONENO'];
            $address2=$row['S_ADDRESS'];
            $email=$row['S_EMAIL'];
            echo"<tr><td>$Id</td>
            <td>$P_name</td>
            <td>$address1</td>
            <td>$address2</td>
            <td>$email</td>
            </tr>";
        }
        echo"</table>";
    }
    echo"<a href=lab2.html> Back </a>";
?>