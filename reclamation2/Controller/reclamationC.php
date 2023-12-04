<?php

require '../config.php';

class reclamationC
{

    public function listReclamation()
    {
        $sql = "SELECT * FROM reclamation";

        $db = config::getConnexion();//pdo
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function deleteReclamation($ide)
    {
        $sql = "DELETE FROM reclamation WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    function addReclamation($reclamation)
    {
        $sql = "INSERT INTO reclamation  
        VALUES (NULL, :nom,:email,:msg)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $reclamation->getNom(),
                'email' => $reclamation->getEmail(),
                'msg' => $reclamation->getMsg(),
            ]);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    function showReclamation($id)
    {
        $sql = "SELECT * from reclamation where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $reclamation = $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function updateReclamation($reclamation, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamation SET 
                    nom = :nom, 
                    email = :email, 
                    msg = :msg
                WHERE id= :id'
            );
            
            $query->execute([
                'id' => $id,
                'nom' => $reclamation->getNom(),
                'email' => $reclamation->getEmail(),
                'msg' => $reclamation->getMsg(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showReponse($id)
    {
        $sql = "SELECT * from reponse where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $reponse = $query->fetch();
            return $reponse;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} 