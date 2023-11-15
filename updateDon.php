<!DOCTYPE html>
<html>

<head>
    <title>Update donnation</title>
</head>

<body>
    <h1>Update donnation</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['codeD'])) {
        $donscodeD = $_GET['codeD'];

        require_once '../Controller/DonC.php';
        $donController = new DonC();

        $don = $donController->getDonByCODED($DoncodeD);

        if ($dons) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $codeD = $_POST['codeD'];
                $destination = $_POST['destination'];
                $typeD = $_POST['typeD'];
                $nomdonneur = $_POST['nom_donneur'];
               

                if (
                    $donController->updateDon(
                        $DoncodeD,
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
            }
            ?>
            <form method="post" action="">
                <label for="CodeD">codeD:</label>
                <input type="text" name="codeD value="<?php echo $dons['codeD']; ?>" required><br>

                <label for="destination">destination:</label>
                <input type="text" name="destination" value="<?php echo $dons['destination']; ?>"><br>

                <label for="typeD">typeD:</label>
                <input type="text" name="typeD" value="<?php echo $dons['typeD']; ?>"><br>

                <label for="nom _donneur">nom donneur:</label>
                <input type="text" name="nom_donneur" value="<?php echo $dons['nom_donneur']; ?>"><br>

                

                <input type="submit" value="Update">
            </form>

            <?php
        } else {
            echo "donnation  not found.";
        }
    } else {
        echo "Invalid request.";
    }
    ?>
</body>

</html>