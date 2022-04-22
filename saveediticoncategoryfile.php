<?php
require_once('connection.php');
$id =$_POST['id'];
$targetcover = "icon/" . $id. '.svg';
unlink($targetcover);
move_uploaded_file($_FILES['filecoverfile']['tmp_name'],$targetcover);

?>