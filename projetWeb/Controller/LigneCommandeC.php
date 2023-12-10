<?php
require_once '../config.php';

class LigneCommandeC
{
    

    
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
    
    public function listLigneCommande()
    {
        $sql = "SELECT C.idClient,C.id,C.idC,M.Nom,C.idM,C.Quantite,C.total FROM ligne_commande C JOIN medicaments M ON C.idM=M.id " ;

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteLigneCommande($id)
    {
        $sql = "DELETE FROM ligne_commande WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addLigneCommande($Lignecommande)
{
    $sql = "INSERT INTO ligne_commande (idClient,idM,idC, Quantite, total)  
            VALUES (:idClient,:idM, :idC ,:Quantite, :total)";

    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'idClient' => $Lignecommande->getidClient(),
            'idM' => $Lignecommande->getidM(),
            'idC' => $Lignecommande->getidC(),
            'Quantite' => $Lignecommande->getQuantite(),
            'total' => $Lignecommande->gettotal(),
        ]);
        
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}



    function showLigneCommande($id)
    {
        $sql = "SELECT * from ligne_commande where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $Lignecommande = $query->fetch();
            return $Lignecommande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateLigneCommande($Lignecommande, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE ligne_commande SET 
                    idClient = :idClient,
                    idM = :idM, 
                    Quantite = :Quantite, 
                    total = :total
                WHERE id= :id'
            );
            
            $query->execute([
                'id' => $id,
                'idClient' => $Lignecommande->getidClient(),
                'idM' => $Lignecommande->getidM(),
                'Quantite' => $Lignecommande->getQuantite(),
                'total' => $Lignecommande->gettotal(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    


    public function listLigneCommandeByIdC($id)
    {
        $sql = "SELECT C.idClient, C.id,M.Nom,C.idM,C.Quantite,C.total FROM ligne_commande C JOIN medicaments M ON C.idM=M.id WHERE C.idC=:id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $ligneCommandeList = $query->fetchAll(PDO::FETCH_ASSOC);

            return $ligneCommandeList;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    
}
