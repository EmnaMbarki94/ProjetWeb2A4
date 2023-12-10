<?php
require_once "../controller/LivraisonC.php";

$LivraisonC = new LivraisonC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Etat_livraison']) && isset($_POST['search'])) {
        $Etat_livraison = $_POST['Etat_livraison'];
        $list = $LivraisonC-> affichelivraisonParEtat($Etat_livraison);
        var_dump($list);
    }

}

$livraisons = $LivraisonC->affichelivraison();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de livraison</title>
</head>
<body>
    <h1>Recherche de livraison</h1>
    <form action="" method="POST">
        <label for="Etat_livraison">Sélectionnez un état de livraison :</label>
        <select name="Etat_livraison" id="Etat_livraison">
            <option value="0">0</option>
            <option value="1">1</option>
        </select>
        <input type="submit" value="Rechercher" name="search">
    </form>

    <?php 
      
        if (isset($list)) { ?>
        <br>
        <h2>Résultats de la recherche :</h2>
        <ul>
            <?php foreach ($list as $livraison) { ?>
                <li><?= $livraison['nom'] ?> - <?= $livraison['destination'] ?> - <?= $livraison['Etat_livraison'] ?>- <?= $livraison['numero_tele'] ?> </li>
            <?php } ?>
        </ul>
    <?php } ?>

</body>
</html>
