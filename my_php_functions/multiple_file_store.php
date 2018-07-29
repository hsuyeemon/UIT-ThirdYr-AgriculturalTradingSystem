<?php

 include("dblink.php");

if (isset($_POST['submission'])){

       for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
        $filenames=$_FILES['files']['name'][$i];
            //Get the temp file path
            $tmpFilePath = $_FILES['files']['tmp_name'][$i];

            //Make sure we have a filepath
            if ($tmpFilePath != "") {
                //Setup our new file path
                $newFilePath = "images/" . $_FILES['files']['name'][$i];

                //Upload the file into the temp dir
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $sql="INSERT into test (id,name) values('2','$filenames')";
                        mysql_query($sql);
                  $photoarr[]=$filenames;
                    //Handle other code here

                }
            }
        }
    }
        


        ?>
        <form action="multiple_file_store.php" enctype="multipart/form-data" method="post">
<input type="file" name="files[]" multiple/>
<input type="submit" name="submission" value="Upload"/>