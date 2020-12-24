<?php

if( !isset($_SESSION["patient_id"]) ) {
    header("Location: " .BASE_PATH. "access/login");
    exit;
}

if(!empty($_SESSION["appointment"])) {

    require("model/appointment.php");

    $modelAppointments = new Appointments;

    $appointment_id = $modelAppointments->create( $_SESSION["appointment"] );


    if(!empty( $appointment_id)) {

        unset($_SESSION["appointment"]);

        $message = 'Your appointment ' .$appointment_id. ' was successful. Please be sure to arrive at least 10 minutes early. 
        If you have any questions, please contact us.';

    }
    else {
        $message = "An error has occurred";
    }

}
else {
    $message = "You haven't made any appointments yet";
    //header("Location: " .BASE_PATH. "appointment");
    exit;
}

require("view/confirmation.php");