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
            displayPageHeader("approveBuyer.php");
            $sql="select bid,bname,b_phoneno,b_email from buyer where b_status=0";
            $result=mysqli_query($con,$sql);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows>0){
            echo "<div class='content padding-normal'>";
  echo '<table border="300">
  	<thead>
  		<tr>
  			  <th>No.</th>
          <th>Buyer Name</th>
          <th>phone number</th>
          <th>email</th>
          <th>approve/decline</th>
              
  		</tr>
  	</thead>
  	<tbody>';
    echo"<form method='post' action='updateBuyer.php'>";
    $i=1;
	
       while($row=mysqli_fetch_array($result)){
        $bid=$row["bid"];
       
    

  		echo '<tr>
  		     <td>'.$i.'</td>
             <td>'.$row["bname"].'</td>
             <td>'.$row["b_phoneno"].'</td>
             <td>'.$row["b_email"].'</td>
             <td> <label>
                 <input class="with-gap" name='.$bid.' value=1 type="radio"/>
                 <span>approve</span>
                 </label>
                  <label>
                 <input class="with-gap" name='.$bid.' value=0 type="radio"/>
                 <span>decline</span>
                 </label></td>
             </tr>';
             $i++;
  	}
  	echo '</tbody>
  	</table>';
   
    echo "<button name='loopcontroller' value='$num_rows' class='btn green white-text' type='submit' >UPDATE <i class='material-icons right'>update</i>";
    echo "</button>";
     echo "</div>";
    echo "</form>";
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