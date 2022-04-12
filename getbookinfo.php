<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['cartoonid'];
$key= $_POST['key'];
$result = $db->select("user","*",[
    'hashkey'=>$key
]);
if(sizeof($result) > 0){
    if($result[0]['book'] == 1){
        $result =$db->select("book","*",  ['bookid' => $id]);
        
        echo json_encode($result);
        } else {
        echo "go to welcome";

    }
} else {
    echo "go to login";
}
?>