<?php
require_once('connection.php');
$id =$_POST['id'];
$targetcover = "uploads/" . $id. '-cover.jpg';
move_uploaded_file($_FILES['filecoverfile']['tmp_name'],$targetcover);

// $target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["file01"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



// // Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";   
//   $uploadOk = 0;
// }



// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
//   if (move_uploaded_file($_FILES["file01"]["tmp_name"], $target_file)) {
//     echo "The file ". htmlspecialchars( basename( $_FILES["file01"]["name"])). " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
// }
?>