<?php

header("Content-Type: image/png");

  session_start();

  $image = imagecreate(130, 60);

  imagecolorallocate($image, 220, 220, 220);

  $black = imagecolorallocate($image, 0, 0, 0);

  $text = bin2hex(random_bytes(4));

  $_SESSION["captcha"] = $text;

  imagettftext($image, 20, 0, 15, 40, $black, __DIR__."/H.H. Samuel-font-defharo.ttf", $text);

  imagepng($image);