<?php
include '../Controller/clientC.php';
$clientC = new clientC();
$clientC->deleteClient($_GET["id"]);
header('Location:listJoueurs.php');//redirection de la route
