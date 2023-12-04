<?php
require_once "../controller/LivraisonC.php";

$LivraisonC = new LivraisonC();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['livraison']) && isset($_POST['search']))
    {
        $id_liv= $_POST['livraison'];
        $list = $LivraisonC ->affichedons($id_liv);
    }
}
$livraisons =$LivraisonC->affichelivraison();
?>

<!DOCTYPE html>
<head>
    <title>recherche de don</title>
</head>
<body>
    <h1>Recherche de livraison</h1>
    <form action="" method="POST">
        <label for="livraison">Sélectionnez une liv :</label>
        <select name="livraison" id="don">
            <?php
            foreach ($livraisons as $livraison) {
                echo '<option value="' . $livraison['id_liv'] . '">' . $livraison['nom'] . '</option>';
        }
             ?>
        </select>
        <input type="submit" value="Rechercher" name="search">
    </form>
    <?php if (isset($list)) { ?>
        <br>
        <h2>don correspondants au genre sélectionné :</h2>
         <ul>
             <?php foreach ($list as $dons) { ?>
                <li><?= $dons['nom_donneur'] ?> - <?= $dons['destination'] ?>-<?= $dons['type'] ?> </li>      >
             <?php } ?>
            </ul>
    
            <?php } ?>

    </body>
</html>





