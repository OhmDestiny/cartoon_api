<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['id'];
$key = $_POST['key'];
// $key = 'tO^wH!(2Ig@f5LN)';
// $id = '33';


$result = $db->select("user","*",[
    'hashkey'=>$key
]);


if(sizeof($result) > 0){
    if($result[0]['admin'] == 1){
        $db->delete("user",[
            "userid"=>$id
        ]);
        echo "finish";
    } else {
        echo "go to welcome";
    }
} else {
    echo "go to login";
}

?>