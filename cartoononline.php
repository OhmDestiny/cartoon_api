<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$bookid = $_POST['bookid'];
$online = $_POST['online'];

$db->update("chapter",["online"=>$online],[
"id"=>$bookid
]);
echo finish;
?>