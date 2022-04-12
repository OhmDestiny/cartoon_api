<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$recordid = $_POST['recordid'];
$type = $_POST['type'];
$orderid= $_POST['orderid'];
$chapter = $_POST['chapter'];
$coverFile = $_POST['coverFile'];
$cartoonFile = $_POST['cartoonFile'];

if($coverFile == "NONE" && $cartoonFile =="NONE"){
    $db->update("chapter",[
        "type"=>$type,
        "chapter"=>$chapter,
        "orderid"=>$orderid
    ],[
        "id"=>$recordid
    ]);
} else if ($coverFile == "NONE"){
    $db->update("chapter",[
        "type"=>$type,
        "chapter"=>$chapter,
        "orderid"=>$orderid,
        "coverfile"=>$coverFile
    ],[
        "id"=>$recordid
    ]);
} else if($cartoonFile == "NONE"){
    $db->update("chapter",[
        "type"=>$type,
        "chapter"=>$chapter,
        "orderid"=>$orderid,
        "cartoonfile"=>$cartoonFile
    ],[
        "id"=>$recordid
    ]);
} else {
    $db->update("chapter",[
        "type"=>$type,
        "chapter"=>$chapter,
        "orderid"=>$orderid,
        "coverfile"=>$coverFile,
        "cartoonfile"=>$cartoonFile
    ],[
        "id"=>$recordid
    ]);
}

echo "finish";
?>