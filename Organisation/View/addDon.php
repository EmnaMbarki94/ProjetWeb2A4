<!DOCTYPE html>
<html>
<head>
    <title>Add a donnation</title>
    <link rel="stylesheet" href="style.css">
   
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
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
</body>
</html>
