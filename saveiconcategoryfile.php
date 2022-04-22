<?php
require_once('connection.php');
$id =$_POST['id'];
$targetcover = "icon/" . $id. '.svg';
move_uploaded_file($_FILES['filecoverfile']['tmp_name'],$targetcover);

?>