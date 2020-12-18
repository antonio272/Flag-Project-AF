<?php
require("base.php");

class Doctors extends Base
{
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

    
}