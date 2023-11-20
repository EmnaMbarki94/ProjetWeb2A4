<!DOCTYPE html>
<html>
<head>
    <title>Add a donnation</title>
    <link rel="stylesheet" href="style.css">
   
    <link rel="stylesheet" href="bootstrap.min.css">
    

    <script>
        function validateForm() {
            var codeCom = document.getElementById('codeCom').value;
            var Destination = document.getElementById('Destination').value;
            var nom = document.getElementById('nom').value;
            var numero_tele = document.getElementById('numero_tele').value;

            var errorMessage = '';

            if (codeCom.trim() === '') {
                errorMessage += 'Le codeCom est requis.\n';
            }

            if (Destination.trim() === '') {
                errorMessage += 'La Destination est requise.\n';
            }

            if (nom.trim() === '') {
                errorMessage += 'nom est requis.\n';
            }

            if (numero_tele.trim() === '') {
                errorMessage += 'Le numero est requis.\n';
            }
          /*  else if (nom_donneur.length < 3) {
                errorMessage += 'Le nom du donneur doit avoir au moins 3 caractères.\n';
            }
            */
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

    <h1> livraison   </h1>
     <centre>
        <form method="post" action="" onsubmit="return validateForm()">
        <label for="livraison">codeCom:</label>
        <input type="text" id="codeCom" name="codeCom" required><br>

        <label for="Destination">Destination:</label>
        <input type="text" id="Destination" name="Destination"><br>

        <label for="nom">nom:</label>
        <input type="text" id="nom" name="nom"><br>

        <label for="numero_tele">numero_tele:</label>
        <input type="text" id="numero_tele" name="numero_tele"><br>
        
        <input type="submit" value="Save">
        <input type="reset" value="Reset">
     </form>
    </centre>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $codeCom = $_POST['codeCom'];
        $Destination = $_POST['Destination'];
        $nom= $_POST['nom'];
        $numero_tele= $_POST['numero_tele'];
        
        require_once '../Controller2/LivraisonC.php';
        $livraisonController = new livraisonC();

        if ($livraisonController->addLivraison($codeCom, $Destination, $nom, $numero_tele)) {
            header("Location: ListLivraison.php");
            exit();
        } else {
            echo "Error adding the livraison.";
        }
    }
    ?>
</body>
</html>
