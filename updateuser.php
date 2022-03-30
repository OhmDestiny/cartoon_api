<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$password = $_POST['password'];
$book = $_POST['book'];
$category = $_POST['category'];
$rank = $_POST['rank'];
$ads = $_POST['ads'];
$admin = $_POST['admin'];
$key = $_POST['key'];
$id = $_POST['id'];

// $password = '112233445566';
// $book = 1;
// $category = 1;
// $rank = 1;
// $ads = 1;
// $admin = 1;
// $key = 'S(v4ONLjw0gI&sT^';
// $id = 34;

$result = $db->select("user","*",[
    'hashkey'=>$key
]);


if(sizeof($result) > 0){
    if($result[0]['admin'] == 1){
        $db->update("user",[
        'password'=> $password,
        'book'=> $book,
        'category'=> $category,
        'rank'=> $rank,
        'ads'=> $ads,
        'admin'=> $admin],[

            "userid"=>$id
        ]);
    echo  "update complete";
    } else {
     echo "go to welcome";
    }
} else {
    echo "go to login";
}
?>