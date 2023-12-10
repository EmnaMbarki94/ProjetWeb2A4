<?php
session_start();
if (! isset($_SESSION['email'])) {
  header("Location: connectClient.php");
  exit;
}
echo "Bienvenue " .$_SESSION['email'];
$email = $_SESSION['email'];
?>
<?php
include "../Controller/MedicamentC.php";

$m = new MedicamentC();
$tab = $m->listMedicaments();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Medicament </title>
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
            margin: 20px 10px auto;
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
    </style>
    
</head>
<head>
  <title>SPT &mdash; Colorlib Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="templatefront/fonts/icomoon/style.css">

  <link rel="stylesheet" href="templatefront/css/bootstrap.min.css">
  <link rel="stylesheet" href="templatefront/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="templatefront/css/magnific-popup.css">
  <link rel="stylesheet" href="templatefront/css/jquery-ui.css">
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
              <a href="index.html" class="js-logo-clone"><strong class="text-primary">SPT</strong> Santé pour tous</a>
            </div>
          </div>
      <div class="main-nav d-none d-lg-block">
        <nav class="site-navigation text-right text-md-center" role="navigation">
          <ul class="site-menu js-clone-nav d-none d-lg-block">
          <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="addMedicaments.php">Pharmacy Space</a></li>
                <li class="has-children">
                  <li  class="active"><a href="listMedicamentsF.php">List of Medicine</a></li>
                  <li class="has-children">
                  <a href="#">Settings</a>
                  <ul class="dropdown">
                    <li><a class="active" href="deconnexion.php">Deconnexion</a></li>
                    <li><a class="active" href="editProfile.php">Edit profile</a></li>
                      
                       
                </li>
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
<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="index2.html">Home</a> <span class="mx-2 mb-0">/</span>
            <a href="listMedicamentsF.php">list Medicaments</a><strong class="text-black"></strong>
          </div>
        </div>
      </div>
    </div>
          
<table border="1" align="center" width="70%">
    <tr>
        <th>id</th>
        <th>image</th>
        <th>codeM</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Quantite</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $medicaments) {
    ?>

        <tr>
            <td><?= $medicaments['id']; ?></td>
            <td>
                    <?php
                    if (isset($medicaments['image'])) {
                        echo '<img src="' . $medicaments['image'] . '" alt="Medication Image" width="50">';
                    } else {
                        echo "N/A";
                    }
                    ?>
                </td>
            <td><?= $medicaments['codeM']; ?></td>
            <td><?= $medicaments['Nom']; ?></td>
            <td><?= $medicaments['Prix']; ?></td>
            <td>
            <?php
            // Vérifier si la clé "Quantite" existe avant de l'afficher
            if (isset($medicaments['Quantite'])) {
                echo $medicaments['Quantite'];
            } else {
                echo "N/A"; // Ou tout autre message indiquant que la clé est absente
            }
            ?>
            </td>
            <td align="center">
                <form method="POST" action="updateMedicaments.php">
                    <input type="submit" name="update" value="update">
                    <input type="hidden" value=<?PHP echo $medicaments['id']; ?> name="id">
                </form>
            </td>
            <td>
                <a href="deleteMedicaments.php?id=<?php echo $medicaments['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
   
</table>
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