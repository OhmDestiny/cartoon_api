<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$title = $_POST['title'];
$category = $_POST['category'];
$synposis = $_POST['synposis'];
$folder = $_POST['folder'];
$coverfile = $_POST['coverfile'];
$bg_pc = $_POST['bg_pc'];
$bg_tablet = $_POST['bg_tablet'];
$bg_mobile = $_POST['bg_mobile'];

$db->insert("book",[
    "title"=>$title,
    "catid"=>$category,
    "synposis"=>$synposis,
    "folder"=>$folder,
    "coverfile"=>$coverfile,
    "bg_pc"=>$bg_pc,
    "bg_tablet"=>$bg_tablet,
    "bg_mobile"=>$bg_mobile
]);
$insertId = $db->id();
echo $insertId;
?>