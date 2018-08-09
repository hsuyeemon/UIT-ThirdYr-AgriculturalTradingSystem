<?php
include("db_config.php");

$result=mysqli_query($connection,"SELECT id from approve_table where status=0");
$ids=[];
while($row = mysqli_fetch_array($result))
{
array_push($ids,$row['id']);

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
$update_result = mysqli_query($connection,"update approve_table set status=1 where id IN (".implode(',',$approved_id).")");}

if(sizeof($declined_id)>0){
$delete_result = mysqli_query($connection,"delete from approve_table where id IN (".implode(',',$declined_id).")");
}

if ($update_result or $delete_result) {
echo "query is ok";
}
else{
	echo "query is not ok";
}

?>