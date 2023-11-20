<?php

include '../Controller/reclamationC.php';
include '../Model/reclamation.php';
$error = "";

// create client
$reclamation = null;
// create an instance of the controller
$reclamationC = new reclamationC();


if (
    isset($_POST["nom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["msg"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["email"]) &&
        !empty($_POST["msg"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $reclamation = new reclamation(
            null,
            $_POST['nom'],
            $_POST['email'],
            $_POST['msg']
        );
        var_dump($reclamation);
        
        $reclamationC->updateReclamation($reclamation, $_POST['id']);

        header('Location:listReclamation.php');
    } else
        $error = "Missing information";
}



?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listReclamation.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $reclamation = $reclamationC->showReclamation($_POST['id']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">Id :</label></td>
                    <td>
                        <input type="text" id="id" name="id" value="<?php echo $_POST['id'] ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $reclamation['nom'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                    <td><label for="email">Email :</label></td>
                    <td>
                        <input type="text" id="email" name="email" value="<?php echo $reclamation['email'] ?>" />
                        <span id="erreurEmail" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="msg">Message :</label></td>
                    <td>
                        <input type="text" id="msg" name="msg" value="<?php echo $reclamation['msg'] ?>" />
                        <span id="erreurMessage" style="color: red"></span>
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