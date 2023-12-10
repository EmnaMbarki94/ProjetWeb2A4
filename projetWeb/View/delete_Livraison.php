<?php
include '../Controller/LivraisonC.php';
$livraisonC = new LivraisonC();
$livraisonC->deleteLivraison($_GET["id"]);
header('Location: listlivraison.php');  
?>
