<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$key= $_POST['key'];
$title = $_POST['title'];
$category = $_POST['category'];
$synposis = $_POST['synposis'];
$folder = $_POST['folder'];
$coverfile = $_POST['coverfile'];

$result = $db->select("user","*",[
    'hashkey'=>$key
]);

if(sizeof($result) > 0){
    if($result[0]['book'] == 1){
        //make folder
        //check exist folder
  
            $filename = "cartoon/" . $folder;

            if (!file_exists($filename)) {
                mkdir("cartoon/" . $folder, 0777);
                $db->insert("book",[
                    "title"=>$title,
                    "catid"=>$category,
                    "synopsis"=>$synposis,
                    "folder"=>$folder,
                    "coverfile"=>$coverfile,
        
                ]);
                $insertId = $db->id();
                echo $insertId;
        
            } else {
                echo "The directory exists.";
            }
       
    } else {
        echo "go to welcome";
    }
} else {
    echo "go to login";
}



?>