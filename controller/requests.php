<?php
header("Content-Type: application/json");

if( isset($_GET["request"]) ) {

    if( $_GET["request"] ==="selectDatehour" &&
        isset($_GET["doctor_id"]) && 
        isset($_GET["specialty_id"])) {


        $today = strtotime(date("Y-m-d"));

        for($i = $today+(1 * 24 * 60 * 60) ; $i < $today + (30 * 24 * 60 * 60); $i = $i + (24 * 60 * 60) ) {

            $date = date("Y-m-d", $i);

            for($j = 9; $j <= 15; $j++) {

                if($j<10){
                $possible_dates[] = [
                    'id' => $date . " " . "0".$j.":00:00",
                    'value' => $date . " " . "0".$j.":00:00"
                ];
                }else{
                $possible_dates[] = [
                    'id' => $date . " " . $j.":00:00",
                    'value' => $date . " " . $j.":00:00"
                ];
                }
            }
        }
        
        require_once("../model/appointment.php");

        $doctor_id = (int)$_GET["doctor_id"];

        $modelAppointments = new Appointments;
    
        $already_scheduled = $modelAppointments->getDates($doctor_id);
        $clone_possible_dates = $possible_dates;

        foreach($already_scheduled as $value) {

            $key = array_search($value["datehour"],array_column($clone_possible_dates, 'id'));

            if($key !== FALSE) {
            
                unset($possible_dates[$key]);
        
            }
            
        }
        
        echo json_encode(array_values($possible_dates));
        
        

    }else if( $_GET["request"] ==="selectDoctors" &&
        !empty($_GET["specialty_id"]) ) {

        require("../model/doctors.php");
    
        $modelDoctors = new Doctors;
    
        $doctors = $modelDoctors->getDoctors( $_GET["specialty_id"] );

        echo json_encode($doctors);
    
            if( empty($doctors) ) {
                header("HTTP/1.1 404 Not Found");
                die("Não encontrado");
            }
        
    }else {
        header("HTTP/1.1 400 Bad Request");
        echo '{"status":"Error", "message":"Invalid request"}';
    }

}else {
    header("HTTP/1.1 400 Bad Request");
    echo '{"status":"Error", "message":"Invalid request"}';
}
