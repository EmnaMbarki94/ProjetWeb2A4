<?php
// Import necessary files
include '../Controller/LivraisonC.php';
include '../model/Livraison.php';

$error = "";

// create delivery
$livraison = null;

// create an instance of the controller
$livraisonC = new LivraisonC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set and not empty
    if (
        isset($_POST["nom"]) &&
        isset($_POST["destination"]) &&
        isset($_POST["numero_tele"]) &&
        isset($_POST["etat_livraison"])
    ) {
        if (
            !empty($_POST['nom']) &&
            !empty($_POST["destination"]) &&
            !empty($_POST["numero_tele"]) &&
            !empty($_POST["etat_livraison"])
        ) {
            // Sanitize user input
            $nom = htmlspecialchars($_POST['nom']);
            $destination = htmlspecialchars($_POST['destination']);
            $numero_tele = htmlspecialchars($_POST['numero_tele']);
            $etat_livraison = htmlspecialchars($_POST['etat_livraison']);

            // Create a new delivery
            $livraison = new Livraison(null, $nom, $destination, $numero_tele, $etat_livraison);

            // Add the delivery to the database
            $livraisonC->addLivraison($livraison);

            // Redirect to the listlivraison.php page
            header('Location: listlivraison.php');
            exit();
        } else {
            $error = "Missing information";
        }
    }
}
?>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Livraison </title>
</head>
    

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="front/fonts/icomoon/style.css">

  <link rel="stylesheet" href="front\pharmative-master/css/bootstrap.min.css">
  <link rel="stylesheet" href="front\pharmative-master/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="front\pharmative-master/css/magnific-popup.css">
  <link rel="stylesheet" href="front\pharmative-master/css/jquery-ui.css">
  <link rel="stylesheet" href="front\pharmative-master/css/owl.carousel.min.css">
  <link rel="stylesheet" href="front\pharmative-master/css/owl.theme.default.min.css">


  
<body>
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
         <div class="site-navbar py-2">



<div class="container">
<div class="d-flex align-items-center justify-content-between">
<div class="logo">
  <div class="site-logo">
    <a href="index.html" class="js-logo-clone"><strong class="text-primary">SPT</strong></a>
  </div>
</div>
"<div class="main-nav d-none d-lg-block">"
  <nav class="site-navigation text-right text-md-center" role="navigation">
    <ul class="site-menu js-clone-nav d-none d-lg-block">
      <li class="active"><a href="index.html">Home</a></li>
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
      <li><a href="addDon.php">don</a></li>
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

    <a href="listlivraison.php">Back to list</a>
    <hr>

    <div id="error" style="color: red;">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" required />
                </td>
            </tr>
            <tr>
                <td><label for="destination">Destination :</label></td>
                <td>
                    <input type="text" id="destination" name="destination" required />
                </td>
            </tr>
            <tr>
                <td><label for="numero_tele">Numéro de téléphone :</label></td>
                <td>
                    <input type="text" id="numero_tele" name="numero_tele" required />
                </td>
            </tr>
            <tr>
                <td><label for="etat_livraison">État de livraison :</label></td>
                <td>
                    <input type="text" id="etat_livraison" name="etat_livraison" required />
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
</body>
<footer class="site-footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">

            <div class="block-7">
              <h3 class="footer-heading mb-4">About <strong class="text-primary">SPT</strong></h3>
              <p> c'est une platforme pharmacetique qui vend des medicament et collecte des don et prend en charge la livraison des don ainsi que les commandes  .</p>
            </div>

          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Navigation</h3>
            <ul class="list-unstyled">
              <li><a href="#"> medicaments </a></li>
              <li><a href="#">dons</a></li>
              <li><a href="#">Diet &amp; Nutrition</a></li>
              <li><a href="#">Tea &amp; Coffee</a></li>
            </ul>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address"> Esprit, ariana Tunis </li>
                <li class="phone"><a href="tel://92455883">+216 92455883</a></li>
                <li class="email">emailaddress@domain.com</li>
              </ul>
            </div>


          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made
              with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank"
                class="text-primary">Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>

        </div>
      </div>
    </footer>
    <script src="front/pharmative-master/js/jquery-3.3.1.min.js"></script>
  <script src="front/pharmative-master/js/jquery-ui.js"></script>
  <script src="front/pharmative-master/js/popper.min.js"></script>
  <script src="front/pharmative-master/js/bootstrap.min.js"></script>
  <script src="front/pharmative-master/js/owl.carousel.min.js"></script>
  <script src="front/pharmative-masterjs/jquery.magnific-popup.min.js"></script>
  <script src="front/pharmative-master/js/aos.js"></script>
</html>

