<?php

require '../config.php';

class MedicamentC
{
    public function listMedicaments()
    {
        $sql = "SELECT * FROM medicaments";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteMedicaments($codeM)
    {
        $sql = "DELETE FROM medicaments WHERE codeM = :codeM";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':codeM', $codeM);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addMedicaments($medicaments)
    {
        $sql = "INSERT INTO medicaments 
        VALUES (NULL, :codeM, :Nom, :Prix, :Quantite)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'codeM' => $medicaments->getcodeM(),
                'Nom' => $medicaments->getNom(),
                'Prix' => $medicaments->getPrix(),
                'Quantite' => $medicaments->getQuantite(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showMedicaments($codeM)
    {
        $sql = "SELECT * from medicaments where codeM = $codeM";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $medicaments = $query->fetch();
            return $medicaments;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateMedicaments($medicaments, $codeM)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE medicaments SET 
                    codeM = :codeM, 
                    Nom = :Nom, 
                    Prix = :Prix, 
                    Quantite = :Quantite
                WHERE codeM= :codeM'
            );
            
            $query->execute([
                'codeM' => $codeM,
                'Nom' => $medicaments->getNom(),
                'Prix' => $medicaments->getPrix(),
                'Quantite' => $medicaments->getQuantite(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>
