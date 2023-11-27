<?php

require_once "../Controller/reclamationC.php";

$reclamationC = new reclamationC();

// Traitement du formulaire

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (isset($_POST['reclamation']) && isset($_POST['search'])) { $id = $_POST['reclamation']; $list = $reclamationC->afficherReponse ($id);

}

}
$reclamations = $reclamationC->listReclamation();
?>
<!DOCTYPE html>
<head>
    <title>Recherche reponse</title>
</head>

<body>
    <h1>Recherche reponse par reclamation </h1>
    <form action="" method="POST">
        <label for="reclamation">Sélectionnez reclamation  :</label>
        <select name="reclamation" id="reclamation">
        <?php
        foreach ($reclamations as $reclamation) {
            echo '<option value="' . $reclamation['id']. '">' . $reclamation['nom'] . '</option>';
        }
        ?>
     </select>
    <input type="submit" value="Rechercher" name="search">
    </form>

    <?php if (isset($list)) {?>
        <br>
        <h2>reponse correspondants au reclamation  sélectionné :</h2>
        <ul>

            <?php foreach ($list as $reponse ) { ?>
                <li><?= $reponse ['response']?></li>

            <?php} ?> 
        </ul>

    <?php} ?>

</body>
</html>