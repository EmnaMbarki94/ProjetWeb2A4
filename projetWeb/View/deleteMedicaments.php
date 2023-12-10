<?php
include '../Controller/MedicamentC.php';

// Vérifier si le paramètre codeM est défini et n'est pas vide
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];

    // Créer une instance du contrôleur de médicaments
    $m = new MedicamentC();

    // Appeler la méthode de suppression
    $m->deleteMedicaments($_GET["id"]);

    // Rediriger vers la liste des médicaments après la suppression
    header('Location: listMedicamentsF.php');
} 
?>
