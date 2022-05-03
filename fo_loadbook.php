<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['id'];
$id=52;
$result = $db->select("book","*",[
    "bookid"=>$id
]);
echo json_encode($result);

?>