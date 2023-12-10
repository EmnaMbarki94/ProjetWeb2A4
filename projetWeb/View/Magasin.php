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
// Importations nécessaires
include '../Controller/MedicamentC.php';


// create an instance of the controller
$medicamentC = new MedicamentC();

// retrieve the list of medications
$medicaments = $medicamentC->listMedicaments();

?>


<html lang="en">


<head>
  <title>SPT &mdash; Magasin | Shop</title>
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
              <a href="index.php" class="js-logo-clone"><strong class="text-primary">SPT </strong></a>
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
                  <a href="#">Paramètres</a>
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
            <strong class="text-black">Store</strong>
          </div>
        </div>
      </div>
    </div>

  <div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="row">
                    <?php foreach ($medicaments as $medicament) : ?>
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <a href="addPanier.php?id=<?php echo $medicament['id']; ?>">
                                    <div class="card-body">
                                    <img src="<?php echo $medicament['image']; ?>" alt="<?php echo $medicament['Nom']; ?>" class="img-fluid">
                                        <h2 class="h5 text-black"><?php echo $medicament['Nom']; ?></h2>
                                        <p class="text-muted">Price: <?php echo $medicament['Prix']; ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </form>
        </div>
    </div>
</div>



    </form>
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
