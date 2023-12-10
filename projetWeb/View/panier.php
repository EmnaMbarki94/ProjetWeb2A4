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
// Inclure le fichier de la classe MedicamentC
include "../Controller/MedicamentC.php";
// Démarrer la session

//session_destroy();
// Instancier la classe MedicamentC
$medicamentC = new MedicamentC();

// Vérifier si le panier existe dans la session
$panier = isset($_SESSION['panier']) ? $_SESSION['panier'] : [];

// Afficher le contenu du panier (pour le débogage)

// Calculer le total du panier
$totalPanier = 0;
$total_produit=0;

// Vérifier si le panier n'est pas vide
if (!empty($panier)) {
    foreach ($panier as $medicament) {
        // Afficher les détails de chaque médicament dans le panier
        //echo 'Médicament: ' . $medicament['Nom'] . ', Prix: $' . $medicament['Prix'] . ', Quantité: ' . $medicament['Quantite'] . '<br>';
        //$total_produit=($medicament['Prix'] * $medicament['Quantite']);
        // Calculer le total pour chaque médicament et ajouter au total général
    }
    $totalPanier +=$total_produit;

} else {
    // Afficher un message si le panier est vide
    echo 'Le panier est vide.';
}

// Afficher le total du panier
//echo 'Total du panier: $' . $totalPanier;

// Réassigner le panier mis à jour à la session
$_SESSION['panier'] = $panier;
//var_dump($_SESSION['panier']);
//var_dump($totalPanier);

header('validerLigneCommande.php');

//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
?>


<!-- Required meta tags -->
<head>
  <title>SPT &mdash; Panier</title>
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
  
  
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
function supprimerMedicament(id) {
    // Envoi de la requête AJAX pour supprimer le médicament du panier
    $.ajax({
        type: 'GET',
        url: 'SupprimerP.php',
        data: { id: id },
        success: function(response) {
            // Mettez à jour le panier côté client
            // Vous pouvez mettre à jour l'affichage du panier ici si nécessaire
            console.log('Médicament supprimé avec succès!');
        },
        error: function(error) {
            console.error('Erreur lors de la suppression du médicament:', error);
        }
    });
}
</script>


  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <form class="col-md-12" method="post">

          <!-- Tableau pour afficher les médicaments dans le panier -->
          <div class="site-blocks-table">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="product-name">Medicine</th>
                  <th class="product-price">Price</th>
                  <th class="product-quantity">Quantity</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($panier as $medicament) : ?>
                  <?php
                  // Calculer le total par médicament
                  $totalProduit = isset($medicament['Prix']) ? $medicament['Prix'] * $medicament['Quantite'] : 0;
                  $totalPanier += $totalProduit;
                  ?>
                  <tr>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?= isset($medicament['Nom']) ? $medicament['Nom'] : ''; ?></h2>
                    </td>
                    <td><?= isset($medicament['Prix']) ? $medicament['Prix'] : ''; ?></td>
                    <td>
                      <!-- Champ pour la quantité du médicament -->
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center" value="<?= isset($medicament['Quantite']) ? $medicament['Quantite'] : '1'; ?>" placeholder=""
                          aria-label="Example text with a button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                      </div>
                    </td>
                    <td><?= $totalProduit; ?></td>
                    <td>
                      <!-- Bouton pour supprimer le médicament du panier -->
                      <a href="#" class="btn btn-primary height-auto btn-sm" onclick="supprimerMedicament(<?= isset($medicament['id']) ? $medicament['id'] : ''; ?>)">Delete</a>
                  </td>

                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <!-- Section pour modifier le panier -->
          <div class="row">
            <div class="col-md-6">
              <div class="row mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                  <button class="btn btn-primary btn-md btn-block"  name="modifierPanier">Modify cart</button>
                </div>
                <div class="col-md-6">
                  <a href="Magasin.php" class="btn btn-outline-primary btn-md btn-block">Return to store</a>
                </div>
              </div>
            </div>

            <!-- Section pour afficher le total et procéder au paiement -->
            <div class="col-md-6 pl-5">
              <div class="row justify-content-end">
                <div class="col-md-7">
                  <div class="row">
                    <div class="col-md-12 text-right border-bottom mb-5">
                      <h3 class="text-black h4 text-uppercase">Total Purchases</h3>
                    </div>
                  </div>
                  <div class="row mb-5">
                    <div class="col-md-6">
                      <span class="text-black">Total</span>
                    </div>
                    <div class="col-md-6 text-right">
                      <strong class="text-black"><?= $totalPanier; ?></strong>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                    <a href="validerLigneCommande.php" class="btn btn-primary btn-md btn-block">Proceed to payment</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
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
