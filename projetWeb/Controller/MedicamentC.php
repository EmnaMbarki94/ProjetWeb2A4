<?php

require_once '../config.php';

class MedicamentC
{
    public function getMedicamentById($id) {
        
        return [
            'id' => $id,

            // Autres détails...
        ];
    }
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

    function deleteMedicaments($id)
    {
        $sql = "DELETE FROM medicaments WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addMedicaments($medicaments)
    {
        $sql = "INSERT INTO medicaments 
        VALUES (NULL, :codeM, :Nom, :Prix, :Quantite, :image)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'codeM' => $medicaments->getcodeM(),
                'Nom' => $medicaments->getNom(),
                'Prix' => $medicaments->getPrix(),
                'Quantite' => $medicaments->getQuantite(),
                'image' => $medicaments->getImage(), // Ajoutez le champ image à la requête
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function showMedicaments($id)
    {
        $sql = "SELECT * from medicaments where id= $id";
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

    function updateMedicaments($medicaments, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE medicaments SET 
                    id = :id, 
                    codeM = :codeM, 
                    Nom = :Nom, 
                    Prix = :Prix, 
                    Quantite = :Quantite,
                    image = :image
                WHERE id= :id'
            );

            $query->execute([
                'id' => $medicaments->getid(),
                'codeM' => $medicaments->getcodeM(),
                'Nom' => $medicaments->getNom(),
                'Prix' => $medicaments->getPrix(),
                'Quantite' => $medicaments->getQuantite(),
                'image' => $medicaments->getImage(), // Ajoutez le champ image à la requête
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}

?>
