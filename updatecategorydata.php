<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$online = $_POST["online"];
$catid = $_POST["catid"];
$key = $_POST["key"];

// $key = "vj7Yr9Befkla#ZEC";
// $catid="1";
// $online = 1;

$result = $db->select("user","*",[
    'hashkey'=>$key
]);

if(sizeof($result)>0){
    if($result[0]['category'] == 1){
       if($online == 0){
           $toggleupdate = 1;
       } else {
           $toggleupdate = 0;
       }
       if($toggleupdate == 1 ) {
           echo "online";
       } else if ($toggleupdate == 0) {
           echo "offline";
       }
    } else {
        echo "go to welcome";
    }
} else {
    echo "go to login";
}

$db ->update ("category",[
 "online" => $toggleupdate,
],[
    "catid"=>$catid,
]);

?>