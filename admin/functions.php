<?php

function is_post_request(){
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function is_get_request(){
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function url_for($script_path) {
    //echo WWW_ROOT;
    if($script_path[0] != '/') {
        //echo $script_path.'that';
        echo $script_path = "/" . $script_path;
    }
    return ADMIN.$script_path;
  }


function redirect_to($url){
    $url_redi = $url.'.php';
    return header("location:$url_redi");
    die();
}