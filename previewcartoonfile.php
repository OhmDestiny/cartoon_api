<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$page = $_POST['page'];
$cartoonid  = $_POST['cartoonid'];

$result1 = $db->select("book", "*", [
    "bookid"=>$cartoonid
]);
$folder = $result1[0]['folder'];
$pathfile = "cartoon/" . $folder . "/" . $page ."/book";

function getDirContents($dir, &$results = array()) {
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $results[] = $value;
        } else if ($value != "." && $value != "..") {
            getDirContents($path, $results);
            $results[] = $value;
        }
    }

    return $results;
}
echo json_encode(getDirContents($pathfile));

?>