<?php
session_start();
if (! isset($_SESSION['email'])) {
  header("Location: connectClient.php");
  exit;
}
echo "Bienvenue " .$_SESSION['email'].  $_SESSION['idClient'];
$email = $_SESSION['email'];
$idClient = $_SESSION['idClient'];
?>
<?php
include '../Controller/LigneCommandeC.php';
include '../Model/LigneCommandeM.php';

// Créer une instance du contrôleur
$LignecommandeC = new LigneCommandeC();

// Démarrer la session


// Vérifier si le panier existe dans la session
$panier = isset($_SESSION['panier']) ? $_SESSION['panier'] : [];

// ... Autres opérations liées à la validation de la commande ...

// Calculer le total du panier
$totalPanier = 0;

// Vérifier si le panier n'est pas vide
if (!empty($panier)) {
    foreach ($panier as $medicament) {
        $totalPanier += ($medicament['Prix'] * $medicament['Quantite']);
    }
}
$idC=0;
$idC=$LignecommandeC->addCommande($totalPanier,$idClient);
// Insertion des données dans la table commande
foreach ($panier as $medicament) {
    //$id=$id;
    $idM = $medicament['id'];  // En supposant que 'id' est la clé correcte dans votre tableau
    $Nom = $medicament['Nom'];
    $Prix = $medicament['Prix'];
    $Quantite = $medicament['Quantite'];
    $total = $Prix * $Quantite;

    
    // Créer une nouvelle instance de Commande en utilisant les propriétés correctes
    $Lignecommande = new LigneCommande(null, $idM,$idC, $Quantite, $total,$idClient);
    
    // Utilisation de la requête SQL pour insérer les données dans la table
    $LignecommandeC->addLigneCommande($Lignecommande);
  
     
    //var_dump($commandeC);
}

// Vider le panier après la validation de la commande
unset($_SESSION['panier']);

// Rediriger vers la page de la liste des commandes
//header('Location: listCommande.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>SPT &mdash; Paiement</title>
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

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.php" class="js-logo-clone"><strong class="text-primary">SPT </strong>SANTé POUR TOUS</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li ><a href="index.php">Home</a></li>
                <li class="active"><a href="Magasin.php">Store</a></li>
                <li><a href="about.php">blog</a></li>
                <li class="has-children">
                  <a href="#">consultations</a>
                  <ul class="dropdown">
                    <li><a class="active" href="add_consultation.php">Add consultation</a></li>
                    <li><a class="active" href="listCFront.php">list consultation</a></li> 
                </li>
              </ul>
              <li class="has-children">
                  <a href="#">Donation</a>
                  <ul class="dropdown">
                    <li><a class="active" href="addDon.php">Donate</a></li>
                </li>
              </ul>
              
              <li class="has-children">
                  <a href="#">Reclamation</a>
                  <ul class="dropdown">
                    <li><a class="active" href="addReclamation.php">Make a complaint</a></li>
                    <li><a class="active" href="listReponseF.php">List responses</a></li>
                </li>
                </ul>
              
                <li class="has-children">
                  <a href="#">Settings</a>
                  <ul class="dropdown">
                    <li><a class="active" href="deconnexion.php">Deconnexion</a></li>
                    <li><a class="active" href="editProfile.php">Edit profil</a></li>
                  
                       
                </li>
                </ul>
              
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
        <a href="index.php">Home</a> <span class="mx-2 mb-0">/</span>
        <strong class="text-black">Checkout</strong>
      </div>
    </div>
  </div>
</div>
<div class="site-section">
<div class="row mb-5">
    <div class="col-md-12">
        <h2 class="h3 mb-3 text-black">My order</h2>
        <div class="p-3 p-lg-5 border">
            <table class="table site-block-order-table mb-5">
                <thead>
                    <th>medicines</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                </thead>
                <tbody>
                    <?php foreach ($panier as $medicament) : ?>
                        <tr>
                            <td><?= isset($medicament['Nom']) ? $medicament['Nom'] : ''; ?></td>
                            <td><?= isset($medicament['Quantite']) ? $medicament['Quantite'] : ''; ?></td>
                            <td>$<?= isset($medicament['Prix']) ? $medicament['Prix'] : ''; ?></td>
                            <td>$<?= isset($medicament['Prix']) && isset($medicament['Quantite']) ? $medicament['Prix'] * $medicament['Quantite'] : ''; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td class="text-black font-weight-bold" colspan="3"><strong>Total Order</strong></td>
                        <td class="text-black font-weight-bold"><strong>$<?= $totalPanier; ?></strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


            <div class="payment-methods">
                <div class="border mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button"
                            aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

                    <div class="collapse" id="collapsebank">
                        <div class="py-2 px-4">
                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as
                                the payment reference. Your order won’t be shipped until the funds have cleared in our
                                account.</p>
                        </div>
                    </div>
                </div>

                <div class="payment-methods" align="center">
                <h3>Choose payment method :</h3>
                
                <!-- Set up a container element for the button with the added class -->
                <div id="paypal-button-container"></div>
                <script src="https://www.paypal.com/sdk/js?client-id=AVj4Kyvq6hDj2Xx9jjxaTqFCdt1m3Y8PPMUB6UfjtyI24uU_SuxPqiqhGHiRSX40MQvcvzZu1C0WgXDS&currency=USD"></script>
                <script src="paypal.js" data-variable="<?php echo $totalPanier; ?>"></script>



              </div>
        
            <div class="form-group">
                <button class="btn btn-primary btn-lg btn-block" onclick="window.location='addLivraison.php'">Add Livraison</button>
            </div>
        </div>
    </div>
    
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
  <script src="templatefront/js/jquery-3.3.1.min.js"></script>
  <script src="templatefront/js/jquery-ui.js"></script>
  <script src="templatefront/js/jquery-ui.js"></script>
  <script src="templatefront/js/popper.min.js"></script>
  <script src="templatefront/js/bootstrap.min.js"></script>
  <script src="templatefront/js/owl.carousel.min.js"></script>
  <script src="templatefront/js/jquery.magnific-popup.min.js"></script>
  <script src="templatefront/js/aos.js"></script>

  <script src="templatefront/js/main.js"></script>


</body>

</html>