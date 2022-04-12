<?php
require_once('connection.php');
$id =$_POST['id'];
$cartoonid = $_POST['cartoonId'];
$result = $db->select("book",['folder'],[
    "bookid"=>$cartoonid
]);
$folder = $result[0]['folder'];


$targetcover = "cartoon/" . $folder . "/" ;
mkdir($targetcover . $id);
$targetcover = $targetcover . $id . "/";
$targetcover2 = $targetcover . "cover.jpg";
move_uploaded_file($_FILES['coverfile']['tmp_name'],$targetcover2);
$targetzip = $targetcover . "cartoon.zip";
move_uploaded_file($_FILES['cartoonfile']['tmp_name'],$targetzip);
$zip = new ZipArchive;
$res = $zip->open($targetzip);
if ($res === TRUE) {
  $zip->extractTo($targetcover . 'book/' );
//   $zipfile = getcwd() . "\\" . "cartoon\\" . $folder . "\\". $id . "\\cartoon.zip";
//   chmod($targetcover,0777);
//   unlink($targetzip);
}

echo "finish";
?>