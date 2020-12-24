<?php
header("Content-Type: text/plain; charset=utf-8");
$str = base64_encode(file_get_contents("images/doc1.jpg"));
$str = base64_encode(file_get_contents("images/doc2.jpg"));
$str = base64_encode(file_get_contents("images/doc3.jpg"));
$str = base64_encode(file_get_contents("images/doc4.jpg"));
$str = base64_encode(file_get_contents("images/doc5.jpg"));

echo $str;