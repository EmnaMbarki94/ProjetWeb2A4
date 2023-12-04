<?php

include '../Controller/DonC.php';  // Assuming you have a DonC.php file
include '../model/don.php';        // Assuming you have a Don.php file
$error = "";

// create donation
$donation = null;

// create an instance of the controller
$donC = new DonC();

if (
    isset($_POST["destination"]) &&
    isset($_POST["nom_donneur"]) &&
    isset($_POST["type"])
) {
    if (
        !empty($_POST['destination']) &&
        !empty($_POST["nom_donneur"]) &&
        !empty($_POST["type"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }

        // Create a new donation object
        $donation = new Don(
            null,
            $_POST['destination'],
            $_POST['nom_donneur'],
            $_POST['type']
        );
        var_dump($donation);

        // Update the donation
        $donC->updatedon($donation, $_POST['idDonation']);

        header('Location: listdon.php');
    } else {
        $error = "Missing information";
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Display</title>
</head>

<body>
    <button><a href="listdon.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idDonation'])) {
        // Retrieve the donation information
        $donation = $donC->showDon($_POST['idDonation']);
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="idDonation">Id Donation :</label></td>
                    <td>
                        <input type="text" id="idDonation" name="idDonation" value="<?php echo $_POST['idDonation'] ?>" readonly />
                        <span id="erreurIdDonation" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="destination">Destination :</label></td>
                    <td>
                        <input type="text" id="destination" name="destination" value="<?php echo $donation['destination'] ?>" />
                        <span id="erreurDestination" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom_donneur">Nom Donneur :</label></td>
                    <td>
                        <input type="text" id="nom_donneur" name="nom_donneur" value="<?php echo $donation['nom_donneur'] ?>" />
                        <span id="erreurNomDonneur" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="type">Type :</label></td>
                    <td>
                        <input type="text" id="type" name="type" value="<?php echo $donation['type'] ?>" />
                        <span id="erreurType" style="color red"></span>
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