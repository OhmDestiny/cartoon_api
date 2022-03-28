<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$username = $_POST['username'];
$password = $_POST['password'];
$book = $_POST['book'];
$category = $_POST['category'];
$rank = $_POST['rank'];
$ads = $_POST['ads'];
$admin = $_POST['admin'];
$key= $_POST['key'];

// $key = 'yDnYScBQvi34Zb@k';
// $username = 'test6';
// $password = '12345566';


$result = $db->select("user","*",[
    'hashkey'=>$key
]);


if(sizeof($result) > 0){
    if($result[0]['admin'] == 1){
        $db->insert("user",[
        'username'=> $username,
        'password'=> $password,
        'book'=> $book,
        'category'=> $category,
        'rank'=> $rank,
        'ads'=> $ads,
        'admin'=> $admin]);
    echo  "add complete";
    } else {
     echo "go to welcome";
    }
} else {
    echo "go to login";
}

?>