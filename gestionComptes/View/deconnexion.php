<?php
session_start();
$_SESSION=array();
session_destroy();

// Rediriger vers la page de connexion après la déconnexion
header("Location: connectClient.php");
exit;
?>
