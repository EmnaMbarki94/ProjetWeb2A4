<?php
include '../Controller/consultationC.php';
$consultationC = new consultationC();
$consultationC->deleteconsultation($_GET["id_consultation"]);
header('Location:list_consultations.php');//redirection de la route
