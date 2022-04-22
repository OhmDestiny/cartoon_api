<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$page = $_POST['page'];
$cartoonid  = $_POST['cartoonid'];
$key = $_POST['key'];
$result = $db->select("user","*",[
    'hashkey'=>$key
]);
if(sizeof($result) > 0){
    if($result[0]['book'] == 1){
     echo "pass";
    } else {
        echo "go to welcome";

    }
} else {
    echo "go to login";
}


?>