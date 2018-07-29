 <?php
 require('dblink.php');
 $result = mysql_query("SELECT * FROM product");
$num_rows = mysql_num_rows($result);
$total=++$num_rows;
    if(isset($_POST['save'])){
        echo "string";
        $sql = "INSERT INTO product(pid, pname, price, p_image,p_description, status, min_amount, max_amount, UNIT, qualification, category,sid) VALUES ('$total','".$_POST["pname"]."','".$_POST["price"]."','".$_POST["image"]."','".$_POST["brief"]."','1','".$_POST["min"]."','".$_POST["max"]."','".$_POST["unit"]."','".$_POST["qualification"]."','".$_POST["category"]."','1')";
       $result=mysql_query($sql);
    }
 
if($result) {echo "finish";}
else {echo mysql_error();}
    # code...

    ?>
    <form>
    <button name="submit">submit</button>
</form>
    <form method="post"> 
    <label id="first"> First name:</label><br/>
    <input type="text" name="pname"><br/>

    <label id="first">Password</label><br/>
    <input type="password" name="price"><br/>

    <label id="first">Email</label><br/>
    <input type="text" name="image"><br/>
    <label id="first"> First name:</label><br/>
    <input type="text" name="brief"><br/>

    <label id="first">Password</label><br/>
    <input type="password" name="min"><br/>

    <label id="first">Email</label><br/>
    <input type="text" name="max"><br/>
    <label id="first"> First name:</label><br/>
    <input type="text" name="unit"><br/>

    <label id="first">Password</label><br/>
    <input type="password" name="qualification"><br/>

    <label id="first">Email</label><br/>
    <input type="text" name="category"><br/>

    <button type="submit" name="save">save</button>
    <button type="submit" name="get">get</button>
    </form>