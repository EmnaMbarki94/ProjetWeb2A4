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
        VALUES (NULL, :nom,:prenom, :email,:numTel,:mdp)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $client->getNom(),
                'prenom' => $client->getPrenom(),
                'email' => $client->getEmail(),
                'numTel' => $client->getnumTel(),
                'mdp' => $client->getmdp(),
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
                    mdp = :mdp
                WHERE idClient= :id'
            );
            
            $query->execute([
                'id' => $id,
                'nom' => $client->getNom(),
                'prenom' => $client->getPrenom(),
                'email' => $client->getEmail(),
                'numTel' => $client->getnumTel(),
                'mdp' => $client->getmdp(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function clientExists($email)
    {
        try {
            $pdo = config::getConnexion(); // Utilisation de la classe de configuration pour obtenir la connexion PDO
            $query = "SELECT COUNT(*) as count FROM client WHERE email = :email";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return ($row['count'] > 0); // Renvoie vrai si l'email existe déjà, sinon faux
        } catch (PDOException $e) {
            die('Erreur lors de la vérification de l\'existence du client: ' . $e->getMessage());
        }
    }

}
