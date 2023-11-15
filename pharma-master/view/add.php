<?php
    //require_once 'C:/xampp/htdocs/pharma-master/controler/reclamationC.php';

    //require_once 'C:\xampp\htdocs\pharma-master\model\reclamation.php';
    include '../controler/reclamationC.php';
    include '../model/reclamation.php';

    $error = "";
    // create user
    $reclamation = null;
    // create an instance of the controller
    $reclamationC= new ReclamationC();
    if (
        isset($_POST["name"]) &&
        isset($_POST["email"]) &&
        isset($_POST["message"]) 
        
    ) {
        if (
            !empty($_POST["name"])  && 
            !empty($_POST["email"]) && 
            !empty($_POST["message"]) 
            
        )
         {
            $reclamation = new reclamation(
                $_POST['name'], 
                $_POST['email'], 
                $_POST['message']
            );
			$reclamationC->ajouterReclamation($reclamation);
      header ('Location:tableRec.php');
        }
        else
            $error = "Missing information";
    }  

    $liste=$reclamationC->afficherReclamation();
?>
<style>
  body{
    background: #84CB86;
}
.contact{
    
    background-size: cover;
    box-shadow: 2px 2px 12px rgba(0,0,0, 0.8);
    width: 100%;
    background-position: unset;
}

.contactform{
    padding: 75px 50px;
    background: #fff;
    box-shadow: 5px 15px 50px rgba(0,0,0, 0.8);
    max-width: 500px;
    margin-top: 50px;
    justify-content: center;
    align-items: center;
    margin-left: 38%;
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleREC.css">
    <title>SPT</title>
</head>
<body>
  <div id="error" class="error">
    <?php echo $error;?>
  </div>
<form action="" method="POST">
    <section class="contact" id="contact">
        <div class="contactform">
            <h3>Envoyer un message</h3>
            <div class="inputboite">
                <input type="text" placeholder="Nom">
            </div>
            <div class="inputboite">
               <input type="text" placeholder="email">
            </div>
            <div class="inputboite">
               <textarea placeholder="message"></textarea>
            </div>
            <div class="inputboite">
                <input type="submit" value="envoyer">
            </div>
        </div>
    </section>
</form> 
</body>
</html>