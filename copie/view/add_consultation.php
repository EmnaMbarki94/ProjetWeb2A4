<?php
include "../controller/consultationC.php";
include '../model/consultation.php';

//include '../view/index2.html';
//require_once("..\config.php");


$error = "";

// create consultation
$consultation = null;

//$cabinetC = new cabinetC();
$consultationC = new ConsultationC();

if (
    isset($_POST["nom_patient"]) &&
    isset($_POST["email_patient"]) &&
    isset($_POST["nom_medecin"]) &&
    isset($_POST["symtomes"]) &&
    isset($_POST["date_consultation"]) &&
    isset($_POST["heure_consultation"])&&
    isset($_POST["id_cabinet"])
) {
   
   
    if (
        !empty($_POST["nom_patient"]) &&
        !empty($_POST["email_patient"]) &&
        !empty($_POST["nom_medecin"]) &&
        !empty($_POST["symtomes"]) &&
        !empty($_POST["date_consultation"]) &&
        !empty($_POST["heure_consultation"])&&
        !empty($_POST["id_cabinet"])
    ) {
        $consultation = new consultation(
          null, 
          $_POST['nom_patient'],
          $_POST['email_patient'],
          $_POST['nom_medecin'],
          $_POST['symtomes'],
          $_POST['date_consultation'],
          $_POST['heure_consultation'],
          $_POST['id_cabinet']
        );
       
        $consultationC->addConsultation($consultation);
        var_dump($consultation);
        header('Location:list_consultations.php');
    } else
        $error = "Veuillez compléter toutes les informations.";
}
$cabinets=$consultationC->listCabinet();
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
            
            <li class="active"><a href="add_consultation.php">Demande consultation</a></li>
            <li ><a href="addCabinet.php">ADMIN</a></li>
            
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



   <a href="list_consultations.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" onsubmit="return validateForm();">

         
        <h2>Ajouter une Consultation</h2>
        <label for="nom_patient">Nom du Patient :</label>
        <input type="text" id="nom_patient" name="nom_patient" placeholder="nom_patient" required minlength="4" maxlength="10"required>
        <span id="erreurNom" style="color: red"></span>

        <label for="email_patient">Email_patient :</label>
        <input type="text" id="email_patient" name="email_patient" required>
        <span id="erreurEmail" style="color: red"></span>

        <label for="nom_medecin">Nom du Medecin :</label>
        <input type="text" id="nom_medecin" name="nom_medecin" placeholder="nom_medecin" required minlength="4" maxlength="10"required>
        <span id="erreurNomM" style="color: red"></span>

        <label for="date_consultation">Date de la Consultation :</label>
        <input type="date" id="date_consultation" name="date_consultation" required>
        <span id="erreurDate" style="color: red"></span>

        <label for="heure_consultation">Heure de la Consultation :</label>
        <input type="time" id="heure_consultation" name="heure_consultation" required>

         
       

        <label for="symtomes">Symptômes :</label>
        <textarea id="symtomes" name="symtomes" rows="4" required></textarea>
        <span id="erreurSymtomes" style="color: red"></span>

        <label for="id_cabinet">ID cabinet :</label>
        <select  name=id_cabinet id="id_cabinet">
          <?php
              foreach ($cabinets as $cabinet) {
                echo '<option value="' . $cabinet['id_cabinet'] . '">' . $cabinet['adresse_cabinet'] . '</option>';
            }
              ?>
            </select >  
        <span id="erreurCabinet" s tyle="color: red"></span>

        <input type="submit" value="Ajouter Consultation" style="background-color: #75b239; color: #fff;">

    </form>
    

    
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