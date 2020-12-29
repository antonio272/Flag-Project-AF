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

    /***************ADMIN***************/
    /**TO DO: *******/
    /**CRIADOS MODELS PARA USAR NAS FUNCIONALIDADES DO ADMIN PARA CREATE UPDATE DELETE DOCTORS***/

    public function create($newDoctor) {
            
        $newDoctor = $this->sanitize($newDoctor);

        if( !$this->validator($newDoctor) ) {
            return false;
        }

        $imageName = $this->uploadBase64Image( $newDoctor["image"] ?? "" );

        $query = $this->db->prepare("
            INSERT INTO doctors
            (name, education, residency, fellowship, image, phone, email)
            VALUES(?, ?, ?, ?, ?, ?, ?)
        ");

        return $query->execute([
            $newDoctor["name"],
            $newDoctor["education"],
            $newDoctor["residency"],
            $newDoctor["fellowship"],
            $imageName,
            $newDoctor["phone"],
            $newDoctor["email"]
        ]);
    }

    public function update($id, $newDoctor) {
        $newDoctor = $this->sanitize($newDoctor);

        if(!$this->validator($newDoctor)) {
            return false;
        }

        $imageName = $this->uploadBase64Image( $newDoctor["image"] ?? "" );

        $query = $this->db->prepare("
            UPDATE
                doctors 
            SET
                name = ?,
                education = ?,
                residency = ?,
                fellowship = ?,    
                image = (CASE WHEN ? <> '' THEN ? ELSE image END),
                phone = ?,
                email = ?
            WHERE
                doctor_id = ?
        ");

        return $query->execute([
            $newDoctor["name"],
            $newDoctor["education"],
            $newDoctor["residency"],
            $newDoctor["fellowship"],
            $imageName,
            $imageName,
            $newDoctor["phone"],
            $newDoctor["email"],
            $id
        ]);
    }

    public function delete($id) {
        $query = $this->db->prepare("
            DELETE FROM doctors
            WHERE doctor_id = ?
        ");
        
        return $query->execute([
            $id
        ]);
    }

    public function validator($newDoctor) {
        if(
            empty($newDoctor["name"]) ||
            empty($newDoctor["education"]) ||
            empty($newDoctor["residency"]) ||
            empty($newDoctor["fellowship"]) ||
            empty($newDoctor["phone"]) ||
            empty($newDoctor["email"]) ||
            mb_strlen($newDoctor["name"]) > 128 ||
            mb_strlen($newDoctor["education"]) > 65535 ||
            mb_strlen($newDoctor["residency"]) > 65535 ||
            mb_strlen($newDoctor["fellowship"]) > 65535 ||
            mb_strlen($newDoctor["phone"]) > 252 

            
        ) {
            return false;
        }

        return true;
    }

    public function uploadBase64Image($image) {
        
        if( empty($image) || empty(base64_decode($image)) ) {
            return "";
        }

        // desconverter de texto para binário
        $imageData = base64_decode($image);

        // definir localização e nome para guardar
        $imageName = bin2hex(random_bytes(32)) . ".jpg";
        $imagePath = rtrim($_SERVER['DOCUMENT_ROOT'], "/") . dirname($_SERVER["SCRIPT_NAME"]) . "/images/" . $imageName;

        // criar um ficheiro vazio nessa localização e adicionar o binário da imagem
        file_put_contents($imagePath, $imageData);

        // preparar a camada de validação de ficheiros
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $detected_filetype = finfo_file($finfo, $imagePath);

        // validar se realmente é uma imagem, apagar caso não seja
        if($detected_filetype !== "image/jpeg") {
            unlink( $imagePath );
            $imageName = "";
        }

        return $imageName;
    }

    
}