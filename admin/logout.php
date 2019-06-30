<?php 
require_once 'initilize.php';

session_start();
if(isset($_SESSION['adminEmail'])){
    unset($_SESSION['adminEmail']);  
        session_destroy(); 
        redirect_to('login');
}