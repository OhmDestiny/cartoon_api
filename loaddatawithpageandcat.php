<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$key= $_POST['key'];
$page = $_POST['page'];
$cat = $_POST['cat'];
$offsetData = ($page-1)*10;
$result = $db->select("user","*",[
    'hashkey'=>$key
]);

if(sizeof($result) > 0){
    if($result[0]['book'] == 1){
       if($cat == 0 ){
        $sql = "select * from book limit 40 offset " . $offsetData;
       } else {
        $sql = "select * from book where catid like '%[" . $cat . "]%'  limit 40 offset " . $offsetData; 
       }
       $result = $db->query($sql)->fetchAll();
       echo json_encode($result);
    } else {
        echo "go to welcome";
    }
} else {
    echo "go to login";
}



?>