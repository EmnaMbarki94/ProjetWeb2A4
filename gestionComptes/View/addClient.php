<?php
include '../Controller/clientC.php';
include '../Model/client.php';
//include '../view/inscription.html';

$error = "";

// create client
$client = null;

// create an instance of the controller
$clientC = new clientC();

if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["numTel"]) &&
    isset($_POST["mdp"]) &&
    isset($_POST["repetermdp"])
) 
{
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $numTel = $_POST["numTel"];
    $mdp = $_POST["mdp"];
    $repeatpassword = $_POST["repetermdp"];

    if (
        !empty($nom) &&
        !empty($prenom) &&
        !empty($email) &&
        !empty($numTel) &&
        !empty($mdp) &&
        !empty($repeatpassword)
    ) 
    {
        if ($clientC->clientExists($email)) {
            $error = "Cet utilisateur existe déjà. Veuillez utiliser une autre adresse email.";
        } 
        else 
        {
            if (strlen($numTel) >= 8 && is_numeric($numTel)) 
            {
                if (preg_match('/@gmail\.com$/', $email))
                {

                    if ($mdp == $repeatpassword) {
                        // Les mots de passe sont identiques, vous pouvez créer un nouveau client
                        $client = new client(null, $nom, $prenom, $email, $numTel, $mdp);
                        $clientC->addClient($client);
                    } else {
                        $error = "Les mots de passes ne sont pas identiques.";
                    }
                }else {
                    $error = "L'adresse email doit être un compte Gmail (@gmail.com)";
                }
            }else {
                $error = "Le numéro de téléphone doit comporter au moins 8 chiffres";
            }

        }
    }
}
?>
<!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="styleINS.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div id="error" class="error">
        <?php echo $error; ?>
    </div>
    <div class="cadre">
        <form id="formulaireInscription" action="" method="POST">
            <h1>S'inscrire</h1>
            <div class="input-box">
                <div class="input-field">
                    <input type="text" id="nom" name="nom" placeholder="Nom" required minlength="2" maxlength="20">
                    <span id="erreurNom" class="error"></span><br><br>
                    <i class='bx bxs-user' ></i>
                </div>
                <div class="input-field">
                    <input type="text" id="prenom" name="prenom" placeholder="Prénom" required minlength="2" maxlength="20">
                    <span id="erreurPrenom" class="error"></span><br><br>
                    <i class='bx bxs-user' ></i>
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                    <input type="email" id="email" name="email" placeholder="Email" pattern=".+@gmail\.com" required>
                    <span id="erreurEmail" class="error"></span><br><br>
                    <i class='bx bx-envelope'></i>
                </div>
                <div class="input-field">
                    <input type="number" id="numTel" name="numTel" placeholder="Numéro de téléphone" required minlength="7" maxlength="10">
                    <span id="erreurTelephone" class="error"></span><br><br>
                    <i class='bx bxs-phone'></i>
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                    <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required>
                    <span id="erreurMotDePasse" class="error"></span><br><br>
                    <i class='bx bxs-lock'></i>
                </div>
                <div class="input-field">
                    <input type="password" name="repetermdp" id="repetermdp" placeholder="Confirmer mot de passe" required>
                    <i class='bx bxs-lock'></i>
                </div>
            </div>
            <button type="submit" name="submit" class="btn">S'inscrire</button>
        </form>
    </div>
</body>
</html>