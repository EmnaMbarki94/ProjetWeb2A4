<?php
include '../Controller/pharmacieC.php';
$pharmacieC = new pharmacieC();
$pharmacieC->deletePharmacie($_GET["id"]);
header('Location:listPharmacies.php');//redirection de la route
?>