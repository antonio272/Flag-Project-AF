<?php
require_once("base.php");

class Doctors extends Base
{
    public function getAllDoctors() {

        $query = $this->db->prepare("
            SELECT doctor_id, name
            FROM doctors
                
        ");

        $query->execute();

        return $query->fetchAll( PDO::FETCH_ASSOC );

    }

    public function getDoctors($specialty_id) {

        $query = $this->db->prepare("
            SELECT d.doctor_id, d.name, s.specialty_id, s.name AS specialty
            FROM doctors d
            INNER JOIN specialties_doctors USING(doctor_id)
            INNER JOIN specialties s USING(specialty_id)
            WHERE s.specialty_id = ?
        ");

        $query->execute([ $specialty_id ]);

        return $query->fetchAll( PDO::FETCH_ASSOC );
    }

    public function getDoctor($doctor_id) {

        $query = $this->db->prepare("
            SELECT d.doctor_id, d.name, d.phone, d.education, d.residency, d.fellowship, d.image, s.name AS specialty
            FROM doctors d
            INNER JOIN specialties_doctors USING(doctor_id)
            INNER JOIN specialties s USING(specialty_id)
            WHERE d.doctor_id = ?
        ");

        $query->execute([ $doctor_id ]);

        return $query->fetchAll( PDO::FETCH_ASSOC );
    }

    
}