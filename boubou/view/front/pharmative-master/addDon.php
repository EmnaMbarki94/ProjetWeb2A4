<!DOCTYPE html>
<html>
<head>
    <title>Add a donnation</title>
    <link rel="stylesheet" href="style.css">
   
    <link rel="stylesheet" href="bootstrap.min.css">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">
    

    <script>
        function validateForm() {
            var codeD = document.getElementById('codeD').value;
            var destination = document.getElementById('destination').value;
            var typeD = document.getElementById('typeD').value;
            var nom_donneur = document.getElementById('nom_donneur').value;

            var errorMessage = '';

            if (codeD.trim() === '') {
                errorMessage += 'Le codeD est requis.\n';
            }

            if (destination.trim() === '') {
                errorMessage += 'La destination est requise.\n';
            }

            if (typeD.trim() === '') {
                errorMessage += 'Le typeD est requis.\n';
            }

            if (nom_donneur.trim() === '') {
                errorMessage += 'Le nom du donneur est requis.\n';
            }
            else if (nom_donneur.length < 3) {
                errorMessage += 'Le nom du donneur doit avoir au moins 3 caractères.\n';
            }

            if (errorMessage !== '') {
                alert(errorMessage);
                return false; // Empêche l'envoi du formulaire
            } else {
                return true; // Permet l'envoi du formulaire
            }
        }
    </script>
</head>
<body>
    <style>
        h1 { text-align: center;
        color : #437a1e;
        }
        form {
            
            padding: 100px;
            border-radius: 50px;
            box-shadow: 0 0 300px rgba(0, 100, 1, 20.3);
            max-width: 500px; /* Largeur maximale du formulaire pour le centrer correctement */
            margin: auto;
            margin-top: 100px;
        }
        
    </style>

    <h1> faites un don  </h1>
     <centre>
        <form method="post" action="" onsubmit="return validateForm()">
        <label for="don">CodeD:</label>
        <input type="text" id="codeD" name="codeD" required><br>

        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination"><br>

        <label for="typdeD">TypeD:</label>
        <input type="text" id="typeD" name="typeD"><br>

        <label for="nom_donneur">Nom Donneur:</label>
        <input type="text" id="nom_donneur" name="nom_donneur"><br>
        
        <input type="submit" value="Save">
        <input type="reset" value="Reset">
     </form>
    </centre>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $codeD = $_POST['codeD'];
        $destination = $_POST['destination'];
        $typeD = $_POST['typeD'];
        $nom_donneur = $_POST['nom_donneur'];
        
        require_once '../Controller/DonC.php';
        $donController = new DonC();

        if ($donController->addDon($codeD, $destination, $typeD, $nom_donneur)) {
            header("Location: ListDon.php");
            exit();
        } else {
            echo "Error adding the odonnation.";
        }
    }
    ?>
</body>
<footer class="site-footer">
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
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

</body>
</html>
