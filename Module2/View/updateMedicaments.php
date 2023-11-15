<?php

include '../Controller/PharmacieC.php';
include '../Model/PharmacieM.php';

$error = "";

// create client
$medicaments = null;

// create an instance of the controller
$MedicamentC = new MedicamentC();

if (
    isset($_POST["codeM"]) &&
    isset($_POST["Nom"]) &&
    isset($_POST["Prix"]) &&
    isset($_POST["Quantite"])
) {
    if (
        !empty($_POST['codeM']) &&
        !empty($_POST["Nom"]) &&
        !empty($_POST["Prix"]) &&
        !empty($_POST["Quantite"])
    ) {
        $medicaments = new Medicament(
            null,
            $_POST['codeM'],
            $_POST['Nom'],
            $_POST['Prix'],
            $_POST['Quantite']
        );
        $MedicamentC->updateMedicaments($medicaments, $_POST['codeM']);
        header('Location: listMedicaments.php');
    } else {
        $error = "Missing information";
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>  body {
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
    <title>Update Medicament</title>
</head>

<body>
    <a href="listMedicaments.php">Back to list</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_GET['codeM'])) {
        $medicaments = $MedicamentC->showMedicaments($_GET['codeM']);
    ?>
        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="codeM">codeM :</label></td>
                    <td>
                        <input type="text" id="codeM" name="codeM" value="<?php echo $medicaments['codeM']; ?>" readonly />
                        <span id="erreurcodeM" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="Nom">Nom :</label></td>
                    <td>
                        <input type="text" id="Nom" name="Nom" value="<?php echo $medicaments['Nom']; ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="Prix">Prix :</label></td>
                    <td>
                        <input type="text" id="Prix" name="Prix" value="<?php echo $medicaments['Prix']; ?>" />
                        <span id="erreurPrix" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="Quantite">Quantite :</label></td>
                    <td>
                        <input type="text" id="Quantite" name="Quantite" value="<?php echo $medicaments['Quantite']; ?>" />
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
    <?php
    }
    ?>
</body>

</html>
