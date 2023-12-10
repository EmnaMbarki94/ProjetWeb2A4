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
include '../Controller/reponseC.php';

$c = new reponseC();
$tab = $c->listReponse();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SPT &mdash; Colorlib Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link  href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="template/fonts/icomoon/style.css">

  <link rel="stylesheet" href="template/css/bootstrap.min.css">
  <link rel="stylesheet" href="template/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="template/css/magnific-popup.css">
  <link rel="stylesheet" href="template/css/jquery-ui.css">
  <link rel="stylesheet" href="template/css/owl.carousel.min.css">
  <link rel="stylesheet" href="template/css/owl.theme.default.min.css">


  <link rel="stylesheet" href="template/css/aos.css">

  <link rel="stylesheet" href="template/css/style.css">





    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Médecin</title>
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
    <style>
        body {
            background-color: #E8F5E9;
            font-family: Arial, sans-serif;
            margin: 0px;
            padding: 0;
        }
        h1 {
            color: #388E3C;
        }
        table {
            width: 80%;
            margin: 50px 80px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #AAA;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #388E3C;
            color: #FFF;
        }
        tr:nth-child(even) {
            background-color: #FFF;
        }
        tr:nth-child(odd) {
            background-color: #E8F5E9;
        }
   
    
   
    .star {
      font-size: 1.5rem;
    }
    .hover {
    color: rgb(255, 196, 0);
  }
    
      </style>
      
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
          <li class="has-children">
            <a href="#">Settings</a>
            <ul class="dropdown">
              <li><a class="active" href="deconnexion.php">Deconnexion</a></li>
              <li><a class="active" href="editProfile.php">Edit profil</a></li>
              
             
          </li>
         
        
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
            <strong class="text-black">List Responses</strong>
          </div>
        </div>
      </div>
    </div>

    <table border="1" align="center" width="70%">
    <tr>
        <th>Id reponse</th>
        <th>Reponse</th>
        <th>Id reclamation</th>
    </tr>


    <?php
    foreach ($tab as $reponse) {
    ?>

        <tr>
            <td><?= $reponse['id']; ?></td>
            <td><?= $reponse['response']; ?></td>
            <td><?= $reponse['idreclamation']; ?></td>
            
        </tr>
    <?php
    }
    ?>
    </table>
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
  

    
  <script src="add_consu.js"></script>
  <script src="template/js/jquery-3.3.1.min.js"></script>
  <script src="template/js/jquery-ui.js"></script>
  <script src="template/js/popper.min.js"></script>
  <script src="template/js/bootstrap.min.js"></script>
  <script src="template/js/owl.carousel.min.js"></script>
  <script src="template/js/jquery.magnific-popup.min.js"></script>
  <script src="template/js/aos.js"></script>

  

</body>

   
  
</html>