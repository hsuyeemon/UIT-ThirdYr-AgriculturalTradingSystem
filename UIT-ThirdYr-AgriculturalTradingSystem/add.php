<?php 
echo "var pname = document.getElementById('pname').value;
  var minnn= document.getElementById('min').value;
  var maxx=document.getElementById('max').value;

  var pnameReg = /^[a-zA-Z]+$/;
  var minnnReg=/^-?\d*(\.\d+)?$/;
  var maxxReg=/^-?\d*(\.\d+)?$/;

  if (pname.match(pnameReg))
  {
    if (minnn.match(minnnReg))
    {
     if (maxx.match(maxxReg))
         {
            alert('Good');
           
         }else 
             {
                alert('Invalid Max');
                
              }
    }
    else
    {
      alert('Invalid minn');
      
    }
  }
else {
  alert ('Invalid pname');
  
}" ?>
<?php
 require('dblink.php');
$result = mysql_query("SELECT * FROM product");
$num_rows = mysql_num_rows($result);
$total=++$num_rows;


    if(isset($_POST['save'])){
$seleced_val1=$_POST["selectitem"];
$seleced_val2=$_POST["selectedsub"];
$seleced_cata = $seleced_val1 . '/' . $seleced_val2;
        $sql = "INSERT INTO product(pid, pname, price, p_image,p_description, status, min_amount, max_amount, UNIT, qualification, category,sid) VALUES ('$total','".$_POST["pname"]."','".$_POST["price"]."','".$_POST["image"]."','".$_POST["brief"]."','0','".$_POST["min"]."','".$_POST["max"]."','".$_POST["unit"]."','".$_POST["qualification"]."','$seleced_cata','1')";
       $result=mysql_query($sql);
    }
 
if($result) {
  echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully added');
    </script>");}
else {echo mysql_error();}
    # code...

    ?>

    <?php

# DELETE
 include('dblink.php');
 //$result = mysqli_query($con,"SELECT * FROM product");
//$num_rows = mysqli_num_rows($result);
//$total=++$num_rows;
 
    if(isset($_POST['delete'])){
        echo "string";
        

$sql2 = "DELETE FROM product WHERE pid=18";
       $result2=mysqli_query($con,$sql2);
       if($result2) {echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully deleted');
    </script>");}
else {echo("<script LANGUAGE='JavaScript'>
    window.alert(mysqli_error());
    </script>");}
    }
 

    # code...


    ?>



     <?php
         //UPDATE
 include('dblink.php');
 //$result = mysqli_query($con,"SELECT * FROM product");
//$num_rows = mysqli_num_rows($result);
//$total=++$num_rows;
 
    if(isset($_POST['update'])){
        echo "string";
        

//$sql3 ="UPDATE product set pname=$_POST['pname'],price=$_POST['pname'],p_image=,$_POST['p_image'],p_description=$_POST['description'], 
     // min_amount=$_POST['min'], max_amount=$_POST['max'], UNIT=$_POST['unit'], qualification=$_POST['qualification'] WHERE pid='1'";
$sql3 ="UPDATE product set pname=".$_POST['pname'].",price=".$_POST['pname'].",p_image=,".$_POST['p_image'].",p_description=".$_POST['description'].", 
      min_amount=".$_POST['min'].", max_amount=".$_POST['max'].", UNIT=".$_POST['unit'].", qualification=".$_POST['qualification']." WHERE pid='1'";


       $result3=mysqli_query($con,$sql3);
       if($result3) {echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully update');
    </script>");}
else {echo("<script LANGUAGE='JavaScript'>
    window.alert(mysqli_error());
    </script>");}
    }
 

    # code...


    ?>