<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$online = $_POST["status"];
$id = $_POST['id'];
$key = $_POST['key'];
$result = $db->select("user","*",[
    'hashkey'=>$key
]);
if(sizeof($result) > 0 ){
    if($result[0]['book'] == 1){
        $db->update("book",[
            "online"=>$online
        ],[
            "bookid"=>$id
        ]);
        echo "finish";
    } else {
        echo "go to welcome";
    }
} else {
    echo "go to login";
}
