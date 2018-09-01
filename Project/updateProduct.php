<?php
include("dblink.php");
$sql="select * from product where status=0";
            $result=mysqli_query($con,$sql);

$ids=[];
while($row = mysqli_fetch_array($result))
{
array_push($ids,$row['pid']);

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
$update_result = mysqli_query($con,"update product set status=1 where pid IN (".implode(',',$approved_id).")");
header('Location: approveProduct.php');

}

if(sizeof($declined_id)>0){
$delete_result = mysqli_query($con,"delete from product where pid IN (".implode(',',$declined_id).")");
header('Location: approveProduct.php');
}

if ($update_result or $delete_result) {
echo "query is ok";
}
else{
	echo "query is not ok";
	
}

?>
<script type="text/javascript">
    $(document).ready(function(){
  $('.modal').modal();
    });

   
</script>