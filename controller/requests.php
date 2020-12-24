<?php
header("Content-Type: application/json");

if( isset($_GET["request"]) ) {

    if( $_GET["request"] ==="selectDoctors" &&
        !empty($_GET['specialty_id']) ) {

        require("../model/doctors.php");
    
        $modelDoctors = new Doctors;
    
        $doctors = $modelDoctors->getDoctors( $_GET['specialty_id'] );

        echo json_encode($doctors);
    
            if( empty($doctors) ) {
                header("HTTP/1.1 404 Not Found");
                die("Não encontrado");
            }
        
    }else {
        header("HTTP/1.1 400 Bad Request");
        echo '{"status":"Error", "message":"Invalid request"}';
    }

}
