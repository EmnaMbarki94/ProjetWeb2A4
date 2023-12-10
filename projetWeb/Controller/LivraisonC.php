// DonC.php
<?php

require '../config.php';

class LivraisonC
{

    public function listLivraisons()
    {
        $sql = "SELECT * FROM livraison";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteLivraison($idLivraison)
    {
        $sql = "DELETE FROM livraison WHERE id_liv = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $idLivraison);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addLivraison($livraison)
    {
        $sql = "INSERT INTO livraison  
        VALUES (NULL, :nom, :destination, :numero_tele, :Etat_livraison)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $livraison->getNom(),
                'destination' => $livraison->getDestination(),
                'numero_tele' => $livraison->getNumeroTele(),
                'Etat_livraison' => $livraison->getEtatLivraison(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showLivraison($id)
    {
        $sql = "SELECT * FROM livraison WHERE id_liv = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $livraison = $query->fetch();
            return $livraison;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatelivraison($livraison, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE livraison SET 
                    nom = :nom, 
                    destination = :destination, 
                    numero_tele = :numero_tele, 
                    Etat_livraison = :Etat_livraison
                WHERE id_liv = :id'
            );
            
            $query->execute([
                'id' => $id,
                'nom' => $livraison->getNom(),
                'destination' => $livraison->getDestination(),
                'numero_tele' => $livraison->getNumeroTele(),
                'Etat_livraison' => $livraison->getEtatLivraison(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function affichedons($id_dons) {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM dons WHERE id_dons = :id");
            $query->execute(['id' => $id_dons]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function affichelivraison() {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM livraison");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    function affichelivraisonParEtat($Etat_livraison) {
        try {
        $pdo = config::getConnexion();
        $query = $pdo->query("SELECT * FROM `livraison` WHERE `Etat_livraison`= 0");
        //$params = array(':Etat_livraison' => $Etat_livraison);
        
        return $query;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
