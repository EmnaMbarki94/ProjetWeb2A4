<!DOCTYPE html>
<html>
<head>
    <title>Consultations du Medecin</title>
    <style>
        body {
            background-color: #E8F5E9;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #388E3C;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #AAA;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #388E3C;
            color: #FFF;
        }
        tr:nth-child(even) {
            background-color: #FFF;
        }
        tr:nth-child(odd) {
            background-color: #E8F5E9;
        }
    </style>
<?php
include "../Controller/PharmacieC.php";

$m = new MedicamentC();
$tab = $m->listMedicaments();

?>

<center>
    <h1>List of medicaments</h1>
    <h2>
        <a href="addMedicaments.php">Add Medicament</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>codeM</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Quantite</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $medicaments) {
    ?>

        <tr>
            <td><?= $medicaments['codeM']; ?></td>
            <td><?= $medicaments['Nom']; ?></td>
            <td><?= $medicaments['Prix']; ?></td>
            <td>
            <?php
            // Vérifier si la clé "Quantite" existe avant de l'afficher
            if (isset($medicaments['Quantite'])) {
                echo $medicaments['Quantite'];
            } else {
                echo "N/A"; // Ou tout autre message indiquant que la clé est absente
            }
            ?>
            </td>
            <td align="center">
                <form method="POST" action="updateMedicaments.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $medicaments['codeM']; ?> name="codeM">
                </form>
            </td>
            <td>
                <a href="deleteMedicaments.php?id=<?php echo $medicaments['codeM']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>