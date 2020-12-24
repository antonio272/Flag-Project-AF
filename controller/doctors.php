<?php

require_once("model/doctors.php");

if( isset($_GET['doctor_id']) ) {

    $doctor_id = (int)$_GET['doctor_id'];

    $modelDoctor = new Doctors;

    $doctor = $modelDoctor->getDoctor($doctor_id);

    require("view/doctorsinfo.php");

}else {
    
    $modelDoctors = new Doctors;

    $doctors = $modelDoctors->getAllDoctors();

    require("view/doctors.php");

}
