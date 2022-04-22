<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$book01id = $_POST['book01id'];
$book02id = $_POST['book02id'];
$book03id = $_POST['book03id'];
$book04id = $_POST['book04id'];
$book05id = $_POST['book05id'];
$book06id = $_POST['book06id'];
$book07id = $_POST['book07id'];
$book08id = $_POST['book08id'];
$book09id = $_POST['book09id'];
$book10id = $_POST['book10id'];
$date = date('d/m/Y H:i:s', time());
$db->update("rank",[
    "book01id"=>$book01id,
    "book02id"=>$book02id,
    "book03id"=>$book03id,
    "book04id"=>$book04id,
    "book05id"=>$book05id,
    "book06id"=>$book06id,
    "book07id"=>$book07id,
    "book08id"=>$book08id,
    "book09id"=>$book09id,
    "book10id"=>$book10id,
    "timestamp"=>$date
],[
    "id"=>1
])
?>