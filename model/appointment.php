<?php

require("base.php");

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
}
