<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$page = $_POST['page'];
$cartoonid  = $_POST['cartoonid'];

$result1 = $db->select("chapter","*",[
    "id"=>$page
]);
$result2 = $db->select("book","*",[
    "bookid"=>$cartoonid
]);
$result[0]['name'] = $result1[0]['chapter'];
$result[0]['folder'] = $result2[0]['folder'];
echo json_encode($result);
?>