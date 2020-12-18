<?php

if(!empty($action) ) {

    require("model/doctors.php");

    $modelDoctors = new Doctors;

    $doctors = $modelDoctors->getDoctors( $action );

        if( empty($doctors) ) {
            header("HTTP/1.1 404 Not Found");
            die("Não encontrado");
        }

    require("view/doctors.php");

}else {require("model/specialties.php");

$modelSpecialties = new Specialties;

$specialties = $modelSpecialties->get();

require("view/specialties.php");
}
 
