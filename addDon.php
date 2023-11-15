<!DOCTYPE html>
<html>
<head>
    <title>Add a donnation</title>
    <link rel="stylesheet" href="style.css">
   
    <link rel="stylesheet" href="bootstrap.min.css">
    

    <script>
        function validateForm() {
            var codeD = document.getElementById('codeD').value;
            var destination = document.getElementById('destination').value;
            var typeD = document.getElementById('typeD').value;
            var nom_donneur = document.getElementById('nom_donneur').value;

            var errorMessage = '';

            if (codeD.trim() === '') {
                errorMessage += 'Le codeD est requis.\n';
            }

            if (destination.trim() === '') {
                errorMessage += 'La destination est requise.\n';
            }

            if (typeD.trim() === '') {
                errorMessage += 'Le typeD est requis.\n';
            }

            if (nom_donneur.trim() === '') {
                errorMessage += 'Le nom du donneur est requis.\n';
            }
            else if (nom_donneur.length < 3) {
                errorMessage += 'Le nom du donneur doit avoir au moins 3 caractères.\n';
            }

            if (errorMessage !== '') {
                alert(errorMessage);
                return false; // Empêche l'envoi du formulaire
            } else {
                return true; // Permet l'envoi du formulaire
            }
        }
    </script>
</head>
<body>
    <style>
        h1 { text-align: center;
        color : #437a1e;
        }
        form {
            
            padding: 100px;
            border-radius: 50px;
            box-shadow: 0 0 300px rgba(0, 100, 1, 20.3);
            max-width: 500px; /* Largeur maximale du formulaire pour le centrer correctement */
            margin: auto;
            margin-top: 100px;
        }
        
    </style>

    <h1> faites un don  </h1>
     <centre>
        <form method="post" action="" onsubmit="return validateForm()">
        <label for="don">CodeD:</label>
        <input type="text" id="codeD" name="codeD" required><br>

        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination"><br>

        <label for="typdeD">TypeD:</label>
        <input type="text" id="typeD" name="typeD"><br>

        <label for="nom_donneur">Nom Donneur:</label>
        <input type="text" id="nom_donneur" name="nom_donneur"><br>
        
        <input type="submit" value="Save">
        <input type="reset" value="Reset">
     </form>
    </centre>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $codeD = $_POST['codeD'];
        $destination = $_POST['destination'];
        $typeD = $_POST['typeD'];
        $nom_donneur = $_POST['nom_donneur'];
        
        require_once '../Controller/DonC.php';
        $donController = new DonC();

        if ($donController->addDon($codeD, $destination, $typeD, $nom_donneur)) {
            header("Location: ListDon.php");
            exit();
        } else {
            echo "Error adding the odonnation.";
        }
    }
    ?>
</body>
</html>
