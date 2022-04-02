<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$key = $_POST['key'];
$profileid = $_POST['profileid'];
$result = $db->select("user","*",[
    'hashkey'=>$key
]);
if(sizeof($result) > 0){
    $id = $result[0]['userid'];
    $db->update('user',[
        'profilepic'=>$profileid
    ],[
        'userid'=>$id
    ]);
} else {
    echo "go to login";
}
?>