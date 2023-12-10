<?php
include '../Controller/clientC.php';
include '../Model/client.php';

session_start();

if (isset($_POST['submit']))
{
    $email=$_POST['email'];
    $mdp=$_POST['mdp'];
    
    $db=new PDO('mysql:host=localhost;dbname=projetweb','root','',);

    $sql="SELECT * FROM client WHERE email ='$email' AND mdp='$mdp' ";
    $result=$db->prepare($sql);
    $result->execute();

    if ($result->rowcount() > 0)
    {
        $data= $result->fetch(PDO::FETCH_ASSOC);
        $id=$data['idClient'];
        if($mdp === $data["mdp"])
        {
          $_SESSION['email']=$email;
          $_SESSION['mdp']=$mdp;

          $_SESSION['idClient']=$id;

          $role = $data["rolee"];
           if ($role==="admin"){
            header('Location:listClients.php');  // Redirection vers la liste des clients
           }
           else 
           { 
              if ($role==="patient"){
                header("Location: index.php");}
           }
        }else echo "Email ou mot de passe incorrect";
    }


    $emailPh=$_POST['email'];
    $mdpPh=$_POST['mdp'];
    $sqlPh="SELECT * FROM pharmacie WHERE email ='$emailPh' AND mdp='$mdpPh'";
    $result=$db->prepare($sqlPh);
    $result->execute();

    if ($result->rowcount() > 0)
    {
      $data= $result->fetch(PDO::FETCH_ASSOC);
        if($mdpPh === $data["mdp"])
        {
          $_SESSION['email']=$emailPh;
          $_SESSION['mdp']=$mdpPh;
           if ($emailPh==="admin@gmail.com" && $mdpPh==="ADMINSPT"){
            header("Location:listPharmacies.php"); 
           }
           else
           { 
           // header("Location:templateF/shop.html");
            header("Location:addMedicaments.php");
           }
        }
    }else echo "Email ou mot de passe incorrect";
}

?>

<!DOCTYPE html>
<html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><strong>USER SPACE</strong></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Sign-in <span class="sr-only">Sign-in</span></a></li>
        <li><a href="addClient.php">Sign-up</a></li>
      </ul>
    </div>
  </div>
</nav>

    <div class="cadre">
        <form action="" method="POST">
            <h1><strong>Sign-in</strong></h1>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" required>
                <i class='bx bxs-user' ></i>
            </div>
            <div class="input-box">
                <input type="password" name="mdp" placeholder="Password" required>
                <i class='bx bxs-lock'></i>
            </div>
            <div class="oublié">
                <label><input type="checkbox" >Remember me</label>
                <a href="forgotPassword.php">Forgot password?</a>
            </div>
            <button type="submit" name="submit" class="btn">Sign-in</button>

            <div class="lien-inscription">
                <p>Don't have an account? <a href="addClient.php">Sign-up</a></p>
            </div>
        </form>
    </div>
    <style>
        *{
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body{
            
            justify-content: center;
            align-items: center;
            min-height:100vh;
            background: #84CB86;
        }
        .cadre{
            width: 420px;
            background: transparent;
            border: 2px solid rgba(255,255,255, .2);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0,0,0, .2);
            color: #fff;
            border-radius: 10px;
            padding: 30px 40px;
            margin: 50px auto;
        }
        .cadre h1{
            font-size: 36px;
            text-align: center;
            color:white;
        }
        .cadre .input-box{
            position: relative;
            width: 100%;
            height: 50px;
            margin: 30px 0;
        }
        .input-box input{
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255,255,255, .2);
            border-radius: 40px;
            font-size: 16px;
            color: #fff;
            padding: 20px 45px 20px 20px;
        }
        .input-box input::placeholder{
            color: #fff;
        }
        .input-box i{
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }
        .cadre .oublié{
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin: -15px 0 15px;
        }
        .oublié label input{
            accent-color: #fff;
            margin-right: 3px;
        }
        .oublié a{
            color: #fff;
            text-decoration: none;
        }
        .oublié a:hover {
            text-decoration: underline;

        }
        .cadre .btn {
            width: 100%;
            height: 45px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0,0,0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
        }
        .cadre .lien-inscription{
            font-size: 14px;
            text-align: center;
            margin: 20px 0 15px;
        }
        .lien-inscription p a{
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }.lien-inscription p a:hover{
            text-decoration: underline;
        }
        footer{
          color:white;
          background-color:#fff;
          margin:10px auto;
        }
        footer{
          vertical-align:bottom;
        }
        .socialicons{
          display:flex;
          justify-content: center;
        }
        .socialicons a{
          text-decoration: none;
          padding: 10px;
          background-color: #84CB86;
          margin:10px;
          border-radius: 50%;
        }
        .socialicons a i{
          font-size: 2em;
          color: white;
          opacity: 0.9 ;
        }
        .socialicons a:hover{
          background-color: #fff;
          transition: 0.5s;
        }
        .socialicons a:hover i{
          background-color: grey;
          transition: 0.5s;
        }
        .footerbottom p{
          color:black;
          display: flex;
          justify-content: center;
        }
        .designer{
          opacity:0.7;
          text-transform: uppercase;
          letter-spacing: 1px;
          font-weight: 400;
          margin: 0px 5px;
        }
        footer p a{
          color:black;
        }
    </style>
  <script src="templateF/js/jquery-3.3.1.min.js"></script>
  <script src="templateF/js/jquery-ui.js"></script>
  <script src="templateF/js/popper.min.js"></script>
  <script src="templateF/js/bootstrap.min.js"></script>
  <script src="templateF/js/owl.carousel.min.js"></script>
  <script src="templateF/js/jquery.magnific-popup.min.js"></script>
  <script src="templateF/js/aos.js"></script>

  <script src="templateF/js/main.js"></script>
</body>
<footer>
		
		<div class="socialicons">
			<a href=""><i class="fa-brands fa-facebook"></i></a>
			<a href=""><i class="fa-brands fa-instagram"></i></a>
			<a href=""><i class="fa-brands fa-twitter"></i></a>
			<a href=""><i class="fa-brands fa-google-plus"></i></a>
			<a href=""><i class="fa-brands fa-youtube"></i></a>
		</div>
		<div class="footerbottom">
			<p>copyright &copy; SPT - 2023-2024 - All rights reserved; Designed by <span class="designer "> SPT GROUP </span>
			</p> 
		</div>
	</footer>
</html>