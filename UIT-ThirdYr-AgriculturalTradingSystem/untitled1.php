<!doctype html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="$1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>test</title>

   

</head>
<body>
     <?php

require ("dblink.php"); 
if(isset($_POST['save']))
{
    $sql = "INSERT INTO PRODUCT (PID,PNAME, PRICE, P_IMAGE,P_DESCRIPTION,STATUS,SID,CATEGORY_ID)
    VALUES ('".$_POST["pname"]."','".$_POST["price"]."','".$_POST["image"]."','".$_POST["brief"]."',NULL,NULL,NULL)";
    echo "1 record added";
    $result = mysql_query($sql);
   if (!mysql_query($sql))

  {

  die('Error: ' . mysql_error());
echo mysql_error();
  }


}
else{
  echo "no record";
}


    ?>

     <form >
      <button type="submit" name="save">add1</button>
      
      <div class="row ">
        <div class="input-field col s12 ">
          <input id="pname" name="pname" type="text" class="validate">
          <label for="pname">Product name</label>
        </div>
      </div>

      <!-- for price per unit -->

       <div class="row ">
        <div class="input-field inline col s5">
          <input id="price" name="price" type="text" class="validate">
          <label for="price">Price</label>
        </div>
        <span class="col s1">per</span>
        <div class="input-field inline col s3 row s5">
          
  <select class="browser-default green lighten-3" name="unit" id="unit">
    <option value=""  disabled selected>Choose your option unit</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
  </select>
        </div>
      </div>

      <!-- for minimum amount -->

      <div class="row">
        <div class="input-field col s12">
          <input id="min" name="min" type="text" class="validate">
          <label for="min">Minimum buyable amount</label>
        </div>
      </div>

      <!-- for maximum amount -->

      <div class="row">
        <div class="input-field col s12">
          <input id="max" name="min" type="text" class="validate">
          <label for="max">Maximum buyable amount</label>
        </div>
      </div>

   <!-- for brief description  -->

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
        <textarea name="brief" id="brief" class="materialize-textarea validate"></textarea>
        <label for="brief">Brief description of the product</label>
        </div>
      </div>


   <!-- for maximum amount -->


<!-- for qualification
--><div>
     <label>Qualification</label> 
  <select class="browser-default green lighten-2" id="qualification" name="qualification">
    <option value="" disabled selected>Choose your option</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
  </select>
</div>

<!-- for media for product image
--><br><br>
<div class="file-field input-field">
      <div class="btn green white-text">
        <span>File</span>
        <input type="file" name="image" id="image" multiple>

      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload one or more files">
      </div>
    </div>

    <br>
    <br><div>

  <td>
  <button class="btn green white-text" type="submit" name="cancel">Cancle
    <i class="material-icons right">cancel</i>
  </button>
</div>
     </form>

</body>
</html>