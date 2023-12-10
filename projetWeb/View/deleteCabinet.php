<?php
include 'C:/xampp/htdocs/gestionComptes/Controller/cabinetC.php';
$cabinetC = new cabinetC();
$cabinetC->deleteCabinet($_GET["id"]);
header('Location:listCabinet.php');//redirection de la route
