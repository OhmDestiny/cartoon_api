<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$key= $_POST['key'];
$page = $_POST['page'];
$cat = $_POST['cat'];
// $itemperpage = 10;
$offsetData = ($page-1)*$itemperpage;
$searchText = $_POST['searchText'];
$result = $db->select("user","*",[
    'hashkey'=>$key
]);

if(sizeof($result) > 0){
    if($result[0]['book'] == 1){
        if($searchText == ''){
            if($cat == 0 ){
                $sql = "select * from book  limit " .$itemperpage . " offset " . $offsetData;
            } else {
                $sql = "select * from book where catid like '%[" . $cat . "]%'  limit " .$itemperpage . " offset " . $offsetData; 
            }
        } else {
            if($cat == 0 ){
                $sql = "select * from book where  title like '%" . $searchText .
                "%' limit " . $itemperpage  . " offset " . $offsetData;
            // echo $sql;
            } else {
                $sql = "select * from book where catid like '%[" . $cat . "]%' and   title like '%" . $searchText . "%' limit " . $itemperpage . " offset " . $offsetData; 
            }
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