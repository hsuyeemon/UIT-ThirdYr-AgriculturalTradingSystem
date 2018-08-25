<?php

include( "common.php" );

displayPageHeader( "index" );


include( "dblink.php" );


$products = "SELECT * FROM PRODUCT";
$productsQuery = mysqli_query($con,$products);
$num_rows = mysqli_num_rows($productsQuery);
while($row=mysqli_fetch_array($productsQuery)){
       

  $pid=$row["pid"];
  echo $pid;
?>

         <a  id="test" data-target="modalEditClient" href="#modalEditClient" class="btn modal-trigger waves-effect waves-light" 
         data-pname="<?php echo $row['pname'];?>" 
         data-price="<?php echo $row['price'];?>"
         data-unit="<?php echo $row['UNIT'];?>"
         data-currency="<?php echo $row['currency'];?>"
         data-description="<?php echo $row['p_description'];?>"
         data-min="<?php echo $row['min_amount'];?>"
         data-max="<?php echo $row['max_amount'];?>"
         data-qualification="<?php echo $row['qualification'];?>"
         data-category="<?php echo $row['category'];?>"

        >Button</a>


        <br><br>


<div id="modalEditClient" class="modal m1">
    <div class="modal-content">
        Product Name<input type="text" name="pname" id="nom">
        Price<input type="text" name="price">
        Unit<input type="text" name="unit">
        Currency<input type="text" name="currency">
        Des<input type="text" name="description">
        Min<input type="text" name="min">
        Max<input type="text" name="max">
        qualificatio<input type="text" name="qualification">
        category<input type="text" name="category">

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
</div>

<?php       
}
?>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>


<script type="text/javascript">
  

  $('.modal.m1').modal({
    ready: function(modal, trigger) {
        
        modal.find('input[name="pname"]').val(trigger.data('pname'))
        modal.find('input[name="price"]').val(trigger.data('price'))
        modal.find('input[name="currency"]').val(trigger.data('currency'))
        modal.find('input[name="description"]').val(trigger.data('description'))
        modal.find('input[name="unit"]').val(trigger.data('unit'))
        modal.find('input[name="max"]').val(trigger.data('max'))
        modal.find('input[name="min"]').val(trigger.data('min'))
        modal.find('input[name="qualification"]').val(trigger.data('qualification'))
        modal.find('input[name="category"]').val(trigger.data('category'))
        modal.find('input[name="prenom"]').val(trigger.data('prenom'))
    }
});
</script>

</body>
</html>





<?php
displayPageFooter();
?>