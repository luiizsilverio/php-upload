<?php

  $target_dir = "tmp/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // nome do arquivo

  // $FILES = Array("name", "full_path", "type", "tmp_name", "size")

  echo $target_file;
  echo '<br>';

  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // extensão do arquivo

  if(isset($_POST["submit"])) {

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]); // arquivo é imagem?
    if ($check !== false) {
      echo "File is an image - " . $check["mime"] . ".<br>";
      $uploadOk = 1;
    } 
    else {
      echo "File is not an image.<br>";
      $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.<br>";
      $uploadOk = 0;
    }

    // Check limit file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.<br>";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
      $uploadOk = 0;
    }

    // if $uploadOk = 0 raise an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    } 
    // if everything is ok, try to upload file
    else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    
  }

?>