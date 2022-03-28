<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$key = $_POST['key'];
$result = $db->select("user",['userid','username','book','category','rank','ads','admin'],[
    'hashkey'=>$key
]);
if(sizeof($result) > 0){
    echo json_encode($result);
} else {
    echo "go to login";
}
?>