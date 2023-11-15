<!DOCTYPE html>
<html>
<head>
    <title>List of donnation</title>
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
    <h1>List of donnation </h1>

    <?php
    require_once '../Controller/DonC.php';

    $donController = new DonC();
    $dons = $donController->listDon();

    if ($dons->rowCount() > 0) {
        echo "<table border='1'>
        <tr>
            <th>codeD</th>
            <th>destination</th>
            <th>typeD</th>
            <th>nom_donneur </th>
            
        </tr>";

        while ($row = $dons->fetch()) {
            echo "<tr>
            <td>" . $row['codeD'] . "</td>
            <td>" . $row['destination'] . "</td>
            <td>" . $row['typeD'] . "</td>
            <td>" . $row['nom_donneur'] . "</td>
            
            <td><a href='delete_Don.php?codeD=" . $row['codeD'] . "'>Delete</a></td>    
            <td><a href='updateDon.php?codeD=". $row['codeD'] ."'>Update</a></td>
        
            </tr>";
        }

        echo "</table>";
    } else {
        echo "No donnation were found in the database.";
    }
    ?>
</body>
</html>
