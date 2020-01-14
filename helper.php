<?php

function dump(){
    foreach(func_get_args() as $arg){
        echo "<pre>";
        var_dump($arg);
        echo "</pre>";
    }
}
function encode_dump(){
    foreach(func_get_args() as $arg){
        echo "<pre>";
        var_dump(htmlentities($arg));
        echo "</pre>";
    }
}
function dd(){
    call_user_func_array("dump", func_get_args());
    exit;
}

function user(){
    return isset($_SESSION['user']) ? $_SESSION['user'] : null;
}


function back($message = ""){
    echo "<script>";
    if($message !== "") echo "alert('$message');";
    echo "history.back();";
    echo "</script>";
}

function go($url, $message = ""){
    echo "<script>";
    if($message !== "") echo "alert('$message');";
    echo "location.href='$url';";
    echo "</script>";
}

function view($view_path, $data = []){
    extract($data);
    

    require __VIEW.DS."template/header.php";
    require __VIEW.DS.$view_path.".php";
    require __VIEW.DS."template/footer.php";
}


function emptyCheck(){
    foreach($_POST as $item){
        if(trim($item) === ""){
            back("모든 정보를 기입해 주십시오.");
            exit;
        }
    }
}