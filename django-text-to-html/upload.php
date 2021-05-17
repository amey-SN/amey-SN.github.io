<?php
    $target_dir = "uploads/";
    echo ($_FILES['inpfile']['name']);
    $target_file = $target_dir . basename($_FILES['file']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES['file']['name']);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0)
 {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } 
  else {
    if (move_uploaded_file($_FILES['file']['name'], $target_file)) {
      echo '<script>alert("Your file was successfully uploaded !")</script>';
    } else {
      echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
    }
  }

    ?>