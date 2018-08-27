<style>

/*
td {
    border-bottom: : 1px solid #ddd;
    padding: 8px;
    max-width:  100px;
    min-width: 20px;
    height: 50px;
}
*/

tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}

th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
    max-width:  200px;
    min-width: 10px;
}
</style>   
<?php
            include('common.php');
            include('dblink.php');
            displayPageHeader("approveProduct.php");
            $sql="select pid,pname,sname,price,UNIT,min_amount,max_amount from product P inner join seller S using(sid) where P.status=0";
            $result=mysqli_query($con,$sql);
             $num_rows = mysqli_num_rows($result);
             if ($num_rows>0){
echo "<div class='content padding-normal'>";

  echo '<table border="300">
    <thead>
      <tr>
          <th>No.</th>
          <th>Product Name</th>
          <th>Seller Name</th>
          <th>Price</th>
          <th>Unit</th>
          <th>Minimun amount</th>
          <th>Maximun amount</th>
          <th>approve/decline</th>
              
      </tr>
    </thead>
    <tbody>';
    echo"<form method='post' action='updateProduct.php'>";
  
       while($row=mysqli_fetch_array($result)){
        $pid=$row["pid"];
       
    

      echo '<tr>
           <td>'.$row["pid"].'</td>
             <td>'.$row["pname"].'</td>
             <td>'.$row["sname"].'</td>
             <td>'.$row["price"].'</td>
             <td>'.$row["UNIT"].'</td>
             <td>'.$row["min_amount"].'</td>
             <td>'.$row["max_amount"].'</td>
             <td> <label>
                 <input class="with-gap" name='.$pid.' value=1 type="radio"/>
                 <span>approve</span>
                 </label>
                  <label>
                 <input class="with-gap" name='.$pid.' value=0 type="radio"/>
                 <span>decline</span>
                 </label></td>
             </tr>';
    }
    echo '</tbody>
    </table>';
    echo "<button name='loopcontroller' value='$num_rows' class='btn green white-text' type='submit' >UPDATE <i class='material-icons right'>update</i>";
    echo "</button>";
    echo "</form>";
    echo "</div>";
  }
  if($num_rows==0){
    ?>
    
             <table border="300">
      <tr>
          <th align="right">No file to approve or decline</th>
      </tr>
      </table>
<?php
            } ?>
    
    
       
         <?php
displayPageFooter();
?>