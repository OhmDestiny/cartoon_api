<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$page = $_POST['page'];
$cat = $_POST['cat'];
// $itemperpage = 10;

$searchText = $_POST['searchText'];
if($searchText == ''){
    if($cat == 0 ){
        $sql = "select * from book  " ;
    } else {
        $sql = "select * from book where catid like '%[" . $cat . "]%'"; 
    }
} else {
    if($cat == 0 ){
        $sql = "select * from book where  title like '%" . $searchText ;
    // echo $sql;
    } else {
        $sql = "select * from book where catid like '%[" . $cat . "]%' and   title like '%" . $searchText . "%'"; 
    }
}

$result = $db->query($sql)->fetchAll();
$pageTotal = ceil(sizeof($result)/$itemperpage);
echo $pageTotal;
?>