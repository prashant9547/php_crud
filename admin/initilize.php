<?php 

getcwd(); //                            /opt/lampp/htdocs/php_crud/admin
dirname(__FILE__); //                  /opt/lampp/htdocs/php_crud/admin
dirname(__DIR__); //                  /opt/lampp/htdocs/php_crud
$_SERVER['SCRIPT_NAME'];//           /php_crud/admin/index.php
$_SERVER['PHP_SELF']; //            /php_crud/admin/index.php
dirname($_SERVER['PHP_SELF']); // /php_crud/admin
basename(dirname(__FILE__));  //   admin
//echo $_SERVER['HTTP_HOST']; //    localhost

define("ADMIN", dirname(__FILE__)); //  localhost/opt/lampp/htdocs/php_crud/admin
//echo ADMIN.'<br/>'; 
define("INCLUDE_FILE", dirname(__FILE__).'/include');
  
define("PROJECT_PATH", dirname(ADMIN)); // /opt/lampp/htdocs/php_crud
//echo PROJECT_PATH.'<br/>';
//define("PUBLIC_PATH", PROJECT_PATH . '/public');
  
define("ABOUT_PATH", ADMIN); // /opt/lampp/htdocs/php_crud/admin/about
//echo ABOUT_PATH.'<br/>';
//exit;

  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 9; // 7
  //echo $public_end.'<br/>';
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end); //  /php_cr
  //echo $doc_root.'<br/>';
  define("WWW_ROOT", $doc_root); //   /php_cr
  //echo WWW_ROOT.'<br/>';
  //exit;
  // echo $_SERVER['DOCUMENT_ROOT'];
  // exit;

require_once 'database.php';
require_once 'functions.php';
require_once 'query_function.php';

$db = db_connect();
?>