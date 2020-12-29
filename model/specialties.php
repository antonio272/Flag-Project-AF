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

    /***************ADMIN***************/
    /**TO DO: *******/
    /**CRIADOS MODELS PARA USAR NAS FUNCIONALIDADES DO ADMIN PARA CREATE UPDATE DELETE SPECIALTIES***/

    public function create($newSpecialty) {

        $newSpecialty = $this->sanitize($newSpecialty);

        if(!$this->validator($newSpecialty)) {
            return false;
        }

        $query = $this->db->prepare("
            INSERT INTO specialties
            (name)
            VALUES(?)
        ");
        
        return $query->execute([
            $newSpecialty["name"]           
        ]);
    }

    public function update($id, $newSpecialty) {
        $newSpecialty = $this->sanitize($newSpecialty);

        if(!$this->validator($newSpecialty)) {
            return false;
        }

        $query = $this->db->prepare("
            UPDATE specialties
            SET name = ?
            WHERE specialty_id = ?
        ");
        
        return $query->execute([
            $newSpecialty["name"],
            $id
        ]);
    }

    public function delete($id) {
        $query = $this->db->prepare("
            DELETE FROM specialties
            WHERE specialty_id = ?
        ");

        return $query->execute([
            $id
        ]);
    }

    public function validator($newSpecialty) {
        if(
            empty($newSpecialty["name"]) ||
            mb_strlen($newSpecialty["name"]) > 64 
        ) {
            return false;
        }

        return true;
    }



}
