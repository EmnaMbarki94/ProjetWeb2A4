<?php

require_once('../config.php');

class ConsultationC
{
    function afficherConsultation($id_cabinet)
    {
        $sql = "SELECT * from consultation where id_cabinet = $id_cabinet";
        
        try {
            $db = config::getConnexion();
            $query = $db->prepare($sql);
            $query->execute();
            $cabinet = $query->fetchAll();
            return $cabinet;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    public function listCabinet()
    {
        $sql = "SELECT * FROM cabinet";

        $db = config::getConnexion();//pdo
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    
    public function listConsultation()
    {
        $sql = "SELECT * FROM consultation C join cabinet CA on C.id_cabinet=CA.id_cabinet";
        $db = config::getConnexion(); // Utilisation de Config avec une majuscule (convention de nommage des classes)

        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function deleteConsultation($id)
    {
        $sql = "DELETE FROM consultation WHERE id_consultation = :id";
        $db = config::getConnexion();

        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function addConsultation($consultation)
    {
        $sql = "INSERT INTO consultation 
                VALUES (NULL, :nom_patient, :email_patient, :nom_medecin, :symtomes, :date_consultation, :heure_consultation, :id_cabinet,:grade)";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_patient' => $consultation->getNomPatient(),
                'email_patient' => $consultation->getEmail(),
                'nom_medecin' => $consultation->getNomMedecin(),
                'symtomes' => $consultation->getSymtomes(),
                'date_consultation' => $consultation->getDateConsultation(),
                'heure_consultation' => $consultation->getHeureConsultation(),
                'id_cabinet' => $consultation->getIdCabinet(),
                'grade' => 0,  
            ]);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    

    public function showConsultation($id)
    {
        $sql = "SELECT * FROM consultation C join cabinet CA on C.id_cabinet=CA.id_cabinet";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            //$query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $consultation = $query->fetch();
            return $consultation;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function updateConsultation($consultation, $id)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE consultation AS C 
             JOIN cabinet AS CA ON C.id_cabinet = CA.id_cabinet
             SET 
                nom_patient = :nom_patient,
                email_patient = :email_patient,
                nom_medecin = :nom_medecin, 
                symtomes = :symtomes,
                date_consultation = :date_consultation,
                heure_consultation = :heure_consultation,
                id_cabinet = :id_cabinet,
                grade=:grade
             WHERE id_consultation = :id'
        );

        $query->execute([
            'id' => $id,
            'nom_patient' => $consultation->getNomPatient(),
            'email_patient' => $consultation->getEmail(),
            'nom_medecin' => $consultation->getNomMedecin(),
            'symtomes' => $consultation->getSymtomes(),
            'date_consultation' => $consultation->getDateConsultation(),
            'heure_consultation' => $consultation->getHeureConsultation(),
            'id_cabinet' => $consultation->getIdCabinet(),
            'grade' => $consultation->getIdGrade(),

        ]);

        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}



public function updateRate($rate, $id)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE consultation  
             
             SET 
               
                grade=:grade
             WHERE id_consultation = :id'
        );

        $query->execute([
            'id' => $id,
           
            'grade' => $rate

        ]);

        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}


}

?>
