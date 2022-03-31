<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$key= $_POST['key'];
$title = $_POST['title'];
$category = $_POST['category'];
$synposis = $_POST['synposis'];
$folder = $_POST['folder'];
$coverfile = $_POST['coverfile'];
$bg_pc = $_POST['bg_pc'];
$bg_tablet = $_POST['bg_tablet'];
$bg_mobile = $_POST['bg_mobile'];
$result = $db->select("user","*",[
    'hashkey'=>$key
]);

if(sizeof($result) > 0){
    if($result[0]['book'] == 1){
        $db->insert("book",[
            "title"=>$title,
            "catid"=>$category,
            "synposis"=>$synposis,
            "folder"=>$folder,
            "coverfile"=>$coverfile,
            "bg_pc"=>$bg_pc,
            "bg_tablet"=>$bg_tablet,
            "bg_mobile"=>$bg_mobile
        ]);
        $insertId = $db->id();
        echo $insertId;
    } else {
        echo "go to welcome";
    }
} else {
    echo "go to login";
}



?>