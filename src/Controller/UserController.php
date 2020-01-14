<?php
namespace Controller;

use App\DB;

class UserController {
    function __construct(){
        $admin = DB::fetch("SELECT * FROM users WHERE user_id = ?", ["admin"]);
        if(!$admin){
            DB::query("INSERT INTO users(user_id, password, user_name, user_type) VALUES (?, ?, ?, ?)", ["admin", hash("sha256", "1234"), "관리자", "normal"]);
        }
    }

    function login(){
        view("user-login");
    }

    function act_login(){
        emptyCheck();
        extract($_POST);

        $find = DB::fetch("SELECT * FROM users WHERE user_id = ?", [$user_id]);
        if(!$find) return back("회원 정보와 일치하는 유저를 찾을 수 없습니다.");
        if($find->password !== hash("sha256", $password)) return back("비밀번호가 일치하지 않습니다.");

        $_SESSION['user'] = $find;
        return go("/", "로그인 되었습니다.");
    }

    function join(){
        view("user-join");
    }

    function act_join(){
        emptyCheck();
        extract($_POST);

        if(!preg_match("/[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]{2,4}/", $user_id)) return back("아이디는 이메일 형식이여야 합니다.");
        else if(mb_strlen($password) < 4) return back("비밀번호는 4자리 이상이여야 합니다.");
        else if($password !== $passconf) return back("비밀번호가 서로 일치하지 않습니다.");
        else {
            $password = hash("sha256", $password);
            DB::query("INSERT INTO users(user_id, password, user_name, user_type) VALUES (?, ?, ?, ?)", [$user_id, $password, $user_name, $user_type]);
            go("/users/login", "회원가입이 완료되었습니다.");
        }
    }

    function act_logout(){
        unset($_SESSION['user']);
        
        go("/", "로그아웃 되었습니다.");
    }
}