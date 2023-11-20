<?php
include '../Controller/clientC.php';
include '../Model/client.php';

session_start();
if (isset($_POST['submit']))
{
    $email=$_POST['email'];
    $mdp=$_POST['mdp'];
    $db=new PDO('mysql:host=localhost;dbname=gestioncomptes','root','',);

    $sql="SELECT * FROM client WHERE email ='$email' ";
    $result=$db->prepare($sql);
    $result->execute();

    if ($result->rowcount() > 0)
    {
        $data= $result->fetchAll();
        if($mdp === $data[0]["mdp"])
        {
           echo"connexion effectuée!";
           $_SESSION['email']=$email;
           if ($email==="admin@gmail.com" && $mdp==="ADMINSPT"){
                header('Location:listClients.php');  // Redirection vers la liste des clients
           }
        }else echo "Email ou mot de passe incorrect";
    }
}

?>
<!DOCTYPE html>
<html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="cadre">
        <form action="" method="POST">
            <h1>Se connecter</h1>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" required>
                <i class='bx bxs-user' ></i>
            </div>
            <div class="input-box">
                <input type="password" name="mdp" placeholder="Mot de passe" required>
                <i class='bx bxs-lock'></i>
            </div>
            <div class="oublié">
                <label><input type="checkbox" >Se rappeler</label>
                <a href="#">Mot de passe oublié?</a>
            </div>
            <button type="submit" name="submit" class="btn">Se connecter</button>

            <div class="lien-inscription">
                <p>Pas de compte? <a href="addClient.php">S'inscrire</a></p>
            </div>
        </form>
    </div>
</body>
</html>