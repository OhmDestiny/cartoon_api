<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$password = $_POST["password"];
$key = $_POST['key'];
// $key = asdasdasd;
// $password = 1234;
// $result = $db->select("user","*",[
//     'hashkey'=>$key,
// ]);
$result2 = $db->select("user","*",[
    'password' => $password,
]);


// if(sizeof($result) > 0 ){
    if(sizeof($result2)){
        echo "yes";
    } else {
        echo "no";
    }
// } else {
//     echo "go to welcome";
// }
// ?>