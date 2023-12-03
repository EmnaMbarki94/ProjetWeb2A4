<?php
session_start();
if (! isset($_SESSION['email'])) {
  header("Location: connectClient.php");
  exit;
}
echo "Bienvenue " .$_SESSION['email'];
$email = $_SESSION['email'];
?>

<?php
include "../Controller/clientC.php";

$c = new clientC();
$tab = $c->listClients(); 
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SPT Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="templateB/template/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="templateB/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="templateB/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="templateB/template/images/favicon.png" />
</head>
<body>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="templateB/template/index.html">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
              <div class="badge badge-danger">new</div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="typcn typcn-film menu-icon"></i>
              <span class="menu-title">Form elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="typcn typcn-chart-pie-outline menu-icon"></i>
              <span class="menu-title">Charts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="typcn typcn-compass menu-icon"></i>
              <span class="menu-title">Icons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="typcn typcn-user-add-outline menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="typcn typcn-globe-outline menu-icon"></i>
              <span class="menu-title">Error pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="listClients.php">
              <i class="typcn typcn-mortar-board menu-icon"></i>
              <span class="menu-title">Liste des clients</span>
            </a>
            <a class="nav-link" href="listPharmacies.php">
              <i class="typcn typcn-mortar-board menu-icon"></i>
              <span class="menu-title">Liste des pharmacies</span>
            </a>
          </li>
          
        </ul>
      </nav>
      
<div class="formulaire">
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Client</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Tel</th>
        <th>mdp</th>
        <th>Role</th>
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
            <td><?= $client['mdp']; ?></td>
            <td><?= $client['rolee']; ?></td>
            <td>
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

<form method="POST" action="">
    <label for="idClient">Entrez l'id du client :</label>
    <input type="text" name="idClient" id="idClient" required>
    <input type="submit" value="Rechercher" name="search">
    <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['idClient']) && !empty($_POST['idClient'])) {
        $idClient = $_POST['idClient'];
        $client=$c->showClient($idClient);
        if ($client) {
          // Affichage des détails du client
          echo "<h2>Détails du client :</h2>";
          echo "<p>ID du client : " . $client['idClient'] . "</p>";
          echo "<p>Mot de passe : " . $client['mdp'] . "</p>";
          echo "<p>Nom : " . $client['nom'] . "</p>";
        } else {
          echo "Aucun client trouvé avec cet email.";
        } 
    }
  }
?>
</form>
</div>
<style>
        body {
            display:flex;
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
            margin: 50px 10px auto;
            border-collapse: collapse;
            padding: 50px auto;
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

</body>
</html>