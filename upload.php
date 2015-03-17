<?php
  if(!empty($_FILES["uploadImage"])) {
    // get file name
    $filename = basename($_FILES['uploadImage']['name']);  
    // get extension
    $ext = substr($filename, strrpos($filename, '.') + 1);
    if ($ext == "jpg") {
      $newName = 'images/'.time().'.'.$ext;

          if ((move_uploaded_file($_FILES['uploadImage']['tmp_name'], $newName))) {
            list($width, $height) = getimagesize($newName);
              echo '{"image" : "'.$newName.'", "height" : "'.$height.'", "width" : "'.$width.'" }';
          }
          else {
              echo '{"error" : "An error occurred while moving the files"}';
          }
    } 
    else {
        echo '{"error" : "Invalid image format"}';
    }
} 
?>