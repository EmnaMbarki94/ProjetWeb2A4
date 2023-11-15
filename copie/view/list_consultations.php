
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
include "../controller/consultationC.php";

$c = new consultationC();
$tab = $c->listConsultation();

?>

<center>
    <h1>List of consultations</h1>
    <h2>
        <a href="add_consultation.php">Add consultation</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Consultation</th>
        <th>Nom patient</th>
        <th>Nom medecin</th>
        <th>Email patient</th>
        <th>symtomes</th>
        <th>Date consultation</th>
        <th>Heure consultation</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $consultation) {
    ?>

        <tr>
            <td><?= $consultation['id_consultation']; ?></td>
            <td><?= $consultation['nom_patient']; ?></td>
            <td><?= $consultation['nom_medecin']; ?></td>
            
            <td><?= $consultation['email_patient']; ?></td>
            <td><?= $consultation['symtomes']; ?></td>
            <td><?= $consultation['date_consultation']; ?></td>
            <td><?= $consultation['heure_consultation']; ?></td>
        
            <td align="center">
                <form method="POST" action="update_consultation.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $consultation['id_consultation']; ?> name="id_consultation">
                </form>
            </td>
            <td>
                <a href="deleteConsultation.php?id=<?php echo $consultation['id_consultation']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>

