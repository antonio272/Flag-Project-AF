<?php
 

if( isset($_POST['doctor_id']) && 
    isset($_POST['specialty_id']) &&
    isset($_POST['datehour'])
    ) {

        $doctor_id = (int)$_POST['doctor_id'];
        $specialty_id = (int)$_POST['specialty_id'];
        $datehour = $_POST['datehour'];


        require_once("model/doctors.php");

        $modelDoctor = new Doctors;

        $doctor = $modelDoctor->getDoctor($doctor_id);

        $doctor_name = $doctor[0]["name"];



        
        require_once("model/specialties.php");

        $modelSpecialty = new Specialties;

        $specialty = $modelSpecialty->getSpecialty($specialty_id);

        $specialty_name = $specialty["name"];
    
 
        $_SESSION["appointment"] [] = [
            "specialty_id" => $specialty_id,
            "specialty_name" => $specialty_name,
            "doctor_id" => $doctor_id,
            "doctor_name" => $doctor_name,
            "datehour" => $datehour,        
        ];

    require("view/appointmentresume.php");


}else {require("model/specialties.php");

$modelSpecialties = new Specialties;

$specialties = $modelSpecialties->getSpecialties();

require("view/home.php");
}