<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$key= $_POST['key'];
$title = $_POST['title'];
$category = $_POST['category'];
$synopsis = $_POST['synopsis'];
$folder = $_POST['folder'];
$coverfile = $_POST['coverfile'];
$newfile = $_POST['newfile'];
$oldfolder= $_POST['oldfolder'];
$id=$_POST['id'];
$result = $db->select("user","*",[
    'hashkey'=>$key
]);

if(sizeof($result) > 0){
    if($result[0]['book'] == 1){
        //make folder
        //check exist folder
            if($newfile == true){           
                unlink("cover/" . $id . ".jpg" );    
            }
               
            rename("cartoon/" . $oldfolder,"cartoon/". $folder);
           
                $db->update("book",[
                    "title"=>$title,
                    "catid"=>$category,
                    "synopsis"=>$synopsis,
                    "folder"=>$folder,
                    "coverfile"=>$coverfile,
                ],[
                    "bookid"=>$id
                ]);
               
            
       
    } else {
        echo "go to welcome";
    }
} else {
    echo "go to login";
}



?>