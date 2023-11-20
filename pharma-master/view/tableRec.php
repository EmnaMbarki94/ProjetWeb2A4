<?PHP
	include "C:/xampp/htdocs/pharma-master/controler/reclamationC.php";


	$reclamationC=new reclamationC();
	$listeReclamation=$reclamationC->afficherReclamation();

    
if(isset($_POST['submit']))
{
    $listeReclamation=$reclamationC->afficherReclamation();
}

if(isset($_POST['ajout']))
{
    header ('Location:../reclamation/add.php');
}
?>


<center>
    <h1>les reclamations</h1>
    <h2>
        <a href="add.php">reclamer!</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>msg</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($listeReclamation as $reclamation) {
    ?>

        <tr>
            <td><?= $reclamation['id']; ?></td>
            <td><?= $reclamation['nom']; ?></td>
            <td><?= $reclamation['email']; ?></td>
            <td><?= $reclamation['message']; ?></td>
           
            <td align="center">
                <form method="POST" action="modify.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $reclamation['id']; ?> name="id">
                </form>
            </td>
            <td>
                <a href="delete.php?id=<?php echo $reclamation['id']; ?>">Supprimer</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<style>
  body{
    background: #84CB86;
}

