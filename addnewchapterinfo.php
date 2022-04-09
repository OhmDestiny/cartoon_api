<?php
require_once('connection.php');
$_POST = json_decode(file_get_contents("php://input"),true);
$id = $_POST['id'];
$type = $_POST['type'];
$chapter = $_POST['chapter'];
$coverfile = $_POST['coverfile'];
$cartoonfile = $_POST['cartoonfile'];


?>