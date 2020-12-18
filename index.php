<?php
session_start();

define("BASE_PATH", dirname($_SERVER["SCRIPT_NAME"]) . "/" );

$url_parts = explode("/", $_SERVER["REQUEST_URI"]);

echo "<pre>";
print_r($url_parts);
exit;