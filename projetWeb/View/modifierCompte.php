<?php
include '../Controller/clientC.php';
include '../Model/client.php';

session_start();

if (isset($_SESSION['email'])) {
    $emailClient = $_SESSION['email'];
    $clientC = new clientC();
    $clientDetails = $clientC->getClientByEmail($emailClient);
    if ($clientDetails) {
        // Vérifiez si des données ont été soumises via le formulaire POST
        if (
            isset($_POST["idClient"]) &&
            isset($_POST["nom"]) &&
            isset($_POST["prenom"]) &&
            isset($_POST["email"]) &&
            isset($_POST["numTel"]) &&
            isset($_POST["mdp"])
        ) {
            if (
                !empty($_POST['nom']) &&
                !empty($_POST['prenom']) &&
                !empty($_POST['email']) &&
                !empty($_POST['numTel']) &&
                !empty($_POST['mdp'])
            ) {
                // Créez une instance de la classe client avec les données du formulaire
                $client = new client(
                    $_POST['idClient'],
                    $_POST['nom'],
                    $_POST['prenom'],
                    $_POST['email'],
                    $_POST['numTel'],
                    $_POST['mdp']
                );
                var_dump($client);
                $clientC->updateClient($client, $_POST['idClient']);
                exit();
            } else {
                $error = "Informations manquantes";
            }
        }
    } 
    }
?>
<!DOCTYPE html>
<html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mettre à jour</title>

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
                        <a class="js-logo-clone"><strong class="text-primary">SPT </strong>SANTé POUR TOUS</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <?php
        if (isset($_POST['idClient'])) {
            $client = $clientC->showClient($_POST['idClient']);
            
    ?>
    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" value="<?php echo $client['nom'] ?>" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="prenom">Prénom :</label></td>
                <td>
                    <input type="text" id="prenom" name="prenom" value="<?php echo $client['prenom'] ?>" />
                    <span id="erreurPrenom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email :</label></td>
                <td>
                    <input type="text" id="email" name="email" value="<?php echo $client['email'] ?>" />
                    <span id="erreurEmail" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="telephone">Téléphone :</label></td>
                <td>
                    <input type="text" id="telephone" name="numTel" value="<?php echo $client['numTel'] ?>" />
                    <span id="erreurTelephone" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="mdp">Mot de passe :</label></td>
                <td>
                    <input type="text" id="mdp" name="mdp" value="<?php echo $client['mdp'] ?>" />
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
    <script src="templateF/js/jquery-3.3.1.min.js"></script>
  <script src="templateF/js/jquery-ui.js"></script>
  <script src="templateF/js/popper.min.js"></script>
  <script src="templateF/js/bootstrap.min.js"></script>
  <script src="templateF/js/owl.carousel.min.js"></script>
  <script src="templateF/js/jquery.magnific-popup.min.js"></script>
  <script src="templateF/js/aos.js"></script>
  <script src="templateF/js/main.js"></script>
</body>
</html>