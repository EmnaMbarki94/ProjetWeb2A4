<?php
include "C:/xampp/htdocs/gestionComptes/config.php";
$db = config::getConnexion();
$output = '';

if (isset($_POST['query'])) {
    $search = '%' . $_POST['query'] . '%'; // Ajoutez les caractères de pourcentage ici
    $stmt = $db->prepare("SELECT * FROM cabinet WHERE adresse_cabinet LIKE :search OR specialite LIKE :search");
    $stmt->bindValue(':search', $search, PDO::PARAM_STR);
} else {
    $stmt = $db->prepare("SELECT * FROM cabinet");
}

$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($result) > 0) {
    $output = "
    <thead>
    <tr>
    <th>Id cabinet</th>
    <th>Adresse du cabinet</th>
    <th>Specialite du medecin</th>
    <th>Update</th>
    <th>Delete</th>
</tr>
    </tr>
    </thead>
    <tbody>
    ";
    foreach ($result as $cabinet) {
        $output .= "
        <tr>
            <td>" . $cabinet['id_cabinet'] . "</td>
            <td>" . $cabinet['adresse_cabinet'] . "</td>
            <td>" . $cabinet['specialite'] . "</td>
           
            <td>Update</td>
            <td>Delete</td>
        </tr>
        ";
    }
    $output .= "</tbody>";
    echo $output;
}
?>
