<?php
include '../Controller/DonC.php';
$donC = new DonC();
$donC->deleteDon($_GET["id"]);
header('Location: listdon.php');  // Assuming your list of donations page is named listDons.php

?>
