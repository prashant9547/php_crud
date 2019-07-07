<?php 
require_once 'initilize.php';
session_start();
if(isset($_SESSION['adminEmail'])){
    unset($_SESSION['adminEmail']);  
        session_destroy(); 
        header('location:'.WWW_ROOT.'/admin/login.php');
        die();
}