<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$key = $_POST['key'];
$cartoonid = $_POST['pageid'];
$result = $db->select("user","*",[
    'hashkey'=>$key
]);
if(sizeof($result) > 0){
    if($result[0]['book'] == 1){
        $result2 = $db->select("chapter","*",[
            "bookid"=>$cartoonid
        ]);
        echo json_encode($result2);
    } else {
        echo "go to welcome";
    }
} else {
    echo "go to login";
}
?>