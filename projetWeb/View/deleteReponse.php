<?php
include '../Controller/reponseC.php';
$reponseC = new reponseC();
$reponseC->deleteReponse($_GET["id"]);
header('Location:listReponse.php');//redirection de la route
