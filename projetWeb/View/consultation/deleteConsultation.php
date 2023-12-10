<?php
include 'C:/xampp/htdocs/gestionComptes/Controller/consultationC.php';
$consultationC = new ConsultationC();
$consultationC->deleteConsultation($_GET["id"]);
header('Location:list_consultations.php');//redirection de la route
?>