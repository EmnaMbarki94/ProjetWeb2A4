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
        $sql = "DELETE FROM reponse WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addReponse($reponse)
    {
        $sql = "INSERT INTO reponse  
        VALUES (NULL,:response,:idreclamation)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'response' => $reponse->getResponse(),
                'idreclamation'=>$reponse->getIDreclamation(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
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
            die('Error: ' . $e->getMessage());
        }
    }

    function updateReponse($reponse, $id,$idreclamation)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reponse SET 
                    response = :response ,
                    idreclamation = :idreclamation
                WHERE id= :id'
            );
            
            $query->execute([
                'id' => $id,
                'response' => $reponse->getResponse(),
                'idreclamation' => $reponse->getIDreclamation(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function afficherReclamation($idreclamation)
    {
        

        $db = config::getConnexion();//pdo
        try {
            $query = $db->prepare("SELECT * FROM reclamation");
            $query->execute();
            $reclamation = $query->fetchAll();
            return $reclamation;
            } catch (Exception $e) {
                die('Error: ' . $e->getMessage());
            }
        }
           
    

}
