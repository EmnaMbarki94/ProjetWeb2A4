<?php
include '../Controller/clientC.php';
$clientC = new clientC();
$clientC->deleteClient($_GET["id"]);
header('Location:listClients.php');//redirection de la route
?>