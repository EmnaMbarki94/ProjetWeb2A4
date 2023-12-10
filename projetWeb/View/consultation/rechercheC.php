<?php
include "C:/xampp/htdocs/gestionComptes/config.php";
$db = config::getConnexion();
$output = '';

if (isset($_POST['query'])) {
    $search = '%' . $_POST['query'] . '%'; // Ajoutez les caractères de pourcentage ici
    $stmt = $db->prepare("SELECT * FROM consultation C join cabinet CA on C.id_cabinet=CA.id_cabinet WHERE adresse_cabinet LIKE :search OR id_consultation LIKE :search OR email_patient LIKE :search OR nom_medecin LIKE :search");
    $stmt->bindValue(':search', $search, PDO::PARAM_STR);
} else {
    $stmt = $db->prepare("SELECT * FROM consultation");
}

$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($result) > 0) {
    $output = "
    <thead>
    <tr>
    <th>Id Consultation</th>
    <th>Nom patient</th>
    <th>Email patient</th>
    <th>Nom medecin</th>
    <th>symtomes</th>
    <th>Date consultation</th>
    <th>Heure consultation</th>
    <th>Adresse cabinet</th>
    <th>Grade</th>
    <th>Update</th>
    <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    ";
    foreach ($result as $consultation) {
        $output .= "
        <tr>
            <td>" . $consultation['id_consultation'] . "</td>
            <td>" . $consultation['nom_patient'] . "</td>
            <td>" . $consultation['email_patient'] . "</td>
            <td>" . $consultation['nom_medecin'] . "</td>
            <td>" . $consultation['symtomes'] . "</td>
            <td>" . $consultation['date_consultation'] . "</td>
            <td>" . $consultation['heure_consultation'] . "</td>
            <td>" . $consultation['adresse_cabinet'] . "</td>
            <td>" . $consultation['grade'] . "</td>
            <td>Update</td>
            <td>Delete</td>
        </tr>
        ";
    }
    $output .= "</tbody>";
    echo $output;
}
?>
