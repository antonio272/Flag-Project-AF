<?php

require_once("base.php");

class Appointments extends Base 
{
    public function create($appointment) {

        foreach($appointment as $infoappointment) {

            $query = $this->db->prepare("
                INSERT INTO appointments
                (patient_id, specialty_id, doctor_id, datehour)
                VALUES(?, ?, ?, ?)
            ");
        
            $query->execute([ 
                $_SESSION["patient_id"],
                $infoappointment["specialty_id"],
                $infoappointment["doctor_id"],
                $infoappointment["datehour"],
                
            ]);
        }

        $appointment_id = $this->db->lastInsertId();

        return $appointment_id;
        
    }

    public function getDates($doctor_id) {

        $query = $this->db->prepare("
            SELECT datehour
            FROM appointments
            WHERE doctor_id = ? and datehour >= NOW()
                
        ");

        $query->execute([ $doctor_id ]);

        return $query->fetchAll( PDO::FETCH_ASSOC );


    }

}

/*
class Appointments extends Base 
{
    public function create($appointment) {

        $appointment = $this->sanitize( $patient );

        if(
            !empty($patient["first_name"]) &&
            !empty($patient["last_name"]) &&
            !empty($patient["password"]) &&
            !empty($patient["phone"]) &&
            !empty($patient["citizencard_number"]) &&
            !empty($patient["address"]) &&
            !empty($patient["city"]) &&
            !empty($patient["postal_code"]) &&

            !empty($patient["gender"]) &&   

            mb_strlen($patient["first_name"]) > 2 &&
            mb_strlen($patient["first_name"]) <= 64 &&
            mb_strlen($patient["last_name"]) > 2 &&
            mb_strlen($patient["last_name"]) <= 64 &&
            mb_strlen($patient["password"]) >= 8 &&
            mb_strlen($patient["password"]) <= 1000 &&
            mb_strlen($patient["citizencard_number"]) <= 64 &&
            mb_strlen($patient["address"]) <= 255 &&
            mb_strlen($patient["city"]) <= 64 &&
            mb_strlen($patient["postal_code"]) <= 32 &&
        )

        foreach($appointment as $infoappointment) {

            $query = $this->db->prepare("
                INSERT INTO appointments
                (patient_id, specialty_id, doctor_id, datehour)
                VALUES(?, ?, ?, ?)
            ");
        
            $query->execute([ 
                $_SESSION["patient_id"],
                $infoappointment["specialty_id"],
                $infoappointment["doctor_id"],
                $infoappointment["datehour"],
                
            ]);
        }

        $appointment_id = $this->db->lastInsertId();

        return $appointment_id;
        
    }
}

*/
