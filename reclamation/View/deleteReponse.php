<?php
include '../Controller/reponseC.php';
$reponseC = new reponseC();
$reponseC->deleteReponse($_GET["idRep"]);
header('Location:listReponse.php');//redirection de la route
