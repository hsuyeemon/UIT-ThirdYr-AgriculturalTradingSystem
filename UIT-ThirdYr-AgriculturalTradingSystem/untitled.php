<!doctype html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="$1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>test</title>

    <?php
    require ("dblink.php");
    ?>

</head>
<body>
     <?php
    if(isset($_POST['save'])){
        $sql = "INSERT INTO test (name, password, EMAIL)
        VALUES ('".$_POST["username"]."','".$_POST["email"]."')";
        echo "record";
        $result = mysql_query($sql);
        if (!mysql_query($sql))

  {

  die('Error: ' . mysql_error());

  }
    }
    else {echo "not record";}

    ?>
<div>
    <form method="post"> 
    <label id="first"> First name:</label><br/>
    <input type="text" name="username"><br/>

    <label id="first">Password</label><br/>
    <input type="" name="password"><br/>

    <label id="first">Email</label><br/>
    <input type="text" name="email"><br/>

    <button type="submit" name="save">save</button>
    <button type="submit" name="get">get</button>
    </form>
</div>
</body>
</html>