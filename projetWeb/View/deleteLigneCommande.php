<?php
include '../Controller/LigneCommandeC.php';
$LignecommandeC = new LigneCommandeC();
$LignecommandeC->deleteLigneCommande($_GET["id"]);
header('Location:listCommande.php');
