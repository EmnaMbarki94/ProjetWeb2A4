<?php

require '../config.php';

class reponseC
{

    public function listReponse()
    {
        $sql = "SELECT * FROM reponse";

        $db = config::getConnexion();//pdo
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteReponse($ide)
    {
        $sql = "DELETE FROM reponse WHERE idRep = :idRep";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idRep', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addReponse($reponse)
    {
        $sql = "INSERT INTO reponse  
        VALUES (NULL,:response)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'response' => $reponse->getResponse(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showReponse($idRep)
    {
        $sql = "SELECT * from reponse where idRep = $idRep";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $reponse = $query->fetch();
            return $reponse;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateReponse($reponse, $idRep)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reponse SET 
                    response = :response
                WHERE idRep= :idRep'
            );
            
            $query->execute([
                'idRep' => $idRep,
                'response' => $reponse->getResponse(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
