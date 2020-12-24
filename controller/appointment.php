<?php

$appointment_count = 0;

if(!isset($_SESSION["appointment"])){ 

    $appointment_count = count($_SESSION["appointment"]);

    require("view/appointmentresume.php");

}else if(!isset($appointment_count)){


    require("view/appointmentresume.php");


}else{
    header("HTTP/1.1 404 Not Found");
    die("Ainda não efectuou qualquer marcação");

}