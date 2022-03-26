<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header('Content-Type: application/json');


date_default_timezone_set("Asia/Bangkok");



// If you installed via composer, just use this code to require autoloader on the top of your projects.
// require 'vendor/autoload.php';
require("Medoo.php");
 
// Using Medoo namespace
use Medoo\Medoo;
 


$db = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'toontoon',
	'server' => 'localhost',
	'port'=>3306,
	'username' => 'root',
	'password' => '12345678',
	"charset" => "utf8",
]);

?>