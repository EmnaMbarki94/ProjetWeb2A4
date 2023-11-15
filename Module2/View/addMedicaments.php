<?php
// Importations bécessaires
include '../Controller/PharmacieC.php';
include '../Model/PharmacieM.php';

$error = "";

// create medicament
$medicaments = null;

// create an instance of the controller
$medicamentC = new MedicamentC();

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
                floatval($_POST['Prix']),
                $_POST['Quantite']
            );
            

            $medicamentC->addMedicaments($medicaments);
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
    <title> Medicament </title>
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
    <!--<script>
        // Fonction pour vérifier un champ spécifique
        function validateField(value, fieldName) {
            if (value === "") {
                alert("Veuillez remplir le champ " + fieldName + ".");
                return false;
            }
            return true;
        }

        // Fonction pour vérifier le formulaire avant soumission
        function validateForm() {
            // Récupérer les valeurs des champs
            var codeM = document.getElementById("codeM").value;
            var Nom = document.getElementById("Nom").value;
            var Prix = document.getElementById("Prix").value;
            var Quantite = document.getElementById("Quantite").value;

            // Vérifier chaque champ individuellement
            var isCodeMValid = validateField(codeM, "Code du Médicament");
            var isNomValid = validateField(Nom, "Nom du Médicament");
            var isPrixValid = validateField(Prix, "Prix du Médicament");
            var isQuantiteValid = validateField(Quantite, "Quantité");

            // Vérifier si le prix est un nombre
            if (isPrixValid && isNaN(Prix)) {
                alert("Le prix doit être un nombre.");
                isPrixValid = false;
            }

            // Vérifier si la quantité est un nombre entier positif
            if (isQuantiteValid && (!Number.isInteger(Number(Quantite)) || Number(Quantite) < 0)) {
                alert("La quantité doit être un nombre entier positif.");
                isQuantiteValid = false;
            }

            // Si tous les champs sont valides, le formulaire est soumis
            return isCodeMValid && isNomValid && isPrixValid && isQuantiteValid;
        }

        // Fonction pour ajouter des écouteurs d'événements aux champs
        function addEventListeners() {
            var codeMField = document.getElementById("codeM");
            var nomField = document.getElementById("Nom");
            var prixField = document.getElementById("Prix");
            var quantiteField = document.getElementById("Quantite");

            // Ajouter un écouteur d'événements à chaque champ avec l'événement "input"
            codeMField.addEventListener("input", function () {
                validateField(this.value, "Code du Médicament");
            });

            nomField.addEventListener("input", function () {
                validateField(this.value, "Nom du Médicament");
            });

            prixField.addEventListener("input", function () {
                validateField(this.value, "Prix du Médicament");
            });

            quantiteField.addEventListener("input", function () {
                validateField(this.value, "Quantité");
            });
        }

        // Ajouter des écouteurs d'événements une fois que le DOM est prêt
        document.addEventListener("DOMContentLoaded", addEventListeners);
    </script>-->
</head>

<body>
    <a href="listMedicaments.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="codeM">codeM :</label></td>
                <td>
                    <input type="text" id="codeM" name="codeM" />
                    <span id="erreurcodeM" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="Nom">Nom :</label></td>
                <td>
                    <input type="text" id="Nom" name="Nom" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="Prix">Prix :</label></td>
                <td>
                    <input type="text" id="Prix" name="Prix" />
                    <span id="erreurPrix" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="Quantite">Quantite :</label></td>
                <td>
                    <input type="text" id="Quantite" name="Quantite" />
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
</body>

</html>