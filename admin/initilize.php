<?php 

// Asign file path to PHP constant
//__FILE__ gives path of current file

define('ADMIN',dirname(__FILE__));
define('BASE_PATH',basename(ADMIN));
define('PROJECT_PATH',ADMIN);
//echo ADMIN.'<br/>';
//echo PROJECT_PATH.'<br/>';
//echo BASE_PATH.'<br/>';
//echo $_SERVER['SCRIPT_NAME'];

require_once 'database.php';
require_once 'functions.php';
require_once 'query_function.php';


$db = db_connect();
?>