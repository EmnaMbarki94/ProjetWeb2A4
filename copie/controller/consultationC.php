<?php

require '../config.php';

class consultationC
{

    public function listConsultation()
    {
        $sql = "SELECT * FROM consultation";

        $db = config::getConnexion(); //pdo
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteconsultation($ide)
    {
        $sql = "DELETE FROM consultation WHERE id_consultation = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addConsultation($consultation)
    {
        $sql = "INSERT INTO consultation 
                VALUES (NULL, :nom_patient, :email_patient, :nom_medecin, :symtomes, :date_consultation, :heure_consultation)";
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
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showconsultation($id)
    {
        $sql = "SELECT * FROM consultation WHERE id_consultation = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $consultation = $query->fetch();
            return $consultation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateconsultation($consultation, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE consultation SET 
                    nom_patient = :nom_patient,
                    nom_medecin = :nom_medecin,  
                    email_patient = :email_patient, 
                    date_consultation = :date_consultation,
                    symtomes = :symtomes,
                    heure_consultation = :heure_consultation
                WHERE id_consultation = :id'
            );

            $query->execute([
                'id' => $id,
                'nom_patient' => $consultation->getNomPatient(),
                'email_patient' => $consultation->getEmail(),
                'nom_medecin' => $consultation->getNomMedecin(),
                'date_consultation' => $consultation->getDateConsultation(),
                'symtomes' => $consultation->getSymtomes(),
                'heure_consultation' => $consultation->getHeureConsultation(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>
