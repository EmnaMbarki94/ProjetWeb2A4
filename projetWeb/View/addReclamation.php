<?php
session_start();
if (! isset($_SESSION['email'])) {
  header("Location: connectClient.php");
  exit;
}
echo "Bienvenue " .$_SESSION['email'];
$email = $_SESSION['email'];
$idClient = $_SESSION['idClient'];
?>
<?php
// Importations bécessaires
include '../Controller/reclamationC.php';
include '../Model/reclamation.php';

$error = "";
$successMessage ="";

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
        $successMessage = "reclamation bien envoyé";
           // Added JavaScript code to display success message and hide it after 3 seconds
        echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            var successMessage = document.getElementById("successMessage");
            successMessage.textContent = "' . $successMessage . '";
            successMessage.style.display = "block";

            setTimeout(function() {
                successMessage.style.display = "none";
            }, 3000);
        });
        </script>';

        //header('Location:listReclamation.php');
    } else
        $error = "Missing information";
}


?>
<style>
    body{
    background: #84CB86;
}

.contactform{
    padding: 75px 50px;
    background: #fff;
    box-shadow: 5px 15px 50px rgba(0,0,0, 0.8);
    max-width: 500px;
    margin-top: 50px;
    justify-content: center;
    align-items: center;
    margin-left: 30%;
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
    background: #50b667;
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

    .success-bow {
        position: fixed;
        bottom: 20px; /* Adjust the distance from the bottom as needed */
        left: 50%;
        transform: translateX(-50%);
        background-color: #28a745;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        z-index: 9999;
        display: none;
    }

</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SPT &mdash; Colorlib Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="templateF/fonts/icomoon/style.css">

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

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Livraison </title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="templateF/fonts/icomoon/style.css">

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
              <a href="index.php" class="js-logo-clone"><strong class="text-primary">SPT </strong></a>
            </div>
          </div>
    <div class="main-nav d-none d-lg-block">
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <ul class="site-menu js-clone-nav d-none d-lg-block">
          <li ><a href="index.php">Home</a></li>
          <li><a href="Magasin.php">Store</a></li>
          <li><a href="about.php">Blog</a></li>
          <li  class="has-children">
            <a href="#">Consultations</a>
            <ul class="dropdown">
              <li><a class="active" href="add_consultation.php">Add consultation</a></li>
              <li><a class="active" href="listCFront.php">List consultation</a></li> 
          </li>
        </ul>
        <li class="has-children">
            <a href="#">Donation</a>
            <ul class="dropdown">
              <li><a class="active" href="addDon.php">Donate</a></li>
          </li>
        </ul>
        </li>
        
        </li>
        <li class="has-children">
            <a href="#">Reclamation</a>
            <ul class="dropdown">
            <li><a class="active" href="addReclamation.php">Make a complaint</a></li>
            <li><a class="active" href="listReponseF.php">List Responses</a></li>
          </li>
        </ul>
          </li>
          <li class="has-children">
            <a href="#">Settings</a>
            <ul class="dropdown">
              <li><a class="active" href="deconnexion.php">Deconnexion</a></li>
              <li><a class="active" href="editProfile.php">Edit profil</a></li>
             
         
        
      </nav>
    </div>
    <div class="icons">
      <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
      <a href="panier.php" class="icons-btn d-inline-block bag">
        <span class="icon-shopping-bag"></span>
        <span class="number">3</span>
      </a>
      <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
          class="icon-menu"></span></a>
    </div>
  </div>
</div>
</div>
<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="index.php">Home</a> <span class="mx-2 mb-0">/</span><strong class="text-black">Make a complaints</strong>
          </div>
        </div>
      </div>
    </div>

    <hr>


<div class="success-bow" id="successMessage"></div>
  <div id="error" class="error">
    <?php echo $error;?>
  </div>
<form action="" method="POST" onsubmit="return validateForm()">
    <section class="contact" id="contact">
        <div class="contactform">
            <h3>Send a message</h3>
            <div class="inputboite">
                <input type="text" name="nom" id="nom" placeholder="name">
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
                <input type="submit" value="Send">
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
    <footer class="site-footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">

            <div class="block-7">
              <h3 class="footer-heading mb-4">About <strong class="text-primary">SPT </strong></h3>
              <p >Welcome to SPT Your Trusted Healthcare Hub
              At SPT, we are more than just a website 
              we are your dedicated health companion. SPT stands for
                [Santé pour tous in french], embodying our commitment to providing a Seamless, 
                Personalized, and Trustworthy healthcare experience.</p>
            </div>

          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Navigation</h3>
            <ul class="list-unstyled">
              <li><a href="#">Shop</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Reclamation</a></li>
              <li><a href="#">Consultation</a></li>
            </ul>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                <li class="phone"><a href="tel://21621022633">+216 21 022 633</a></li>
                <li class="email">SPT@gmail.com</li>
              </ul>
            </div>


          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank"
                class="text-primary"> To SPT</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>

        </div>
      </div>
    </footer>
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