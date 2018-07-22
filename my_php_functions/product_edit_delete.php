 <?php 
 $id=$_POST['id'];
    if(isset($_POST['edit'])){
     echo "The edit function is called and id is ".$id;
    }
    if(isset($_POST['delete'])){
      echo "The delete function is called.".$id;
    }
    ?>


