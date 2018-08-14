
<?php 
include("dblink.php");
if(isset($_POST['commentSubmit'])){
$sql="INSERT INTO comment(cmt_text,rating,oid) VALUES ('".$_POST["comment"]."',2,2)";
$result=mysqli_query($con,$sql);

}
if($result) {
  echo ("<script LANGUAGE='JavaScript'>
  alert('Comment have been recorded');
    </script>");}
?>
<textarea name="comment"></textarea>
<button name="commentSubmit">bit</button>