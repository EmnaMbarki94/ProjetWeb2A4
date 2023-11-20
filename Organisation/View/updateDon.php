

    <?php
    include '../Controller/DonC.php';
    /*if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['codeD'])) {
        $doncodeD = $_GET['codeD'];

        require_once '../Controller/DonC.php';
        $donController = new DonC();

        $don = $donController->getDonByCODED($doncodeD);

        if ($don) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $codeD = $_POST['codeD'];
                $destination = $_POST['destination'];
                $typeD = $_POST['typeD'];
                $nomdonneur = $_POST['nom_donneur'];
               

                if (
                    $donController->updateDon(
                        $doncodeD,
                        $codeD,
                        $destination,
                        $nom_donneur,

                        
                    )
                ) {
                    header("Location: ListDon.php");
                    exit();
                } else {
                    echo "Error updating the donnation.";
                }
            } */
            // Importations nécessaires


$error = "";

// create client
$don = null;

// create an instance of the controller
$donC = new donC();

if (
    isset($_POST["codeD"]) &&
    isset($_POST["destination"]) &&
    isset($_POST["typeD"]) &&
    isset($_POST["nom_donneur"]) 

) {
    if (
        isset($_POST["codeD"]) &&
        !empty($_POST['destination']) &&
        !empty($_POST["typeD"]) &&
        !empty($_POST["nom_donneur"]) 
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $don = new don(
            $_POST['codeD'],
            $_POST['destination'],
            $_POST['typeD'],
            $_POST['nom_donneur']

        );

        //var_dump($client);
        
        $donC->updateDon($client, $_POST['codeD']);
        header('Location:ListDon.php');
    } else
        $error = "Missing information";
}

            ?>
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

    <h1>Update donnation</h1>

            <form method="post" action="">
                <label for="CodeD">codeD:</label>
                <input type="text" name="codeD" value="<?php echo $_POST['codeD']; ?>"readonly />

                <label for="destination">destination:</label>
                <input type="text" name="destination" value="<?php echo $don['destination']; ?>"/>

                <label for="typeD">typeD:</label>
                <input type="text" name="typeD" value="<?php echo $don['typeD']; ?>"/>

                <label for="nom _donneur">nom donneur:</label>
                <input type="text" name="nom_donneur" value="<?php echo $don['nom_donneur']; ?>"/>

                

                <input type="submit" value="Update">
            </form>
</body>

</html>