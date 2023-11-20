<?php
if (isset($_GET['codeCom'])) {
    $codeCom = $_GET['codeCom'];
    
    require_once '../Controller2/LivraisonC.php';

    $livraisonController = new livraisonC();
    
    // Delete the organization
    if ($livraisonController->deleteLivraison($codeCom)) {
        header("Location: ListLivraison.php"); // Redirect to the list of donnation
        exit();
    } else {
        echo "Error deleting the donnation.";
    }
} else {
    echo "not specified.";
}
?>
