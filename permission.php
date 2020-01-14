<?php
function guestCheck(){
    if(user()){
        back("로그인 후엔 이용하실 수 없습니다.");
        exit;
    }
    else return true;
}

function userCheck(){
    if(!user()){
        go("/users/login", "로그인 후 이용하실 수 있습니다.");
        exit;
    }
    else return true;
}

function adminCheck(){
    if(!user() || user()->user_id !== "admin"){
        go("/", "접근할 권한이 없습니다.");
        exit;
    }
    else return true;
}