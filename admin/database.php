<?php 

require_once 'db_credential.php';

function db_connect(){
    $connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    confrim_db_connect($connection);
    return $connection;
}

function confrim_db_connect($connection){
    if(!$connection){
        $msg = "Connection is failed : ";
        $msg .= mysqli_connect_error();
        $msg .= mysqli_connect_errno();
        exit($msg);
    }
     else{
        echo $msg = "Connection is ready to use";
        // exit($msg);
    }
}


