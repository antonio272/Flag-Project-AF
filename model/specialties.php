<?php

require("base.php");

class Specialties extends Base 
{
    public function get() {

        $query = $this->db->prepare("
            SELECT specialty_id, name
            FROM specialties
                
        ");

        $query->execute();

        return $query->fetchAll( PDO::FETCH_ASSOC );

    }


}
