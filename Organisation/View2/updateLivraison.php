<!DOCTYPE html>
<html>

<head>
    <title>Update donnation</title>
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="bootstrap.min.css">
    
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

    <h1>Updatelivraison </h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['codeCom'])) {
        $livraisoncodeCom = $_GET['codeCom'];

        require_once '../Controller2/LivraisonC.php';
        $livraisonController = new LivraisonC();

        $Livraison = $livraisonController->getLivraisonBycodeCom($livraisoncodeCom);

        if ($Livraison) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $codeCom= $_POST['codeCom'];
                $Destination = $_POST['Destination'];
                $nom = $_POST['nom'];
                $numero_tele = $_POST['numero_tele'];
               

                if (
                    $livraisonController->updateLivraison(
                        $codeCom,
                        $Destination,
                        $nom,
                        $numero_tele,

                        
                    )
                ) {
                    header("Location: ListLivraison.php");
                    exit();
                } else {
                    echo "Error updating livraison.";
                }
            } 
            ?>
            <form method="post" action="">
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
                

                <input type="submit" value="Update">
            </form>

            <?php
        } else {
            echo "livraison  not found.";
        }
    } else {
        echo "Invalid request.";
    }
    ?>
</body>

</html>