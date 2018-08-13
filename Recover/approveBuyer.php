
  <?php
            include('common.php');
            include('dblink.php');
            displayPageHeader("approveBuyer.php");
            $sql="select bid,bname,b_phoneno,b_email from buyer where status=0";
            $result=mysqli_query($con,$sql);
            $num_rows = mysqli_num_rows($result);
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
    echo "</form>";
  	?>
     <?php
displayPageFooter();
?>