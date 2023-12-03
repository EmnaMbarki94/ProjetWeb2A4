<?php

require '../config.php';

class cabinetC
{

    
    public function listCabinet()
    {
        $sql = "SELECT * FROM cabinet";

        $db = Config::getConnexion();//pdo
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCabinet($ide)
    {
        $sql = "DELETE FROM cabinet WHERE id_cabinet= :id";
        $db = Config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addCabinet($cabinet)
    {
        $sql = "INSERT INTO cabinet  
        VALUES (NULL, :adresse_cabinet,:specialite)";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
              
                'adresse_cabinet' => $cabinet->getAdresse(),
                'specialite' => $cabinet->getSpecialite(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showCabinet($id)
    {
        $sql = "SELECT * from cabinet where id_cabinet = $id";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $cabinet = $query->fetch();
            return $cabinet;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateCabinet($cabinet, $id)
    {   
        try {
            $db = Config::getConnexion();
            $query = $db->prepare(
                'UPDATE cabinet SET 
                   
                   adresse_cabinet = :adresse_cabinet,
                   specialite=:specialite
                WHERE id_cabinet= :id'
            );
            
            $query->execute([
                'id' => $id,
                
                'adresse_cabinet' => $cabinet->getAdresse(),
                'specialite' => $cabinet->getSpecialite()
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
