<?php

function classLoader($c){
    $classPath = __SRC.DS.$c.".php";
    if(is_file($classPath)){
        require $classPath;
    }
}

spl_autoload_register("classLoader");