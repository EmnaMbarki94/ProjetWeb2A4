<?php 
session_start();

if (isset($_SESSION['email'])) {
    include '../Controller/clientC.php';
    include '../Model/client.php';

    $user = null;
    $userc = new clientC();

    // Récupérer les données de l'utilisateur
    $user = $userc->getClientByEmail($_SESSION['email']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (
            isset($_POST["idClient"]) &&
            isset($_POST["nom"]) &&
            isset($_POST["prenom"]) &&
            isset($_POST["email"]) &&
            isset($_POST["numTel"])&&
            isset($_POST["mdp"]) &&
            isset($_POST["rolee"])
        ) {
            if (
                !empty($_POST['nom']) &&
                !empty($_POST["prenom"]) &&
                !empty($_POST["email"]) &&
                !empty($_POST["numTel"])&&
                !empty($_POST["mdp"]) 
                //!empty($_POST["rolee"])
            ) {
                foreach ($_POST as $key => $value) {
                    echo "Key: $key, Value: $value<br>";
                }
                $user = new client(
                    $_POST['idClient'],
                    $_POST['nom'],
                    $_POST['prenom'],
                    $_POST['email'],
                    $_POST['numTel'],
                    $_POST['mdp'],
                    $_POST['rolee']
                );
            $updateResult = $userc->updateClient($user, $_SESSION['idClient']);

            if ($updateResult) {
                header("Location: editProfile.php?success=Profil mis à jour avec succès");
                exit;
            } 
        } 
    }
    }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    .w-450 {
	width: 450px;
    }
    .vh-100 {
        min-height: 100vh;
    }
    .w-350 {
        width: 350px;
    }
</style>
<body>
    <?php if ($user) { ?>

    <div class="d-flex justify-content-center align-items-center vh-100">
        
        <form class="shadow w-450 p-3" 
              action="" 
              method="post"
              enctype="multipart/form-data">

            <h4 class="display-4  fs-1">Edit Profile</h4><br>
            <!-- error -->
            <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>
            
            <!-- success -->
            <?php if(isset($_GET['success'])){ ?>
            <div class="alert alert-success" role="alert">
              <?php echo $_GET['success']; ?>
            </div>
            <?php } ?>
            <div class="mb-3">
            <label class="form-label">ID</label>
            <input type="text" 
                   class="form-control"
                   name="idClient"
                   value="<?php echo $user['idClient'] ?>" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" 
                   class="form-control"
                   name="nom"
                   value="<?php echo $user['nom'] ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" 
                   class="form-control"
                   name="prenom"
                   value="<?php echo $user['prenom'] ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" 
                   class="form-control"
                   name="email"
                   value="<?php echo $user['email']?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" 
                   class="form-control"
                   name="numTel"
                   value="<?php echo $user['numTel'] ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="text" 
                   class="form-control"
                   name="mdp"
                   value="<?php echo $user['mdp']?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Role</label>
            <input type="text" 
                   class="form-control"
                   name="rolee"
                   value="<?php echo $user['rolee'] ?>" readonly>
          </div>
          
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="index.php" class="link-secondary">Home</a>
        </form>
    </div>
    <?php }else{ 
        header("Location: index.php");
        exit;
    } ?>
</body>
</html>

<?php } else {
	header("Location: connectClient.php");
	exit;
} ?>
</html>