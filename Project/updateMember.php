<?php
include("dblink.php");
$sql="select * from seller where s_status=0";
            $result=mysqli_query($con,$sql);

$ids=[];
while($row = mysqli_fetch_array($result))
{
array_push($ids,$row['sid']);

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
$update_result = mysqli_query($con,"update seller set s_status=1 where sid IN (".implode(',',$approved_id).")");
   header('Location: approveMember.php');

}

if(sizeof($declined_id)>0){
$delete_result = mysqli_query($con,"delete from seller where sid IN (".implode(',',$declined_id).")");
   header('Location: approveMember.php');
}

if ($update_result or $delete_result) {
echo "query is ok";
}
else{
	echo "query is not ok";
	echo mysqli_error($con);
}

?>