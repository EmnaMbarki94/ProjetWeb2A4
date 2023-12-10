<?php
session_start();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {
        foreach ($_SESSION['panier'] as $key => $medicament) {
            if ($medicament['id'] == $id) {
                unset($_SESSION['panier'][$key]);
                break;
            }
        }
    }
}

// Ne redirigez pas ici
 header('Location: panier.php');
// exit();
?>