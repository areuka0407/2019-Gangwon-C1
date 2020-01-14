<?php
namespace App;

use Controller\MainController;

class Route {
    static $get = [];
    static $post = [];

    static function get($url, $action, $permission = null){
        self::$get[] = new Action($url, $action, $permission);
    }
    static function post($url, $action, $permission = null){
        self::$post[] = new Action($url, $action, $permission);
    }

    static function takeURL(){
        $url = isset($_GET['url']) ? rtrim($_GET['url']) : "";
        $url = filter_var($url, FILTER_SANITIZE_URL);
        return "/".$url;
    }

    static function redirect(){
        $current_url = self::takeURL();
        $http_method = strtolower($_SERVER['REQUEST_METHOD']);
        foreach(self::${$http_method} as $action){
            if($action->check($current_url)){
                $action->execute();
                exit;
            }
        }
        MainController::notFound();
    }
}