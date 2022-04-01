<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$key = $_POST['key'];

$key = asdasdasd;

$result = $db->select("user","*",[
    'hashkey'=>$key
]);
if(sizeof($result) > 0){
    $result2 = $db->select("user","*");
    echo json_encode($result2);

}else {
    echo "go to login";
}
?>