<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="fileInsert.php" method="Post">

	<div class="file-field input-field">
        <div class="btn green white-text">
          <span>File</span>
          <input type="file" name="file" multiple>
        </div>
      </div>
      <input type="submit" value="submit">
     </form>
     
    <?php

	include 'connect.php';

	if(isset($_POST["file"])){

		$filePath = "C:\\Users\\Dell\Pictures\\Saved Pictures\\".$_POST['file'];
	 
        //FOR INSERT
		$sql = "insert into img values (:image)";

		try{
		//1.prepare
		$st = $conn->prepare($sql);

		//2. bind
	
		$st -> bindValue(":image",$filePath,PDO::PARAM_STR);

		//3.execute
		$st -> execute();
		}catch(PDOException $e){
		echo "query failed ".$e->getMessage();
		}


		//FOR SELECT
		$sql1 = "SELECT imagePath as imagePath FROM img";
		try{
		$rows1 = $conn->query($sql1);

		foreach ($rows1 as $row1) {
		# code...
		$image = $row1["imagePath"];
		echo "THe image from db is $image";
		$imageData = base64_encode(file_get_contents($image));

		// Format the image SRC:  data:{mime};base64,{data};
		$src = 'data: '.mime_content_type($image).';base64,'.$imageData;

		// Echo out a sample image
		echo '<img src="' . $src . '">';
		}

	}catch(PDOException $e){
	echo "query failed ".$e->getMessage();
	}

	}

	?>

</body>
</html>