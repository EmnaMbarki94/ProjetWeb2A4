<?php

include '../controller/cabinetC.php';
include '../model/cabinet.php';
$error = "";


$cabinet = null;
// create an instance of the controller
$cabinetC = new cabinetC();


if (
   
    isset($_POST["adresse_cabinet"])&&
    isset($_POST["specialite"])
) {
    if (
        
        !empty($_POST["adresse_cabinet"])&&
        !empty($_POST["specialite"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        //var_dump($_POST);
        $cabinet = new cabinet(
            null,
            
           
            $_POST['adresse_cabinet'],
            $_POST['specialite']
        );
        var_dump($cabinet);
        
        $cabinetC->updateCabinet($cabinet, $_POST['id_cabinet']);

        header('Location:listCabinet.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    <style>
        body {
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

        input,
        textarea {
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
</head>

<body>
    <button><a href="listCabinet.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_cabinet'])) {
        $cabinet = $cabinetC->showCabinet($_POST['id_cabinet']);
        
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="id_cabinet">Id cabinet :</label></td>
                    <td>
                        <input type="text" id="id_cabinet" name="id_cabinet" value="<?php echo $_POST['id_cabinet'] ?>" readonly />
                        <span id="erreurID" style="color: red"></span>
                    </td>
                </tr>
                
                <tr>
                    <td><label for="adresse_cabinet">Adresse cabinet:</label></td>
                    <td>
                        <input type="text" id="adresse_cabinet" name="adresse_cabinet" value="<?php echo $cabinet['adresse_cabinet'] ?>" />
                        <span id="erreurAdresse" style="color: red"></span>
                    </td>
               </tr>
            <tr>
                <td><label for="specialite">Specialite :</label></td>
                <td>
                    <input type="text" id="specialite" name="specialite" value="<?php echo $cabinet['specialite'] ?>" />
                    <span id="erreurSpecialite" style="color: red"></span>
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