<?php
session_start();

/**
 * Define
 */
define("DS", DIRECTORY_SEPARATOR);
define("__ROOT", dirname(__DIR__));
define("__SRC", __ROOT.DS."src");
define("__VIEW", __SRC.DS."View");
define("__PUBLIC", __ROOT.DS."public");

/**
 * Require
 */

 require __ROOT.DS."autoload.php";
 require __ROOT.DS."helper.php";
 require __ROOT.DS."permission.php";
 require __ROOT.DS."web.php";