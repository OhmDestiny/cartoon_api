<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['id'];
$key= $_POST['key'];
$result = $db->select("user","*",[
    'hashkey'=>$key
]);
if(sizeof($result) > 0){
    if($result[0]['book'] == 1){
        $result =$db->select("book","*",  ['bookid' => $id]);
        
        $db->delete("book",
            ['bookid' => $id]
        );

        //delete Cover
        unlink("cover/" . $id . '.jpg');
        $dirname = 'cartoon/' . $result[0]['folder'];
        array_map('unlink', glob("$dirname/*.*"));
        rmdir($dirname);
        } else {
        echo "go to welcome";

    }
} else {
    echo "go to login";
}

?>