<?php
session_start();
if (! isset($_SESSION['email'])) {
  header("Location: connectClient.php");
  exit;
}
echo "Bienvenue " .$_SESSION['email'] .$_SESSION['idClient'];
$email = $_SESSION['email'];
$idClient = $_SESSION['idClient'];
?>
<?php
require_once('../Controller/consultationC.php');
include '../Model/consultation.php';

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
    isset($_POST["id_cabinet"])&&
    isset($_POST["grade"])
) {
   
   
    if (
        !empty($_POST["nom_patient"]) &&
        !empty($_POST["email_patient"]) &&
        !empty($_POST["nom_medecin"]) &&
        !empty($_POST["symtomes"]) &&
        !empty($_POST["date_consultation"]) &&
        !empty($_POST["heure_consultation"])&&
        !empty($_POST["id_cabinet"])&&
        !empty($_POST["grade"])
    ) {
        $consultation = new consultation(
          null, 
          $_POST['nom_patient'],
          $_POST['email_patient'],
          $_POST['nom_medecin'],
          $_POST['symtomes'],
          $_POST['date_consultation'],
          $_POST['heure_consultation'],
          $_POST['id_cabinet'],
          $_POST['grade']
        );
       
        $consultationC->addConsultation($consultation);
        //var_dump($consultation);
        //header('Location:list_consultations.php');
    } else
        $error = "Veuillez compléter toutes les informations.";
}
$cabinets=$consultationC->listCabinet();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>SPT &mdash; Add consultation</title>

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





    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Médecin</title>
    <style>
        header {
            background-color: #28a745;
            padding: 20px;
            color: #fff;
            text-align: center;
        }

        /* Add a new style for the form container */
        .contactform {
            padding: 20px; /* Adjust padding as needed */
            background: #fff;
            box-shadow: 5px 15px 50px rgba(0, 0, 0, 0.8);
            margin: 20px auto; /* Center the form container */
            max-width: 1000px; /* Set a maximum width for the form container */
            text-align: center;
        }

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
       
 
.contact{
    
    background-size: cover;
    box-shadow: 2px 2px 12px rgba(0,0,0, 0.8);
    width: 100%;
    background-position: unset;
}


.contactform .inputboite{
    position: relative;
    width: 100%;
    margin-bottom: 20px;
}

.contactform h3{
    color: #111;
    font-size: 1.2em;
    margin-bottom: 20px;
}

.contactform .inputboite input,
.contactform .inputboite textarea{
    width: 100%;
    border: 1px solid #555;
    padding: 10px;
    color: #111;
    outline: none;
    font-size: 16px;
    font-weight: 300;
    resize: none;
}

.contactform .inputboite input[type="submit"]{
    font-size: 1em;
    font-weight: 700;
    color: #ffff;
    background: #fb911f;
    display: inline-block;
    cursor: pointer;
    text-transform: uppercase;
    text-decoration: none;
    letter-spacing: 2px;
    outline: none;
    border: none;
    transition: 0.5s;
    max-width: 120px;
    align-items: center;
    justify-content: center;
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
          </li>
          <li class="has-children">
            <a href="#">Settings</a>
            <ul class="dropdown">
              <li><a class="active" href="deconnexion.php">Deconnexion</a></li>
              <li><a class="active" href="editProfile.php">Edit profil</a></li>
              
         
        
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
            <a href="index.php">Home</a> <span class="mx-2 mb-0">/</span><strong class="text-black">Add consultation</strong>
          </div>
        </div>
      </div>
    </div>

    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
   
    <div class="contactform">
    <form action="" method="POST" onsubmit="return validateForm();">

         
        <h2>Add Consultation</h2>
        <label for="nom_patient">Patient Name :</label>
        <input type="text" id="nom_patient" name="nom_patient" placeholder="patient name" required minlength="4" maxlength="10"required>
        <span id="erreurNom" style="color: red"></span>

        <label for="email_patient">Patient Email :</label>
        <input type="text" id="email_patient" name="email_patient" required>
        <span id="erreurEmail" style="color: red"></span>

        <label for="nom_medecin">Doctor Name :</label>
        <input type="text" id="nom_medecin" name="nom_medecin" placeholder="doctor name" required minlength="4" maxlength="10"required>
        <span id="erreurNomM" style="color: red"></span>

        <label for="date_consultation"> Consultation Date:</label>
        <input type="date" id="date_consultation" name="date_consultation" required>
        <span id="erreurDate" style="color: red"></span>

        <label for="heure_consultation">Consultation Time:</label>
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
        <label for="grade">Grade</label>
         <input type="text" id="grade" name="grade" value="<?php echo $consultation['grade'] ?? ''; ?>" />

                    
              

        <input type="submit" value="Add Consultation" style="background-color: #75b239; color: #fff;">

    </form>
   
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