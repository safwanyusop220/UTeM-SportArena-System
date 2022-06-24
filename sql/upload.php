<?php

$target_dir  = "images/sports/";
$target_file = $target_dir.basename( $_FILES["fileToUpload"]["name"] );
$uploadOk    = 1;
$imageFileType  = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


//checkking image
if (isset($_POST["submit"])){
    $check = getimagesize($_FILES["fileTopUpload"]["tmp_name"]);

    if ($check !== false) {
        echo"file is an image" .  $check["mime"].".";
        $uploadOk = 1;
    }
    else{
        echo"file is not an image";
        $uploadOk = 0;
    }
}

//check if file already exist
if (file_exists($target_file) ){
    echo"Sorry, the file already exist";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

?>