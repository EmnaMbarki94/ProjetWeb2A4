<?php
include '../Controller/reclamationC.php';

$c = new reclamationC();
$tab = $c->listReclamation();

?>
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
<center>
    <h1>List of reclamtion</h1>
    <h2>
        <a href="addReclamation.php">Add reclamation</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id reclamation</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Message</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $reclamation) {
    ?>

        <tr>
            <td><?= $reclamation['id']; ?></td>
            <td><?= $reclamation['nom']; ?></td>
            <td><?= $reclamation['email']; ?></td>
            <td><?= $reclamation['msg']; ?></td>
            <td align="center">
                <form method="POST" action="updateReclamation.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $reclamation['id']; ?> name="id">
                </form>
            </td>
            <td>
                <a href="deleteReclamation.php?id=<?php echo $reclamation['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>