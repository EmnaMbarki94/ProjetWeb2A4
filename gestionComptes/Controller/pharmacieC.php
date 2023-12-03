<?php

require '../configPh.php';

class pharmacieC
{

    public function listPharmacies()
    {
        $sql = "SELECT * FROM pharmacie";

        $db = config::getConnexion();//pdo
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletePharmacie($ide)
    {
        $sql = "DELETE FROM pharmacie WHERE idPh = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addPharmacie($pharmacie)
    {
        $sql = "INSERT INTO pharmacie  
        VALUES (NULL, :nomPh,:adressePh,:numPh,:email,:mdp)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nomPh' => $pharmacie->getNom(),
                'adressePh' => $pharmacie->getAdresse(),
                'numPh' => $pharmacie->getNum(),
                'email' => $pharmacie->getEmail(),
                'mdp' => $pharmacie->getMdp(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showPharmacie($id)
    {
        $sql = "SELECT * from pharmacie where idPh = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $pharmacie = $query->fetch();
            return $pharmacie;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatePharmacie($pharmacie, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE pharmacie SET 
                    nomPh = :nomPh, 
                    adressePh = :adressePh, 
                    numPh= :numPh,
                    email = :email, 
                    mdp = :mdp
                WHERE idPh= :id'
            );
            
            $query->execute([
                'id' => $id,
                'nomPh' => $pharmacie->getNom(),
                'adressePh' => $pharmacie->getAdresse(),
                'numPh' => $pharmacie->getNum(),
                'email' => $pharmacie->getEmail(),
                'mdp' => $pharmacie->getMdp(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
