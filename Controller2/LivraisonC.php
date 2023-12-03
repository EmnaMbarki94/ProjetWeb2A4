<?php
 require_once '../config.php';


class LivraisonC
{
    public function ListLivraison()
    {
        $pdo = config::getConnexion();
        $query = "SELECT * FROM livraison";
        $result = $pdo->query($query);
        return $result;
    }


    public function deleteLivraison($codeCom)
    {
       /* $pdo = config::getConnexion();

        // Use a prepared statement to prevent SQL injection
        $query = "DELETE FROM dons= WHERE CODED = :codeD";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':codeD', $codeD, PDO::PARAM_INT);

       if ($stmt->execute()) {
            return true; // Deletion successful
        } else {
            return false; // Deletion failed
        }*/
        $sql = "DELETE FROM livraison WHERE CODECOM = :codeCom ";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':codeCom', $codeCom);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
        
    }



    public function addLivraison($codeCom, $Destination, $nom, $numero_tele)
    {
        $pdo = config::getConnexion();

        // Use a prepared statement to prevent SQL injection
        $query = "INSERT INTO Livraison (codeCom, Destination, nom, numero_tele)
          VALUES (:codeCom, :Destination, :nom, :numero_tele)";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':codeCom', $codeCom, PDO::PARAM_STR);
        $stmt->bindParam(':Destination', $Destination, PDO::PARAM_STR);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':numero_tele', $numero_tele, PDO::PARAM_STR);
        
        if ($stmt-> execute()) {
            return true; // Successfully added
        } else {
            return false; // Add failed
        }
    }
   public function updateDon($codeCom, $Destination, $nom, $numero_tele)
   {//test
    $pdo = config::getConnexion();
 
    $query = "UPDATE dons 
              SET codeCom = :codeCom, Destination = :Destination, nom= :nom , numero_tele = :numero_tele)
              WHERE CODED = :codeD";

    $stmt = $pdo->prepare($query);
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':codeCom', $codeCom, PDO::PARAM_INT);
    $stmt->bindParam(':Destination', $Destination, PDO::PARAM_STR);
    $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindParam(':numero_tele', $numero_tele, PDO::PARAM_STR);
    

 
 
   return $stmt->execute();} 
   
        
     


    public function getLivraisonBycodeCom($codeCom)
    {
        $pdo = config::getConnexion();

        $query = "SELECT * FROM livraison WHERE codeCom = :codeCom";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':codeCom', $codeCom, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    



/*// Dans votre fichier DonC.php


    
    // ... Autres méthodes ...

    public function updateDon($doncodeD, $codeD, $destination, $nom_donneur) {
        // Assurez-vous que la connexion à la base de données est correcte
        // $db = ... (votre connexion à la base de données)

        // Utilisez des déclarations préparées pour éviter les attaques par injection SQL
        $stmt = $db->prepare("UPDATE votre_table SET codeD = ?, destination = ?, nom_donneur = ? WHERE codeD = ?");
        
        if (!$stmt) {
            // Gestion des erreurs de requête préparée
            echo "Erreur de préparation de la requête.";
            return false;
        }

        // Liez les paramètres
        $stmt->bind_param("ssss", $codeD, $destination, $nom_donneur, $doncodeD);

        // Exécutez la mise à jour
        $result = $stmt->execute();

        // Vérifiez le résultat de la mise à jour
        if ($result) {
            // Mise à jour réussie
            $stmt->close();
            return true;
        } else {
            // Gestion des erreurs d'exécution
            echo "Erreur lors de l'exécution de la mise à jour : " . $stmt->error;
            $stmt->close();
            return false;
        }
    }

    // ... Autres méthodes ...



*/
    
}    

?>
