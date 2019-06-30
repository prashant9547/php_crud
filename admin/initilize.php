<?php 

// Asign file path to PHP constant
//__FILE__ gives path of current file

define('ADMIN',dirname(__FILE__));
define("PROJECT_PATH", dirname(ADMIN));

// echo ADMIN.'<br/>';
// echo PROJECT_PATH.'<br/>';
// echo $public_end.'<br/>';
// echo $doc_root.'<br/>';
// echo WWW_ROOT.'<br/>';

//echo ADMIN.'<br/>';
//echo PROJECT_PATH.'<br/>';
//echo BASE_PATH.'<br/>';
//echo $_SERVER['SCRIPT_NAME'];

$public_end = strpos($_SERVER['SCRIPT_NAME'],'/public') +7;
$doc_root = substr($_SERVER['SCRIPT_NAME'],0,$public_end);
define('WWW_ROOT',$doc_root);

require_once 'database.php';
require_once 'functions.php';
require_once 'query_function.php';

$db = db_connect();
?>