<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['id'];
$key= $_POST['key'];
$result = $db->select("user","*",[
    'hashkey'=>$key
]);

if(sizeof($result) > 0){
    if($result[0]['category'] == 1){
        $db->delete("category",
            ['catid' => $id]
        );
        unlink("icon/" . $id . '.svg');
    } else {
        echo "go to welcome";

    }
} else {
    echo "go to login";
}

?>