<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$username = $_POST['username'];
$password = $_POST['password'];


$result = $db->select("user",'*',[
    "username" => $username,
    "password" =>$password 
]);

if(sizeof($result)> 0){
    $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789!@#$%^&*()'); // and any other characters
    shuffle($seed); // probably optional since array_is randomized; this may be redundant
    $rand = '';
    foreach (array_rand($seed, 16) as $k) $rand .= $seed[$k];
    $db->update("user",[
        "hashkey"=>$rand
    ], [
        "userid"=>$result[0]['userid']
    ]);
   echo $rand;
} else {
    echo "not pass";
}


?>