<?php
// Import necessary files
include '../Controller/DonC.php';
include '../model/don.php'; // Assuming you have a Don class

$error = "";

// create donation
$don = null;

// create an instance of the controller
$donC = new DonC();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if(
    isset($_POST["destination"]) &&
    isset($_POST["nom_donneur"]) &&
    isset($_POST["type"])
  )

    
 {
    if (
        !empty($_POST['destination']) &&
        !empty($_POST["nom_donneur"]) &&
        !empty($_POST["type"])
    ) {
      $destination = htmlspecialchars($_POST['destination']);
      $nom_donneur = htmlspecialchars($_POST['nom_donneur']);
      $type = htmlspecialchars($_POST['type']);

        $don = new Don(
            null,
            $_POST['destination'],
            $_POST['nom_donneur'],
            $_POST['type']
        );

        $donC->addDon($don);
        header('Location: listdon.php'); // Assuming you have a listDons.php page
        exit();
    } else {
        $error = "Missing information ";
    }
}
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Donation </title>
  
    <link rel="stylesheet" href="front/pharmative-master/css/bootstrap.min.css">
 

  <link rel="stylesheet" href="front/pharmative-master/css/aos.css">

  <link rel="stylesheet" href="front/pharmative-master/css/style.css">





    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>don</title>
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
    </head>

<body>
<div class="site-wrap">.
03

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
          <a href="index2.html" class="js-logo-clone"><strong class="text-primary">SPT</strong> santé pour tous</a>
        </div>
      </div>
      <div class="main-nav d-none d-lg-block">
        <nav class="site-navigation text-right text-md-center" role="navigation">
          <ul class="site-menu js-clone-nav d-none d-lg-block">
            <li ><a href="index2.html">Home</a></li>
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
            
            <li class="active"><a href="addDon.php">donner</a></li>
            <li ><a href="addDon.php">ADMIN</a></li>
            
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

</head>
<script>
    function validateDonationForm() {
        var destination = document.getElementById('destination').value;
        var nomDonneur = document.getElementById('nom_donneur').value;
        var type = document.getElementById('type').value;
        var errorMessage = '';

        if (destination.trim() === '') {
            errorMessage += 'La destination est requise.\n';
        }
        if (nomDonneur.trim() === '') {
            errorMessage += 'Le nom du donneur est requis.\n';
        }
        if (type.trim() === '') {
            errorMessage += 'Le type est requis.\n';
        } else if (type.length < 3) {
            errorMessage += 'Le type doit avoir au moins 3 caractères.\n';
        }

        if (errorMessage !== '') {
            alert(errorMessage);
            return false; // Empêche l'envoi du formulaire
        } else {
            return true; // Permet l'envoi du formulaire
        }
    }
</script>

<body>
    <a href="listdon.php">Back to list</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
    

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="destination">Destination :</label></td>
                <td>
                    <input type="text" id="destination" name="destination" />
                    <span id="erreurDestination" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="nom_donneur">Nom Donneur :</label></td>
                <td>
                    <input type="text" id="nom_donneur" name="nom_donneur" />
                    <span id="erreurNomDonneur" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="type">Type :</label></td>
                <td>
                    <input type="text" id="type" name="type" />
                    <span id="erreurType" style="color: red"></span>
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

      
    </form>
    </script>
     <footer class="site-footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">

            <div class="block-7">
              <h3 class="footer-heading mb-4">About <strong class="text-primary">Pharmative</strong></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae reiciendis distinctio voluptates
                sed dolorum excepturi iure eaque, aut unde.</p>
            </div>

          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Navigation</h3>
            <ul class="list-unstyled">
              <li><a href="#">Supplements</a></li>
              <li><a href="#">Vitamins</a></li>
              <li><a href="#">Diet &amp; Nutrition</a></li>
              <li><a href="#">Tea &amp; Coffee</a></li>
            </ul>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
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
</body>
<script src="front/pharmative-master/js/jquery-3.3.1.min.js"></script>
  <script src="front/pharmative-master/js/jquery-ui.js"></script>
  <script src="front/pharmative-master/js/popper.min.js"></script>
  <script src="front/pharmative-master/js/bootstrap.min.js"></script>
  <script src="front/pharmative-master/js/owl.carousel.min.js"></script>
  <script src="front/pharmative-masterjs/jquery.magnific-popup.min.js"></script>
  <script src="front/pharmative-master/js/aos.js"></script>
</html>
