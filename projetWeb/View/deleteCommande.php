<?php
include '../Controller/CommandeC.php';
$commandeC = new CommandeC();
$commandeC->deleteCommande($_GET["id"]);
header('Location:listCommande.php');
