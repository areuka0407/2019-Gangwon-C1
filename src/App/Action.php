<?php
namespace App;

class Action {
    function __construct($url, $action, $permission = null){
        $split = explode("@", $action);
        $this->conName = "Controller\\{$split[0]}";
        $this->method = $split[1];
        $this->url = $url;
        $this->permission = $permission ? strtolower($permission)."Check" : null;
        $this->matches = [];
    }


    function check($current_url){
        $regexr = preg_replace("/{([^\\/]+)}/", "(?<$1>[^/]+)", $this->url);
        $regexr = preg_replace("/\\//", "\\/", $regexr);
        $result = preg_match("/^{$regexr}$/", $current_url, $this->matches);
        if($this->permission !== null && $result) call_user_func($this->permission);
        return $result;
            
    }

    function execute(){
        $controller = new $this->conName();
        $reflection = new \ReflectionMethod($controller, $this->method);
        $params = $reflection->getParameters();
        $args = [];
        foreach($params as $param){
            $paramName = $param->getName();
            if(isset($this->matches[$paramName])) $args[] = $this->matches[$paramName];
            else $args[] = null;
        }
        call_user_func_array([$controller, $this->method], $args);
    }
    
}