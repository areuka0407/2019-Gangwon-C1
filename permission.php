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

function companyCheck(){
    if(!user() || user()->user_type !== "company"){
        back("기업 회원만 이용할 수 있는 페이지 입니다.");
        exit;
    }
    else return true;
}