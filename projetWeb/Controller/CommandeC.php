<?php
require_once'../config.php';

class CommandeC
{
    
    
    public function listCommande()
    {
        $sql = "SELECT * FROM commande ";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCommande($id)
    {
        $sql = "DELETE FROM commande WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addCommande($totale,$idClient)
{
    $sql = "INSERT INTO commande (idClient ,totale)  
            VALUES (:idClient,:totale)";

    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'idClient'=>$idClient,
            'totale' => $totale
        ]);
        $id= $db->lastInsertId();
        return $id;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}



    function showCommande($id)
    {
        $sql = "SELECT * from commande where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $commande = $query->fetch();
            return $commande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateCommande($commande, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commande SET 
                    id = :id, 
                    dateC = :dateC, 
                    total = :total
                    idClient = :idClient
                WHERE id= :id'
            );
            
            $query->execute([
                'id' => $commande->getid(),
                'dateC' => $commande->getdateC(),
                'totale' => $commande->gettotale(),
                'idClient' => $commande->getidClient(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function RecupererIdCParCommande($id)
{
    $sql = "SELECT idC FROM ligne_commande WHERE idC = $id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $idCList = $query->fetchAll(PDO::FETCH_COLUMN);

        return $idCList ;
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}


    
    
}
