<?php
include "../controller/consultationC.php";
include '../model/consultation.php';
//require_once("..\config.php");


$error = "";

// create consultation
$consultation = null;


$consultationC = new consultationC();

if (
    isset($_POST["nom_patient"]) &&
    isset($_POST["email_patient"]) &&
    isset($_POST["nom_medecin"]) &&
    isset($_POST["symtomes"]) &&
    isset($_POST["date_consultation"]) &&
    isset($_POST["heure_consultation"])
) {
    $nom_patient=$_POST['nom_patient'];
    $email_patient=$_POST['email_patient'];
    $nom_medecin=$_POST['nom_medecin'];
    $symtomes=$_POST['symtomes'];
    $date_consultation=$_POST['date_consultation'];
    $heure_consultation=$_POST['heure_consultation'];
   
    if (
        !empty($nom_patient) &&
        !empty($email_patient) &&
        !empty($nom_medecin) &&
        !empty($symtomes) &&
        !empty($date_consultation) &&
        !empty($heure_consultation)
    ) {
        $consultation = new consultation(null, $nom_patient, $email_patient, $nom_medecin,$symtomes,$date_consultation,$heure_consultation);
        $consultationC->addConsultation($consultation);
        header('Location:list_consultations.php');
    } else
        $error = "Veuillez compléter toutes les informations.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
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

        nav {
            background-color: #4caf50;
            padding: 10px;
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


<body>
    <a href="list_consultations.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">

         
        <h2>Ajouter une Consultation</h2>
        <label for="nom_patient">Nom du Patient :</label>
        <input type="text" id="nom_patient" name="nom_patient" required>

        <label for="email_patient">Email_patient :</label>
        <input type="text" id="email_patient" name="email_patient" required>

        <label for="nom_medecin">Nom du Medecin :</label>
        <input type="text" id="nom_medecin" name="nom_medecin" required>

        <label for="date_consultation">Date de la Consultation :</label>
        <input type="date" id="date_consultation" name="date_consultation" required>

        <label for="heure_consultation">Heure de la Consultation :</label>
        <input type="time" id="heure_consultation" name="heure_consultation" required>
         
       

        <label for="symtomes">Symptômes :</label>
        <textarea id="symtomes" name="symtomes" rows="4" required></textarea>

        <input type="submit" value="Ajouter Consultation">
    </form>
</body>
</html>