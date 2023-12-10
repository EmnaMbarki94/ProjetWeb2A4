<?php
// Importations nécessaires
include '../Controller/MedicamentC.php';
include '../Model/MedicamentM.php';

$errors = [];

// create medicament
$medicaments = null;

// create an instance of the controller
$medicamentC = new MedicamentC();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $codeM = filter_input(INPUT_POST, "codeM", FILTER_SANITIZE_STRING);
    $Nom = filter_input(INPUT_POST, "Nom", FILTER_SANITIZE_STRING);
    $Prix = filter_input(INPUT_POST, "Prix", FILTER_SANITIZE_STRING);
    $Quantite = filter_input(INPUT_POST, "Quantite", FILTER_SANITIZE_STRING);

    // Check if the "image" key exists before accessing it
    if (isset($_FILES["image"]) && isset($_FILES["image"]["tmp_name"])) {
        // Image upload handling
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Crée le répertoire "uploads/" s'il n'existe pas
        $target_dir = "uploads/";

        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Check if image file is a actual image or fake image
        if ($check = getimagesize($_FILES["image"]["tmp_name"])) {
            $uploadOk = 1;
        } else {
            $errors[] = "Le fichier n'est pas une image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            $errors[] = "Désolé, votre fichier est trop volumineux.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowed_formats = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowed_formats)) {
            $errors[] = "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $errors[] = "Désolé, votre fichier n'a pas été téléchargé.";
        } else {
            // if everything is ok, try to upload file
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $medicaments = new Medicament(null, $codeM, $Nom, floatval($Prix), $Quantite, $target_file);
                $medicamentC->updateMedicaments($medicaments, $_POST['id']);
                header('Location: listMedicamentsF.php');
                exit();
            } else {
                $errors[] = "Une erreur s'est produite lors du téléchargement de votre fichier.";
            }
        }
    } else {
        $errors[] = "No image uploaded.";
    }
}
?>
<html lang="en">
<head>
  <title>SPT &mdash; Colorlib Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <style>  body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #343a40;
        }

    

        form {
            max-width: 600px;
            margin: 20px auto; /* Ajoutez cette ligne pour centrer le formulaire */
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
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="templatefront/fonts/icomoon/style.css">

  <link rel="stylesheet" href="templatefront/css/bootstrap.min.css">
  <link rel="stylesheet" href="templatefrontfonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="templatefrontcss/magnific-popup.css">
  <link rel="stylesheet" href="templatefront/jquery-ui.css">
  <link rel="stylesheet" href="templatefront/css/owl.carousel.min.css">
  <link rel="stylesheet" href="templatefront/css/owl.theme.default.min.css">


  <link rel="stylesheet" href="templatefront/css/aos.css">

  <link rel="stylesheet" href="templatefront/css/style.css">

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
              <a href="templatefront/index.html" class="js-logo-clone"><strong class="text-primary">SPT</strong> Sante pour tous</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="templatefront/index.html">Acceuil</a></li>
                <li><a href="templatefront/shop.html">Espace Pharmacie</a></li>
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
                <li><a href="templatefront/about.html">About</a></li>
                <li class="active"><a href="templatefront/contact.html">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="templatefront/contact.html" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">2</span>
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
            <a href="templatefront/index.html">Acceuil</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black ">Espace Pharmacie</strong>
          </div>
        </div>
      </div>
    </div>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Update Medicament</title>
</head>

<body>
    <a href="listMedicaments.php">Retour a la liste de medicaments</a>
    <hr>

    <div id="errors">
    <?php
    foreach ($errors as $error) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>
  </div>
    
    <?php
    if (isset($_POST['id'])) {
        $medicaments = $medicamentC->showMedicaments($_POST['id']);}
        
    ?>

    <form action="" method="POST" id="formulaireAjout"  enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="nom">id:</label></td>
                    <td>
                        <input type="text" id="id" name="id" value="<?php echo $_POST['id'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
              <td><label for="image">Image :</label></td>
              <td>
                  <input type="file" id="image" name="image" accept="image/* " />
                  <span id="erreurImage" style="color: red"></span>
              </td>
          </tr>
            <tr>
                <td><label for="codeM">codeM :</label></td>
                <td>
                    <input type="text" id="codeM" name="codeM" placeholder="codeM" required minlength="3" maxlength="5" value="<?php echo $medicaments['codeM'] ?>" />
                    <span id="erreurcodeM" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="Nom">Nom :</label></td>
                <td>
                    <input type="text" id="Nom" name="Nom" placeholder="Nom" required minlength="2" maxlength="10" value="<?php echo $medicaments['Nom'] ?>"/>
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="Prix">Prix :</label></td>
                <td>
                    <input type="text" id="Prix" name="Prix" placeholder="Prix" required minlength="3" maxlength="10" value="<?php echo $medicaments['Prix'] ?>" />
                    <span id="erreurPrix" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="Quantite">Quantite :</label></td>
                <td>
                    <input type="text" id="Quantite" name="Quantite" placeholder="Quantite" required minlength="1" maxlength="10" value="<?php echo $medicaments['Quantite'] ?>"/>
                    <span id="erreurQuantite" style="color: red"></span>
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
        <script>
    function validercodeM() {
        var erreurcodeM;
        var codeM = document.getElementById("codeM").value;
        var regexCode = /^[0-9]{5}$/; // Expression régulière pour vérifier 5 chiffres

        if (!regexCode.test(codeM)) {
            erreurcodeM = "Le code Medicament doit contenir exactement 5 chiffres.";
            document.getElementById("erreurcodeM").innerHTML = erreurcodeM;
            return false;
        } else {
            document.getElementById("erreurcodeM").innerHTML = "<span style='color:green'>Correct</span>";
            return true;
        }
    }

    function validerNom() {
        var erreurNom;
        var Nom = document.getElementById("Nom").value;
        var regexNom = /^[A-Za-z]+$/; // Expression régulière pour vérifier les lettres

        if (!regexNom.test(Nom)) {
            erreurNom = "Le nom ne doit contenir que des lettres.";
            document.getElementById("erreurNom").innerHTML = erreurNom;
            return false;
        } else {
            document.getElementById("erreurNom").innerHTML = "<span style='color:green'>Correct</span>";
            return true;
        }
    }

    function validerPrix() {
        var erreurPrix;
        var Prix = document.getElementById("Prix").value;
        var regexPrix = /^[0-9]+(\.[0-9]{1,2})?$/; // Expression régulière pour vérifier un nombre avec jusqu'à 2 décimales

        if (!regexPrix.test(Prix)) {
            erreurPrix = "Le prix doit être un nombre avec jusqu'à 2 décimales.";
            document.getElementById("erreurPrix").innerHTML = erreurPrix;
            return false;
        } else {
            document.getElementById("erreurPrix").innerHTML = "<span style='color:green'>Correct</span>";
            return true;
        }
    }

    function validerQuantite() {
        var erreurQuantite;
        var Quantite = document.getElementById("Quantite").value;
        var regexQuantite = /^[0-9]+$/; // Expression régulière pour vérifier un nombre entier

        if (!regexQuantite.test(Quantite)) {
            erreurQuantite = "La quantité doit être un nombre entier.";
            document.getElementById("erreurQuantite").innerHTML = erreurQuantite;
            return false;
        } else {
            document.getElementById("erreurQuantite").innerHTML = "<span style='color:green'>Correct</span>";
            return true;
        }
    }

    // Appel de la fonction de validation lorsque le bouton "Save" est cliqué
    document.querySelector("input[type='submit']").addEventListener("click", function (e) {
        if (!validercodeM() || !validerNom() || !validerPrix() || !validerQuantite()) {
            e.preventDefault();}
    });
</script>
</body>

</html>
