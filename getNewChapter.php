<?php
require_once('connection.php');
$id =$_POST['id'];
$chapter = $_POST['chapter'];
echo $_POST['cartoonfile'];

$result = $db->select("book","*",[
    "bookid"=>$id
]);
$folder = $result[0]['folder'];

// $targetcover = "catoon/" . $id. '.jpg';
// move_uploaded_file($_FILES['filecoverfile']['tmp_name'],$targetcover);
?>