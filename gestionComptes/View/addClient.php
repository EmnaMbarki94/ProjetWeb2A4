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
    isset($_POST["repetermdp"])&&
    isset($_POST["rolee"])
) 
{
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $numTel = $_POST["numTel"];
    $mdp = $_POST["mdp"];
    $repeatpassword = $_POST["repetermdp"];
    $rolee = $_POST["rolee"];

    if (
        !empty($nom) &&
        !empty($prenom) &&
        !empty($email) &&
        !empty($numTel) &&
        !empty($mdp) &&
        !empty($repeatpassword)&&
        !empty($rolee)
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
                        $client = new client(null, $nom, $prenom, $email, $numTel, $mdp, $rolee);
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
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><strong>ESPACE UTILISATEUR</strong></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="connectClient.php">Se connecter <span class="sr-only">Se connecter</span></a></li>
        <li  class="active"><a href="addClient.php">S'inscrire</a></li>
        
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Rechercher</button>
      </form>
    </div>
  </div>
</nav>
    <div id="error" class="error">
        <span><?php echo $error; ?></span>
    </div>
    <div class="cadre">
        <form id="formulaireInscription" action="" method="POST" onsubmit="return validerForm();">
            <h1><strong>S'inscrire</strong></h1>
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
                    <input type="number" id="numTel" name="numTel" placeholder="Numéro de téléphone">
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
                
                <label for="role">Rôle :
                    <select name="rolee" id="rolee">
                        <option value="patient">Patient</option>
                        <option value="medecin">Médecin</option>
                        <option value="livreur">Livreur</option>
                    </select>
                </label>
        
            </div>
            <button type="submit" name="submit" class="btn">S'inscrire</button><br></br>
            <div class="link">
                <p><center><a href="addPharmacie.php">Créer une Page </a><strong>pour une pharmacie.</strong></p></center>
            </div>
        </form>
    </div>
    <style>
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        }

        body{
            
            justify-content: center;
            align-items: center;
            min-height:100vh;
            background: #84CB86;
        }
        .error {
            color: red;
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin-top: 5px;
        }
        .cadre{
            width: 750px;
            background: transparent;
            border: 2px solid rgba(255,255,255, .2);
            backdrop-filter: blur(50px);
            box-shadow: 0 0 10px rgba(0,0,0, .2);
            color: #fff;
            border-radius: 10px;
            padding: 40px 35px 55px;
            margin: 50px auto;
        }
        .cadre h1{
            font-size: 36px;
            text-align: center;
            margin-bottom: 20px;
            color:white;
        }
        .cadre .input-box{
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .input-box .input-field{
            position: relative;
            width: 48%;
            height: 50px;
            margin: 13px 0;
        }
        .input-box .input-field input{
            width: 100%;
            height: 100%;
            background: transparent;
            border: 2px solid rgba(255,255,255, .2);
            outline: none;
            font-size: 16px;
            color: #fff;
            border-radius: 6px;
            padding: 15px 15px 15px 40px;
        }
        .input-box .input-field input::placeholder{
            color: #fff;

        }
        .input-box .input-field i{
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }
        .cadre label{
            display: block;
            margin-bottom: 8px;
            padding: 6px; 
            font-weight: bold;
            width: 150px;
            color: #333;
        }
        .cadre label select{
            
            width: 80px;
           
        }
        .cadre .btn {
            width: 100%;
            height: 45px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
        }
        .cadre .lien-inscription{
            font-size: 14px;
            text-align: center;
            margin: 20px 0 15px;
        }
        .lien-inscription p a{
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }.lien-inscription p a:hover{
            text-decoration: underline;
        }
        @media (max-width:576px){
            .input-box .input-field{
                width: 100%;
                margin: 10px 0;
            }
        }
        footer{
          color:white;
          background-color:#fff;
          margin:10px auto;
        }
        footer{
          vertical-align:bottom;
        }
        .socialicons{
          display:flex;
          justify-content: center;
        }
        .socialicons a{
          text-decoration: none;
          padding: 10px;
          background-color:#84CB86;
          margin:10px;
          border-radius: 50%;
        }
        .socialicons a i{
          font-size: 2em;
          color: white;
          opacity: 0.9 ;
        }
        .socialicons a:hover{
          background-color: #fff;
          transition: 0.5s;
        }
        .socialicons a:hover i{
          background-color: grey;
          transition: 0.5s;
        }
        .footerbottom p{
          color:black;
          display: flex;
          justify-content: center;
        }
        .designer{
          opacity:0.7;
          text-transform: uppercase;
          letter-spacing: 1px;
          font-weight: 400;
          margin: 0px 5px;
        }
        footer p a{
          color:black;
        }
    </style>
    <p style="color:red" id="error"></p>
    

<footer>
		<div class="socialicons">
			<a href=""><i class="fa-brands fa-facebook"></i></a>
			<a href=""><i class="fa-brands fa-instagram"></i></a>
			<a href=""><i class="fa-brands fa-twitter"></i></a>
			<a href=""><i class="fa-brands fa-google-plus"></i></a>
			<a href=""><i class="fa-brands fa-youtube"></i></a>
		</div>
		<div class="footerbottom">
			<p>copyright &copy; SPT - 2023-2024 - All rights reserved; Designed by <span class="designer "> SPT GROUP </span>
			</p> 
		</div>
	</footer>
    <script src="addClient.js"></script>
</body>
</html>