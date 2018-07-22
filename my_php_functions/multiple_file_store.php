<?php

 include("db_config.php");



       for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
        $filenames=$_FILES['files']['name'][$i];
            //Get the temp file path
            $tmpFilePath = $_FILES['files']['tmp_name'][$i];

            //Make sure we have a filepath
            if ($tmpFilePath != "") {
                //Setup our new file path
                $newFilePath = "uploadedfiles/" . $_FILES['files']['name'][$i];

                //Upload the file into the temp dir
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $sql="insert into file_storing values(1,'$filenames')";
                        mysqli_query($connection,$sql);
                  $photoarr[]=$filenames;
                    //Handle other code here

                }
            }
        }
        echo implode(",",$photoarr);


        ?>