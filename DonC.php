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

    public function getDonByCODED($codeD)
    {
        $pdo = config::getConnexion();

        $query = "SELECT * FROM dons WHERE CODED = :codeD";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':codeD', $codeD, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updateDon($codeD, $destination, $typeD, $nom_donneur)
    { 
        /*$pdo = config::getConnexion();

        $query = "UPDATE dons 
                  SET codeD = :codeD, destination = :sdestination, typeD= :typeD, nom_donneur = :nom_donneur)
                  WHERE CODED = :codeD;

        $stmt = $pdo->prepare($query);
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':codeD', $codeD, PDO::PARAM_INT);
        $stmt->bindParam(':destination', $destination, PDO::PARAM_STR);
        $stmt->bindParam(':typeD', $typeD, PDO::PARAM_STR);
        $stmt->bindParam(':nom_donneur', $nom_donneur, PDO::PARAM_STR);
        

     
     
       return $stmt->execute();*/
    }
    }
    

    
       
    

?>
