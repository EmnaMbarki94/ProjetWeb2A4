
<?php
include '../Controller/PharmacieC.php';

// Vérifier si le paramètre codeM est défini et n'est pas vide
if (isset($_GET["codeM"]) && !empty($_GET["codeM"])) {
    $codeM = $_GET["codeM"];

    // Créer une instance du contrôleur de médicaments
    $m = new MedicamentC();

    // Appeler la méthode de suppression
    $m->deleteMedicaments($_GET["codeM"]);

    // Rediriger vers la liste des médicaments après la suppression
    header('Location: listMedicaments.php');
} 
?>
