<?php
require_once('connection.php');
$id =$_POST['id'];
$cartoonid = $_POST['cartoonId'];

$result = $db->select("book","*",[
    "bookid"=>$cartoonid
]);
$folder = $result[0]['folder'];
$coverfileSend = $_POST['coverfilesSend'];

$targetcover = "cartoon/" . $folder . "/" . $id . "/" ;
$targetcover2 = $targetcover . $id . ".jpg";


if($coverfileSend != "NONE"){
    unlink($targetcover . cover.jpg);
    $targetcover2 = $targetcover . "cover.jpg";
    move_uploaded_file($_FILES['coverfile']['tmp_name'],$targetcover2);
}

$cartoonfileSend = $_POST['cartoonfileSend'];
$targetzip = $targetcover . "cartoon.zip";
if($cartoonfileSend != "NONE"){
    $dirname = $targetcover . "book";
    array_map('unlink', glob("$dirname/*.*"));

    move_uploaded_file($_FILES['cartoonfile']['tmp_name'],$targetzip);
    $zip = new ZipArchive;
    $res = $zip->open($targetzip);
    if ($res === TRUE) {
      $zip->extractTo($targetcover . 'book/' );
    //   $zipfile = getcwd() . "\\" . "cartoon\\" . $folder . "\\". $id . "\\cartoon.zip";
    //   chmod($targetcover,0777);
    //   unlink($targetzip);
    }
}


// echo "finish";