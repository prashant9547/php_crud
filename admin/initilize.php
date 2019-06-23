<?php 
require 'database.php';
// Asign file path to PHP constant
//__FILE__ gives path of current file

define('ADMIN',dirname(__FILE__).'/include');
define('BASE_PATH',basename(ADMIN).'/css.php');
define('PROJECT_PATH',ADMIN);
echo ADMIN.'<br/>';
echo PROJECT_PATH.'<br/>';
echo BASE_PATH.'<br/>';
echo $_SERVER['SCRIPT_NAME'];
//$db = db_connect();