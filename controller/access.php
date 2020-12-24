<?php
$actions = ["login", "logout", "register"];

if( empty($action) || !in_array($action, $actions) ) {
    header("HTTP/1.1 400 Bad Request");
    die("Bad Request");
}

$action = $action;

if( $action === "logout") {
    session_destroy();

    header("Location: " .BASE_PATH);
    exit;
}

require("model/patients.php");
$modelPatients = new Patients;


if( isset($_POST["send"]) ) {

    if($action === "register") {

        $result = $modelPatients->create( $_POST );

        if($result) {

            header("Location: " .BASE_PATH. "access/login");

            
        }
        else {
            $message = "Fill in all fields correctly";
        }
    }
    elseif($action === "login") {

        $patient = $modelPatients->login( $_POST );

        if( !empty($patient) ) {
            $_SESSION["patient_id"] = $patient["patient_id"];
                header("Location: " .BASE_PATH. "booking");
        }
        else {
            $message = "Incorrect email or password. Try again.";
        }
    }

}

require("view/" .$action. ".php");