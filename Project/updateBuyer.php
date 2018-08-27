<?php
include("dblink.php");
$sql="select * from buyer where b_status=0";
            $result=mysqli_query($con,$sql);
          
echo mysqli_error($con);
$ids=[];
while($row = mysqli_fetch_array($result))
{
array_push($ids,$row['bid']);

}

$approved_id=[];
$declined_id=[];
 $loopcontroller=$_POST['loopcontroller'];

 for ($i=0; $i < $loopcontroller; $i++) { 
 if($_POST[$ids[$i]]=="1")
 { 
	array_push($approved_id,$ids[$i]);
 }
 elseif ($_POST[$ids[$i]]=="0") {
 	array_push($declined_id,$ids[$i]);
 }
}

if(sizeof($approved_id)>0){
$update_result = mysqli_query($con,"update buyer set b_status=1 where bid IN (".implode(',',$approved_id).")");
header('Location: approveBuyer.php');
}

if(sizeof($declined_id)>0){
$delete_result = mysqli_query($con,"delete from buyer where bid IN (".implode(',',$declined_id).")");
header('Location: approveBuyer.php');
}

if ($update_result or $delete_result) {
echo "query is ok";
}
else{
	echo "query is not ok";
	
}

?>