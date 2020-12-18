<?php
session_start();

define("BASE_PATH", "/" );

$url_parts = explode("/", $_SERVER["REQUEST_URI"]);


$controllers = [
    "home"
    
];

/* default */
$controller = "home";

if( !empty($url_parts[1]) ) {

    if( !in_array($url_parts[1], $controllers) ) {
        header("HTTP/1.1 404 Not Found");
        die("404 Not Found");
    }
    
    $controller = $url_parts[1];
}


require("controller/" .$controller. ".php");

