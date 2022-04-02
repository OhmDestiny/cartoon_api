<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$password = $_POST["password"];
$newpassword = $_POST['newpassword'];
$key = $_POST['key'];

$result = $db->select("user","*",[
    'hashkey'=>$key,
]);

if(sizeof($result) > 0){
    $userid = $result[0]['userid'];
    if($password != $result[0]['password']){
        echo "old password incorrect";
    } else {
        $db->update("user",[
            "password"=>$newpassword
        ],[
            'hashkey'=>$key
        ]);
    }
} else {
    echo "go to login";
}
 ?>