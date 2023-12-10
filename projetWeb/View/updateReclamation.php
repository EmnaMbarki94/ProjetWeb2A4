<?php

include '../Controller/reclamationC.php';
include '../Model/reclamation.php';
$error = "";

// create client
$reclamation = null;
// create an instance of the controller
$reclamationC = new reclamationC();


if (
    isset($_POST["nom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["msg"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["email"]) &&
        !empty($_POST["msg"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $reclamation = new reclamation(
            null,
            $_POST['nom'],
            $_POST['email'],
            $_POST['msg']
        );
        var_dump($reclamation);
        
        $reclamationC->updateReclamation($reclamation, $_POST['id']);

        header('Location:listReclamation.php');
    } else
        $error = "Missing information";
}



?>

<html lang="en">

<style>
  body{
    background: #84CB86;
}


.contactform{
    padding: 75px 75px;
    background: #fff;
    box-shadow: 5px 15px 50px rgba(0,0,0, 0.8);
    max-width: 500px;
    margin-top: 50px;
    justify-content: center;
    align-items: center;
    margin-left: 30%;
}

.contactform .inputboite{
    position: relative;
    width: 100%;
    margin-bottom: 20px;
}

.contactform h3{
    color: #111;
    font-size: 1.2em;
    margin-bottom: 30px;
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
    background: #75b239;
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



  <style>
    .success-bow {
        position: fixed;
        bottom: 20px; /* Adjust the distance from the bottom as needed */
        left: 50%;
        transform: translateX(-50%);
        background-color: #28a745;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        z-index: 9999;
        display: none;
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
            <a href="index.php" class="js-logo-clone"><strong class="text-primary">SPT </strong>SANTé POUR TOUS</a>
          </div>
        </div>
        <div class="main-nav d-none d-lg-block">
          <nav class="site-navigation text-right text-md-center" role="navigation">
            <ul class="site-menu js-clone-nav d-none d-lg-block">
              <li ><a href="index.php">Home</a></li>
              <li><a href="Magasin.php">Store</a></li>
    
              <li class="has-children">
                <a href="#">consultations</a>
                <ul class="dropdown">
                  <li><a class="active" href="add_consultation.php">Demande consultation</a></li>
                  <li><a class="active" href="listCFront.php">list consultation</a></li> 
              </li>
            </ul>

            <li class="has-children">
                <a href="#">Don</a>
                <ul class="dropdown">
                  <li><a class="active" href="addDon.php">donate</a></li>
              </li>
            </ul>
            </li>
              <li class="active"><a href="addReclamation.php">Reclamation</a></li>
              <li class="has-children">
                <a href="#">Paramètres</a>
                <ul class="dropdown">
                  <li><a class="active" href="deconnexion.php">Se déconnecter</a></li>
                  <li><a class="active" href="editProfile.php">Modifier profil</a></li>
                    
                     
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
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $reclamation = $reclamationC->showReclamation($_POST['id']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">Id :</label></td>
                    <td>
                        <input type="text" id="id" name="id" value="<?php echo $_POST['id'] ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $reclamation['nom'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                    <td><label for="email">Email :</label></td>
                    <td>
                        <input type="text" id="email" name="email" value="<?php echo $reclamation['email'] ?>" />
                        <span id="erreurEmail" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="msg">Message :</label></td>
                    <td>
                        <input type="text" id="msg" name="msg" value="<?php echo $reclamation['msg'] ?>" />
                        <span id="erreurMessage" style="color: red"></span>
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
    <?php
    }
    ?>
    <script src="Front/front/js/jquery-3.3.1.min.js"></script>
  <script src="Front/front/js/jquery-ui.js"></script>
  <script src="Front/front/js/popper.min.js"></script>
  <script src="Front/front/js/bootstrap.min.js"></script>
  <script src="Front/front/js/owl.carousel.min.js"></script>
  <script src="Front/front/js/jquery.magnific-popup.min.js"></script>
  <script src="Front/front/js/aos.js"></script>

  <script src="Front/front/js/main.js"></script>
</body>
</html>