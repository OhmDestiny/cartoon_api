<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);

$id = $_POST['id'];
$cartoonid = $_POST['cartoonid'];
$db->delete("chapter",[
"id"=>$id
]);

$result = $db->select("book","*",[
    "bookid"=>$cartoonid
]);
$folder = $result[0]['folder'];
//delete fiel all folder
$pathfile = "cartoon/" . $folder . "/" . $id;

$files = glob($pathfile . '/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file)) {
    unlink($file); // delete file
  }
}
$files = glob($pathfile . '/book/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file)) {
    unlink($file); // delete file
  }
}
rmdir($pathfile . '/book');
rmdir($pathfile);
?>