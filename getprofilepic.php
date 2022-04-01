<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$key = $_POST['key'];
$result = $db->select("user",["username","profilepic"],[
    'hashkey'=>$key
]);
if(sizeof($result) == 0 ){
    echo "go to login";
}
echo json_encode ($result);
?>