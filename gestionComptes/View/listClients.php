<?php
include "../Controller/clientC.php";

$c = new ClientC();
$tab = $c->listClients();

?>

<center>
    <h1>Liste des clients</h1>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Client</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Tel</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $client) {
    ?>

        <tr>
            <td><?= $client['idClient']; ?></td>
            <td><?= $client['nom']; ?></td>
            <td><?= $client['prenom']; ?></td>
            <td><?= $client['email']; ?></td>
            <td><?= $client['numTel']; ?></td>
            <td align="center">
                <form method="POST" action="updateClient.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $client['idClient']; ?> name="idClient">
                </form>
            </td>
            <td>
                <a href="deleteClient.php?id=<?php echo $client['idClient']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>

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