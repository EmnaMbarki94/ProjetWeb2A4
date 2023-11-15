<?php
// Importations nécessaires
include '../Controller/clientC.php';
include '../Model/client.php';

$error = "";

// create client
$client = null;

// create an instance of the controller
$clientC = new clientC();

if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["numTel"])&&
    isset($_POST["mdp"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["numTel"])&&
        !empty($_POST["mdp"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $client = new client(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['numTel'],
            $_POST['numTel'],
            $_POST['mdp']
        );

        var_dump($client);
        
        $clientC->updateClient($client, $_POST['idClient']);
        header('Location:listClients.php');
    } else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
</head>
<body>

    <div id="error">
            <?php echo $error; ?>
        </div>
    <?php
        if (isset($_POST['idClient'])) {
            $client = $clientC->showClient($_POST['idClient']);
            
    ?>
    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="nom">IdClient:</label></td>
                <td>
                    <input type="text" id="idClient" name="idClient" value="<?php echo $_POST['idClient'] ?>" readonly />
                </td>
            </tr>
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