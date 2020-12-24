<?php

require_once("base.php");

class Specialties extends Base 
{
    public function getSpecialties() {

        $query = $this->db->prepare("
            SELECT specialty_id, name
            FROM specialties
                
        ");

        $query->execute();

        return $query->fetchAll( PDO::FETCH_ASSOC );

    }

    

    public function getSpecialty($specialty_id) {

        $query = $this->db->prepare("
            SELECT *
            FROM specialties
            WHERE specialty_id=?
                
        ");

        $query->execute([ $specialty_id ]);

        return $query->fetch( PDO::FETCH_ASSOC );

    }
    


}
