<?php

include '../Controller/consultationC.php';
include '../Model/consultation.php';
$error = "";

// create consultation
$consultation = null;
// create an instance of the controller
$consultationC = new ConsultationC();

if (
    isset($_POST["nom_patient"]) &&
    isset($_POST["prenom_patient"]) &&
    isset($_POST["email_patient"]) &&
    isset($_POST["tel_patient"]) &&
    isset($_POST["date_consultation"]) &&
    isset($_POST["symptomes"])
) {
    if (
        !empty($_POST['nom_patient']) &&
        !empty($_POST["prenom_patient"]) &&
        !empty($_POST["email_patient"]) &&
        !empty($_POST["tel_patient"]) &&
        !empty($_POST["date_consultation"]) &&
        !empty($_POST["symptomes"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $consultation = new Consultation(
            null,
            $_POST['nom_patient'],
            $_POST['prenom_patient'],
            $_POST['email_patient'],
            $_POST['tel_patient'],
            $_POST['date_consultation'],
            $_POST['symptomes']
        );
        var_dump($consultation);
        
        $consultationC->updateConsultation($consultation, $_POST['idJoueur']);

        header('Location: list_consultations.php');
    } else {
        $error = "Missing information";
    }
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

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="list_consultations.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_consultation'])) {
        $consultation = $consultationC->showConsultation($_POST['id_consultation']);
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="id_consultation">IdConsultation :</label></td>
                    <td>
                        <input type="text" id="id_consultation" name="id_consultation" value="<?php echo $_POST['id_consultation'] ?>" readonly />
                         <!--<span id="erreurNom" style="color: red"></span>-->
                    </td>
                </tr>
                <tr>
                    <td><label for="nom_patient">Nom patient:</label></td>
                    <td>
                        <input type="text" id="nom_patient" name="nom_patient" value="<?php echo $consultation['nom_patient'] ?>" />
                         <!--<span id="erreurNom" style="color: red"></span>-->
                    </td>
                </tr>
                <tr>
                    <td><label for="nom_medecin">Nom medecin :</label></td>
                    <td>
                        <input type="text" id="nom_medecin" name="nom_medecin" value="<?php echo $consultation['nom_medecin'] ?>" />
                        <!--<span id="erreurNom" style="color: red"></span>-->
                    </td>
                </tr>
                <tr>
                    <td><label for="email_patient">Email_patient :</label></td>
                    <td>
                        <input type="text" id="email_patient" name="email_patient" value="<?php echo $consultation['email_patient'] ?>" />
                        <!-- <span id="erreurEmail" style="color: red"></span>-->
                    </td>
                </tr>
                <tr>
                    <td><label for="date_consultation">Date consultation :</label></td>
                    <td>
                        <input type="date" id="date_consultation" name="tel" value="<?php echo $consultation['date_consultation'] ?>" />
                         <!--<span id="erreurDate" style="color: red"></span>-->
                    </td>
                </tr>
                <tr>
                    <td><label for="heure_consultation"> Heure de consultation:</label></td>
                    <td>
                        <input type="time" id="heure_consultation" name="tel" value="<?php echo $consultation['heure_consultation'] ?>" />
                        <!--<span id="erreurHeure" style="color: red"></span>-->
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
</body>

</html>
