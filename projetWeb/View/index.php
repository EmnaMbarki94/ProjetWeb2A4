
<?php
include '../Controller/MedicamentC.php';
session_start();
if (! isset($_SESSION['email'])) {
  header("Location: connectClient.php");
  exit;
}
echo "Bienvenue " .$_SESSION['email'];
$email = $_SESSION['email'];

$medicamentC = new MedicamentC();

// retrieve the list of medications
$medicaments = $medicamentC->listMedicaments();
?>
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
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="Magasin.php">Store</a></li>
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
  

    <div class="owl-carousel owl-single px-0">
          <div class="site-blocks-cover overlay" style="background-image: url('consultation/template/images/spt.png');">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 mx-auto align-self-center">
                  <div class="site-block-cover-content text-center">
                    <h1 class="mb-0"><strong class="text-primary">SPT</strong> Opens 24 Hours</h1>
    
                    <div class="row justify-content-center mb-5">
                      <div class="col-lg-6 text-center">
                        <p>"Experience the impact a consultation can make. Book yours now for personalized advice and solutions tailored to your needs."</p>
                      </div>
                    </div>
                    
                    <p><a href="consultation/add_consultation.php" class="btn btn-primary px-5 py-3">Demande une consultation</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="owl-carousel owl-single px-0">
          <div class="site-blocks-cover overlay" style="background-image: url('consultation/template/images/spt.png');">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 mx-auto align-self-center">
                  <div class="site-block-cover-content text-center">
                    <h1 class="mb-0"><strong class="text-primary">Explore</strong> Our Blog</h1>
    
                    <div class="row justify-content-center mb-5">
                      <div class="col-lg-6 text-center">
                        <p>"Explore our blog for a wealth of health insights, wellness tips, and the latest updates. Your journey to a healthier and more informed lifestyle starts here."</p>
                      </div>
                    </div>
                    
                    <p><a href="about.php" class="btn btn-primary px-5 py-3">Blogs</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="site-blocks-cover overlay" style="background-image: url('templateF/images/hero_bg_2.jpg');">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 mx-auto align-self-center">
              <div class="site-block-cover-content text-center">
                <h1 class="mb-0">SANTE <strong class="text-primary">POUR TOUS!</strong></h1>
                <div class="row justify-content-center mb-5">
                  <div class="col-lg-6 text-center">
                    <p>"A small gesture can brighten entire lives. In the river of generosity, every drop matters. Let's create a shower of kindness together, one donation at a time, to nurture the gardens of hope."</p>
                  </div>
                </div>
                <p><a href="addDon.php" class="btn btn-primary px-5 py-3">faites un don</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
      

    </div>

    



    <div class="site-section py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="feature">
              <span class="wrap-icon flaticon-24-hours-drugs-delivery"></span>
              <h3><a href="#">Free Delivery</a></h3>
              <p>Experience the convenience of free delivery. .</p>
              <p><a href="#" class="d-flex align-items-center"><span class="mr-2">Learn more</span> <span class="icon-keyboard_arrow_right"></span></a></p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="feature">
              <span class="wrap-icon flaticon-medicine"></span>
              <h3><a href="#">New Medicine Everyday</a></h3>
              <p>Discover innovation in healthcare with new medicines every day..</p>
              <p><a href="#" class="d-flex align-items-center"><span class="mr-2">Learn more</span> <span class="icon-keyboard_arrow_right"></span></a></p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="feature">
              <span class="wrap-icon flaticon-test-tubes"></span>
              <h3><a href="#">Medicines Guaranteed</a></h3>
              <p>Reliable healthcare starts with guaranteed medicines. </p>
              <p><a href="#" class="d-flex align-items-center"><span class="mr-2">Learn more</span> <span class="icon-keyboard_arrow_right"></span></a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    <div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="title-section text-center col-12">
                <h2>Pharmacy <strong class="text-primary">Products</strong></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 block-3 products-wrap">
                <div class="nonloop-block-3 owl-carousel">

                    <?php foreach ($medicaments as $medicament) : ?>
                        <div class="text-center item mb-4 item-v2">
                            

                            <a href="addPanier.php?id=<?php echo $medicament['id']; ?>">
                                <img src="<?php echo $medicament['image']; ?>" alt="<?php echo $medicament['Nom']; ?>">
                            </a>

                            <h3 class="text-dark"><a href="addPanier.php?id=<?php echo $medicament['id']; ?>"><?php echo $medicament['Nom']; ?></a></h3>
                            <p class="price">$<?php echo $medicament['Prix']; ?></p>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>


    <div class="site-section bg-image overlay" style="background-image: url('templateF/images/hero_bg_2.jpg');">
      <div class="container">
        <div class="row justify-content-center text-center">
         <div class="col-lg-7">
           <h3 class="text-white">Sign up for discount up to 55% OFF</h3>
           <p class="mb-0"><a href="addClient.php" class="btn btn-outline-white">Sign up</a></p>
         </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        
        <div class="row justify-content-between">
          <div class="col-lg-6">
            <div class="title-section">
              <h2>Happy <strong class="text-primary">Customers</strong></h2>
            </div>
            <div class="block-3 products-wrap">
            <div class="owl-single no-direction owl-carousel">
        
              <div class="testimony">
                <blockquote>
                  <img src="templateF/images/person_1.jpg" alt="Image" class="img-fluid">
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat unde.&rdquo;</p>
                </blockquote>

                <p class="author">&mdash; Kelly Holmes</p>
              </div>
        
              <div class="testimony">
                <blockquote>
                  <img src="templateF/images/person_2.jpg" alt="Image" class="img-fluid">
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                    unde.&rdquo;</p>
                </blockquote>
              
                <p class="author">&mdash; Rebecca Morando</p>
              </div>
        
              <div class="testimony">
                <blockquote>
                  <img src="templateF/images/person_3.jpg" alt="Image" class="img-fluid">
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                    unde.&rdquo;</p>
                </blockquote>
              
                <p class="author">&mdash; Lucas Gallone</p>
              </div>
        
              <div class="testimony">
                <blockquote>
                  <img src="templateF/images/person_4.jpg" alt="Image" class="img-fluid">
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                    unde.&rdquo;</p>
                </blockquote>
              
                <p class="author">&mdash; Andrew Neel</p>
              </div>
        
            </div>
          </div>
          </div>
          <div class="col-lg-5">
            <div class="title-section">
              <h2 class="mb-5">Why <strong class="text-primary">Us</strong></h2>
              
              <blockquote>
              <div class="step-number d-flex mb-4">
                <span>1</span>
                <p>"Access quality medications at your fingertips with our user-friendly online pharmacy, ensuring health and wellness are just a click away."</p>
              </div>
              </blockquote>
              <blockquote>
              <div class="step-number d-flex mb-4">
                <span>2</span>
                <p>Empower change in healthcare. Your generous donations directly benefit those in need, supporting our mission to deliver accessible and affordable services to all."</p>
              </div>
              </blockquote>
              <blockquote>
              <div class="step-number d-flex mb-4">
                <span>3</span>
                <p>"Expert advice is just a consultation away. Our dedicated team is ready to address your health concerns and provide personalized guidance for your well-being."</p>
              </div>
              </blockquote>
              <blockquote>
              <div class="step-number d-flex mb-4">
                <span>4</span>
                <p>"Effortless and reliable – experience the convenience of doorstep delivery. Your health essentials, delivered with care and precision, right to your door."</p>
              </div>
              </blockquote>
              
            </div>
          </div>
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
  </div>

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