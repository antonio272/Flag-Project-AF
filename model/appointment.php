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
