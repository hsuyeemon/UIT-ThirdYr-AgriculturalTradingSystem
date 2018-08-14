<?php 
if(isset($_POST['commentSubmit'])){
$sql="INSERT INTO comment(cmt_text,rating,oid) VALUES ('".$_POST["comment"]."',2,2)";
$result=mysqli_query($con,$sql);
if($result) {
  echo ("<script LANGUAGE='JavaScript'>
  alert('Comment have been recorded');
    </script>");}
}
?>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="padding: 48px;">

      <h2 id="review">Review</h2>

     <div class="row">
    <div class="input-field col s12">
      <!--If not used prefix class the icon overflow the textarea-->
      <i class="material-icons prefix">comment</i>
      <textarea id="txt" name="comment" class="materialize-textarea" maxlength="400"></textarea>
      <label for="txta1">Comment</label>

    </div>
     <input type="submit" class="btn btn-success right green white-text" name="commentSubmit" value="Submit" id="review"  onclick=""/>
  </div>
</div>
</div>
