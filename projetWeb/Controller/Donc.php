<?php

require '../config.php';

class DonC
{

    public function listDons()
    {
        $sql = "SELECT * FROM dons";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteDon($idDon)
    {
        $sql = "DELETE FROM dons WHERE id_dons = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $idDon);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addDon($don)
    {
        $sql = "INSERT INTO dons  (`destination`, `nom_donneur`, `type`, `livraison`)   VALUES ( :destination, :nom_donneur, :typed, 5)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'destination' => $don->getDestination(),
                'nom_donneur' => $don->getNomDonneur(),
                'typed' => $don->getType(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showDon($id)
    {
        $sql = "SELECT * from dons where id_dons = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $don = $query->fetch();
            return $don;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatedon($don, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE dons SET 
                    destination = :destination, 
                    nom_donneur = :nom_donneur, 
                    type = :type
                WHERE id_dons = :id'
            );
            
            $query->execute([
                'id' => $id,
                'destination' => $don->getDestination(),
                'nom_donneur' => $don->getNomDonneur(),
                'type' => $don->getType(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
