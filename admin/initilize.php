<?php 

// Asign file path to PHP constant
//__FILE__ gives path of current file

//dirname(__DIR__); // it gives  /opt/lampp/htdocs/php_crud
$sss = dirname(__FILE__); // it gives   /opt/lampp/htdocs/php_crud/admin
define('DDD',$sss);
//$_SERVER['SCRIPT_NAME']; //it gives   /php_crud/admin/index.php
//basename(__DIR__); // it gives   admin
//basename(__FILE__); //it gives   initilize.php


$admin_path = strpos($_SERVER['SCRIPT_NAME'],'/admin') + 6;
$admin_root = substr($_SERVER['SCRIPT_NAME'],0,$admin_path);
define('ADMIN',$admin_root);


$project_path = strpos($_SERVER['SCRIPT_NAME'],'/php_crud') +10;
$doc_root = substr($_SERVER['SCRIPT_NAME'],0,$project_path);
define('WWW_ROOT',$doc_root);


require_once 'database.php';
require_once 'functions.php';
require_once 'query_function.php';

$db = db_connect();
?>