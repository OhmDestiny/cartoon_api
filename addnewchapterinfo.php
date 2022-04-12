<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['id'];
$type = $_POST['type'];
$chapter = $_POST['chapter'];
$coverfile = $_POST['coverfile'];
$cartoonfile = $_POST['cartoonFile'];
$orderid = $_POST['orderid'];
$db->insert("chapter", [
"bookid"=>$id,
"type"=>$type,
"chapter"=>$chapter,
"coverfile"=>$coverfile,
"cartoonfile"=>$cartoonfile,
"orderid"=>$orderid
]);
$insertId = $db->id();
echo $insertId;

?>