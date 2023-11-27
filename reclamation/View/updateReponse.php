<?php

include '../Controller/reponseC.php';
include '../Model/reponse.php';
$error = "";

// create client
$reponse = null;
// create an instance of the controller
$reponseC = new reponseC();


if (
    isset($_POST["response"])
) {
    if (
        !empty($_POST["response"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $reponse = new reponse(
            null,
            $_POST['response']
        );
        var_dump($reponse);
        
        $reponseC->updateReponse($reponse, $_POST['idRep']);

        header('Location:listReponse.php');
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
    <button><a href="listReponse.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idRep'])) {
        $reponse = $reponseC->showReponse($_POST['idRep']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">Id :</label></td>
                    <td>
                        <input type="text" id="idRep" name="idRep" value="<?php echo $_POST['idRep'] ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td><label for="response">response :</label></td>
                    <td>
                        <input type="text" id="response" name="response" value="<?php echo $reponse['response'] ?>" />
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