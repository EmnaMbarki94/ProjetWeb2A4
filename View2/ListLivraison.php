<!DOCTYPE html>
<html>
<head>
    <title>List of livraison </title>
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="bootstrap.min.css">
    
    <style>
        h1 { text-align: center;
        color : #437a1e;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .action-links {
            text-align: center;
        }

        .action-links a {
            margin: 0 5px;
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            background-color: #437a1e;
            border-radius: 3px;
        }

        .action-links a:hover {
            background-color: #345e17;
        }
        </style>
</head>
<body>
    <h1>List livraison </h1>

    <?php
    require_once '../Controller2/LivraisonC.php';

    $livraisonController = new LivraisonC ();
    $livraisons = $livraisonController->ListLivraison();

    if ($livraisons->rowCount() > 0) {
        echo "<table border='1'>
        <tr>
            <th>codeCom</th>
            <th>Destination</th>
            <th>nom</th>
            <th>numero_tele </th>
            
        </tr>";

        while ($row = $livraisons->fetch()) {
            echo "<tr>
            <td>" . $row['codeCom'] . "</td>
            <td>" . $row['Destination'] . "</td>
            <td>" . $row['nom'] . "</td>
            <td>" . $row['numero_tele'] . "</td>
            
            <td><a href='deleteLivraison.php?codeCom=" . $row['codeCom'] . "'>Delete</a></td>    
            <td><a href='updateLivraison.php?codeCom=". $row['codeCom'] ."'>Update</a></td>
        
            </tr>";
        }

        echo "</table>";
    } else {
        echo "aucune livraison .";
    }
    ?>
</body>
</html>
