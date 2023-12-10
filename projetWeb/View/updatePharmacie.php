<?php

include '../Controller/pharmacieC.php';
include '../Model/pharmacie.php';
$error = "";

// create client
$pharmacie = null;
// create an instance of the controller
$pharmacieC = new pharmacieC();


if (
    isset($_POST["nomPh"]) &&
    isset($_POST["adressePh"]) &&
    isset($_POST["numPh"]) &&
    isset($_POST["email"])&&
    isset($_POST["mdp"])
) {
    if (
        !empty($_POST['nomPh']) &&
        !empty($_POST["adressePh"]) &&
        !empty($_POST["numPh"]) &&
        !empty($_POST["email"])&&
        !empty($_POST["mdp"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $pharmacie = new pharmacie(
            null,
            $_POST['nomPh'],
            $_POST['adressePh'],
            $_POST['numPh'],
            $_POST['email'],
            $_POST['mdp']
        );
        var_dump($pharmacie);
        
        $pharmacieC->updatePharmacie($pharmacie, $_POST['idPh']);
        header('Location:listPharmacies.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre à jour</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>SPT &mdash; Colorlib Template</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="templateF/fonts/icomoon/style.css">

    <!--<link rel="stylesheet" href="templateF/css/styleCONN.css">-->

    <link rel="stylesheet" href="templateF/css/bootstrap.min.css">
    <link rel="stylesheet" href="templateF/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="templateF/css/magnific-popup.css">
    <link rel="stylesheet" href="templateF/css/jquery-ui.css">
    <link rel="stylesheet" href="templateF/css/owl.carousel.min.css">
    <link rel="stylesheet" href="templateF/css/owl.theme.default.min.css">


  <link rel="stylesheet" href="templateF/css/aos.css">

  <link rel="stylesheet" href="templateF/css/style.css">
</head>

<body>
    <div class="site-navbar py-2">

    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo">
                <div class="site-logo">
                    <a href="listPharmacies.php" class="js-logo-clone"><strong class="text-primary">SPT </strong>SANTé POUR TOUS</a>
                </div>
            </div>
            
        </div>
    </div>
</div>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #343a40;
        }

        header {
            background-color: #28a745;
            padding: 20px;
            color: #fff;
            text-align: center;
        }

       

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color:  #28a745;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #28a745;
        }
    </style>
    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idPh'])) {
        $pharmacie = $pharmacieC->showPharmacie($_POST['idPh']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="Identifiant">Id Pharmacie:</label></td>
                    <td>
                        <input type="text" id="idPh" name="idPh" value="<?php echo $_POST['idPh'] ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nomPh" name="nomPh" value="<?php echo $pharmacie['nomPh'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="adresse">Adresse :</label></td>
                    <td>
                        <input type="text" id="adressePh" name="adressePh" value="<?php echo $pharmacie['adressePh'] ?>" />
                        <span id="erreurAdresse" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="numero">Numéro :</label></td>
                    <td>
                        <input type="number" id="numPh" name="numPh" value="<?php echo $pharmacie['numPh'] ?>" />
                        <span id="erreurTelephone" style="color: red"></span>
                    </td>
                </tr>

                <tr>
                    <td><label for="email">Email :</label></td>
                    <td>
                        <input type="text" id="email" name="email" value="<?php echo $pharmacie['email'] ?>" />
                        <span id="erreurEmail" style="color: red"></span>
                    </td>
                </tr>

                <tr>
                    <td><label for="mdp">Mot de passe :</label></td>
                    <td>
                        <input type="text" id="mdp" name="mdp" value="<?php echo $pharmacie['mdp'] ?>" />
                        <span id="erreurMdp" style="color: red"></span>
                    </td>
                </tr>
                
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>