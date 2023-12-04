<?php

include '../Controller/reponseC.php';
include '../Model/reponse.php';
$error = "";

// create client
$reponse = null;
// create an instance of the controller
$reponseC = new reponseC();


if (
    isset($_POST["response"]) &&
    isset($_POST["idreclamation"])
) {
    if (
        !empty($_POST["response"]) &&
        !empty($_POST["idreclamation"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $reponse = new reponse(
            null,
            $_POST['response'],
            $_POST['idreclamation']
        );
        var_dump($reponse);
        
        $reponseC->updateReponse($reponse, $_POST['id']);

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
    if (isset($_POST['id'])) {
        $reponse = $reponseC->showReponse($_POST['id']);
        
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
                    <td><label for="response">response :</label></td>
                    <td>
                        <input type="text" id="response" name="response" value="<?php echo $reponse['response'] ?>" />
                        <span id="erreurMessage" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="idreclamation">ID reclamation :</label></td>
                    <td>
                        <input type="text" id="idreclamation" name="idreclamation" value="<?php echo $reponse['idreclamation'] ?>" />
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