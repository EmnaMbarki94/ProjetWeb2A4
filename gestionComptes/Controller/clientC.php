<?php

require '../config.php';

class clientC
{

    public function listClients()
    {
        $sql = "SELECT * FROM client";

        $db = config::getConnexion();//pdo
        try {
            $liste = $db->query($sql);//table des joueurs
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteClient($ide)
    {
        $sql = "DELETE FROM client WHERE idClient = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addClient($client)
    {
        $sql = "INSERT INTO client  
        VALUES (NULL, :nom,:prenom, :email,:numTel,:mdp,:rolee)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $client->getNom(),
                'prenom' => $client->getPrenom(),
                'email' => $client->getEmail(),
                'numTel' => $client->getnumTel(),
                'mdp' => $client->getmdp(),
                'rolee' => $client->getRolee()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showClient($id)
    {
        $sql = "SELECT * from client where idClient = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $client = $query->fetch();
            return $client;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateClient($client, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE client SET 
                    nom = :nom, 
                    prenom = :prenom, 
                    email = :email, 
                    numTel = :numTel,
                    mdp = :mdp,
                    rolee = :rolee
                WHERE idClient= :id'
            );
            
            $query->execute([
                'id' => $id,
                'nom' => $client->getNom(),
                'prenom' => $client->getPrenom(),
                'email' => $client->getEmail(),
                'numTel' => $client->getnumTel(),
                'mdp' => $client->getmdp(),
                'rolee' => $client->getRolee()
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getClientByEmail($email) {

        $db = config::getConnexion();

        $query = $db->prepare("SELECT * FROM client WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();

        // Récupérez les détails du client sous forme de tableau associatif
        $clientDetails = $query->fetch(PDO::FETCH_ASSOC);

        return $clientDetails; // Retourne les détails du client ou null s'ils ne sont pas trouvés
    }
    function clientExists($email) {
       
        $db = config::getConnexion();
    
        $sql = "SELECT * FROM client WHERE email = '$email'";
        $result = $db->query($sql);
    
        // Si des résultats sont retournés, cela signifie que l'e-mail existe déjà
        if ($result && $result->rowcount() > 0) {
            return true; // L'e-mail existe déjà
        } else {
            return false; 
        }
    }
    
}
