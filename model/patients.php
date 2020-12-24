<?php
require("base.php");

class Patients extends Base
{ 
    
    public function create( $patient ) {

        $patient = $this->sanitize( $patient );

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
            

            filter_var($patient["email"], FILTER_VALIDATE_EMAIL) &&
            $patient["password"] === $patient["rep_password"] 
        ) {

            $query = $this->db->prepare("
                INSERT INTO patients
                (first_name, last_name, email, password, phone, citizencard_number, address, city, postal_code, birth_date, gender)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

            return $query->execute([
                $patient["first_name"],
                $patient["last_name"],
                $patient["email"],
                password_hash($patient["password"], PASSWORD_DEFAULT),
                $patient["phone"],
                $patient["citizencard_number"],
                $patient["address"],
                $patient["city"],
                $patient["postal_code"],
                $patient["birth_date"],
                $patient["gender"]
            ]);
        }

        return false;
    }

    public function login( $patient ) {

        $patient = $this->sanitize( $patient );

        if(
            filter_var($patient["email"], FILTER_VALIDATE_EMAIL) &&
            mb_strlen($patient["password"]) >= 8 &&
            mb_strlen($patient["password"]) <= 1000
        ) {
            $query = $this->db->prepare("
                SELECT patient_id, password
                FROM patients
                WHERE email = ?
            ");

            $query->execute([ $patient["email"] ]);

            $existingPatient = $query->fetch( PDO::FETCH_ASSOC );

            if(
                !empty($existingPatient) &&
                password_verify($patient["password"], $existingPatient["password"])
            ) {
                return $existingPatient;
            }
        }

        return false;
    }
}
