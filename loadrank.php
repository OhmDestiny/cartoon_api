<?php
require_once('connection.php');
$result = $db->select("rank","*");
echo json_encode($result);
?>