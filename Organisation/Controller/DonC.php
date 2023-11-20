 <?php
 require_once '../config.php';


class DonC
{
    public function listDon()
    {
        $pdo = config::getConnexion();
        $query = "SELECT * FROM dons";
        $result = $pdo->query($query);
        return $result;
    }


    public function deleteDon($codeD)
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
        $sql = "DELETE FROM dons WHERE CODED = :codeD ";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':codeD', $codeD);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
        
    }



    public function addDon($codeD, $destination, $typeD, $nom_donneur)
    {
        $pdo = config::getConnexion();

        // Use a prepared statement to prevent SQL injection
        $query = "INSERT INTO dons (codeD, destination, typeD, nom_donneur)
          VALUES (:codeD, :destination, :typeD, :nom_donneur)";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':codeD', $codeD, PDO::PARAM_STR);
        $stmt->bindParam(':destination', $destination, PDO::PARAM_STR);
        $stmt->bindParam(':typeD', $typeD, PDO::PARAM_STR);
        $stmt->bindParam(':nom_donneur', $nom_donneur, PDO::PARAM_STR);
        
        if ($stmt-> execute()) {
            return true; // Successfully added
        } else {
            return false; // Add failed
        }
    }
   public function updateDon($codeD, $destination, $typeD, $nom_donneur)
    {
      //test
      $pdo = config::getConnexion();
 
      $query = "UPDATE dons 
                SET codeD = :codeD, destination = :sdestination, typeD= :typeD, nom_donneur = :nom_donneur)
                WHERE CODED = :codeD";
  
      $stmt = $pdo->prepare($query);
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':codeD', $codeD, PDO::PARAM_INT);
      $stmt->bindParam(':destination', $destination, PDO::PARAM_STR);
      $stmt->bindParam(':typeD', $typeD, PDO::PARAM_STR);
      $stmt->bindParam(':nom_donneur', $nom_donneur, PDO::PARAM_STR);
      
  
   
   
     return $stmt->execute();
        
     }


    public function getDonByCODED($codeD)
    {
        $pdo = config::getConnexion();

        $query = "SELECT * FROM dons WHERE CODED = :codeD";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':codeD', $codeD, PDO::PARAM_INT);
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
