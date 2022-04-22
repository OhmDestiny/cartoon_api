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
        $result1 = $db->select("chapter","*",[
            "id"=>$page
        ]);
        $result2 = $db->select("book","*",[
            "bookid"=>$cartoonid
        ]);
        // print_r($result2);
        $result[0]['title'] =$result2[0]['title'];
        $result[0]['name'] = $result1[0]['chapter'];
        $result[0]['folder'] = $result2[0]['folder'];
        echo json_encode($result);
        
    } else {
        echo "go to welcome";

    }
} else {
    echo "go to login";
}


?>