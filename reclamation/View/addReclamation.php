<?php
// Importations bécessaires
include '../Controller/reclamationC.php';
include '../Model/reclamation.php';

$error = "";

// create client
$reclamation = null;

// create an instance of the controller
$reclamationC = new reclamationC();

if (
    isset($_POST["nom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["msg"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["email"]) &&
        !empty($_POST["msg"])
    ) {
        $reclamation = new reclamation(
            null,
            $_POST['nom'],
            $_POST['email'],
            $_POST['msg']
        );

        $reclamationC->addReclamation($reclamation);
        header('Location:listReclamation.php');
    } else
        $error = "Missing information";
}


?>
<style>
  body{
    background: #84CB86;
}
.contact{
    
    background-size: cover;
    box-shadow: 2px 2px 12px rgba(0,0,0, 0.8);
    width: 100%;
    background-position: unset;
}

.contactform{
    padding: 75px 50px;
    background: #fff;
    box-shadow: 5px 15px 50px rgba(0,0,0, 0.8);
    max-width: 500px;
    margin-top: 50px;
    justify-content: center;
    align-items: center;
    margin-left: 38%;
}

.contactform .inputboite{
    position: relative;
    width: 100%;
    margin-bottom: 20px;
}

.contactform h3{
    color: #111;
    font-size: 1.2em;
    margin-bottom: 20px;
}

.contactform .inputboite input,
.contactform .inputboite textarea{
    width: 100%;
    border: 1px solid #555;
    padding: 10px;
    color: #111;
    outline: none;
    font-size: 16px;
    font-weight: 300;
    resize: none;
}

.contactform .inputboite input[type="submit"]{
    font-size: 1em;
    font-weight: 700;
    color: #ffff;
    background: #fb911f;
    display: inline-block;
    cursor: pointer;
    text-transform: uppercase;
    text-decoration: none;
    letter-spacing: 2px;
    outline: none;
    border: none;
    transition: 0.5s;
    max-width: 120px;
    align-items: center;
    justify-content: center;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Pharmative &mdash; Colorlib Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="Front/front/css/bootstrap.min.css">
  <link rel="stylesheet" href="Front/front/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="Front/front/css/magnific-popup.css">
  <link rel="stylesheet" href="Front/front/css/jquery-ui.css">
  <link rel="stylesheet" href="Front/front/css/owl.carousel.min.css">
  <link rel="stylesheet" href="Front/front/css/owl.theme.default.min.css">


  <link rel="stylesheet" href="Front/front/css/aos.css">

  <link rel="stylesheet" href="Front/front/css/style.css">
    
</head>
<body>
<div class="site-wrap">


<div class="site-navbar py-2">

  <div class="search-wrap">
    <div class="container">
      <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
      <form action="#" method="post">
        <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
      </form>
    </div>
  </div>

  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <div class="logo">
        <div class="site-logo">
          <a href="index.html" class="js-logo-clone"><strong class="text-primary">Pharma</strong>tive</a>
        </div>
      </div>
      <div class="main-nav d-none d-lg-block">
        <nav class="site-navigation text-right text-md-center" role="navigation">
          <ul class="site-menu js-clone-nav d-none d-lg-block">
            <li ><a href="index.html">Home</a></li>
            <li><a href="shop.html">Store</a></li>
            <li class="has-children">
              <a href="#">Products</a>
              <ul class="dropdown">
                <li><a href="#">Supplements</a></li>
                <li class="has-children">
                  <a href="#">Vitamins</a>
                  <ul class="dropdown">
                    <li><a href="#">Supplements</a></li>
                    <li><a href="#">Vitamins</a></li>
                    <li><a href="#">Diet &amp; Nutrition</a></li>
                    <li><a href="#">Tea &amp; Coffee</a></li>
                  </ul>
                </li>
                <li><a href="#">Diet &amp; Nutrition</a></li>
                <li><a href="#">Tea &amp; Coffee</a></li>
                
              </ul>
            </li>
            <li><a href="about.html">About</a></li>
            <li class="active"><a href="listReponse copy.php">reclamation</a></li>
          </ul>
        </nav>
      </div>
      <div class="icons">
        <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
        <a href="cart.html" class="icons-btn d-inline-block bag">
          <span class="icon-shopping-bag"></span>
          <span class="number">2</span>
        </a>
        <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
            class="icon-menu"></span></a>
      </div>
    </div>
  </div>
</div>

  <div id="error" class="error">
    <?php echo $error;?>
  </div>
<form action="" method="POST" onsubmit="return validateForm()">
    <section class="contact" id="contact">
        <div class="contactform">
            <h3>Envoyer un message</h3>
            <div class="inputboite">
                <input type="text" name="nom" id="nom" placeholder="nom">
                <span class="error-message" id="error-nom"></span>
            </div>
            <div class="inputboite">

               <input type="text" name="email" id="email" placeholder="email">
               <span class="error-message" id="error-email"></span>
            </div>
            <div class="inputboite">
               <input type="text" name="msg" id="msg" placeholder="msg"></textarea>
               <span class="error-message" id="error-msg"></span>
            </div>
            <div class="inputboite">
                <input type="submit" value="envoyer">
            </div>
        </div>
    </section>
</form> 

<script>
        function validateForm() {
            var nomInput = document.getElementById('nom');
            var emailInput = document.getElementById('email');
            var msgInput = document.getElementById('msg');
            var errorNom = document.getElementById('error-nom');
            var errorEmail = document.getElementById('error-email');
            var errorMsg = document.getElementById('error-msg');

            // Vérifiez si le champ "nom" a au moins 2 caractères
            if (nomInput.value.trim().length < 2) {
                errorNom.textContent = 'Le champ "nom" doit avoir au moins 2 caractères.';
                return false; // Empêche l'envoi du formulaire
            } else {
                errorNom.textContent = ''; // Réinitialise le message d'erreur
            }

            // Vérifiez si le champ "email" est valide (contient un @)
            if (!emailInput.value.includes('@')) {
                errorEmail.textContent = 'Le champ "email" doit contenir un @.';
                return false; // Empêche l'envoi du formulaire
            } else {
                errorEmail.textContent = ''; // Réinitialise le message d'erreur
            }

            // Vérifiez si le champ "msg" n'est pas vide
            if (msgInput.value.trim() === '') {
                errorMsg.textContent = 'Le champ "msg" ne peut pas être vide.';
                return false; // Empêche l'envoi du formulaire
            } else {
                errorMsg.textContent = ''; // Réinitialise le message d'erreur
            }

            // Ajoutez d'autres validations si nécessaire

            return true; // Autorise l'envoi du formulaire
        }
    </script>
    <script src="Front/front/js/jquery-3.3.1.min.js"></script>
  <script src="Front/front/js/jquery-ui.js"></script>
  <script src="Front/front/js/popper.min.js"></script>
  <script src="Front/front/js/bootstrap.min.js"></script>
  <script src="Front/front/js/owl.carousel.min.js"></script>
  <script src="Front/front/js/jquery.magnific-popup.min.js"></script>
  <script src="Front/front/js/aos.js"></script>

  <script src="Front/front/js/main.js"></script>
</body>
</html>