<?php
session_start();
if (! isset($_SESSION['email'])) {
  header("Location: connectClient.php");
  exit;
}
echo "Bienvenue " .$_SESSION['email'];
$email = $_SESSION['email'];
$idClient = $_SESSION['idClient'];
?>
<?php
//$absolutePath = $_SERVER['DOCUMENT_ROOT'];
// Import necessary files
include_once '../Controller/CommentC.php'; // Assuming you have a CommentC class
include_once  '../Model/Comment.php'; // Assuming you have a Comment class
include_once  '../Controller/BlogC.php';
$error = "";

// Create comment
$comment = null;

// Create an instance of the controller
$commentC = new CommentC();
$blogC = new BlogC();
$blogs = $blogC->listBlogs();

if (
  isset($_POST["comment"]) &&
  isset($_POST["name"]) &&
  isset($_POST["selectedBlog"]) // Added to get the selected blog ID
) {
  if (
    !empty($_POST['comment']) &&
    !empty($_POST["name"]) &&
    !empty($_POST["selectedBlog"])
  ) {
    $comment = new Comment(
      null,
      $_POST['comment'],
      $_POST['name'],
      $_POST['selectedBlog'] // Set the selected blog ID as blogref
    );
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $commentText = htmlspecialchars($_POST['comment']);
      $name = htmlspecialchars($_POST['name']);
      $selectedBlog = $_POST['selectedBlog'];

      $comment = new Comment(null, $commentText, $name, $selectedBlog);
      $commentC->addComment($comment);
    }

    //header('listComments.php'); // Assuming you have a listComments.php file
  } else {
    $error = "Missing information";
  }
}

?>
<html lang="en">

<head>
<title>Pharmative — Colorlib Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="templateF/fonts/icomoon/style.css">

  <link rel="stylesheet" href="templateF/css/bootstrap.min.css">
  <link rel="stylesheet" href="templateF/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="templateF/css/magnific-popup.css">
  <link rel="stylesheet" href="templateF/css/jquery-ui.css">
  <link rel="stylesheet" href="templateF/css/owl.carousel.min.css">
  <link rel="stylesheet" href="templateF/css/owl.theme.default.min.css">

  <link rel="stylesheet" href="./css/styelblog.css">
  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="templateF/css/style.css">
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #343a40;
        }

        header {
            background-color: #28a745;
            padding: 20px;
            color: #fff;
            text-align: center;
        }

       

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color:  #28a745;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #28a745;
        }
        
    </style>

</head>


<body >

<div class="site-wrap">


<div class="site-navbar py-2">

  <div class="search-wrap">
    <div class="container">
      <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
      <form action="#" method="post">
        <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
      </form>
    </div>
  </div>

  <div class="container">
  <div class="d-flex align-items-center justify-content-between">
  <div class="logo">
            <div class="site-logo">
              <a href="index.php" class="js-logo-clone"><strong class="text-primary">SPT </strong></a>
            </div>
          </div>
    <div class="main-nav d-none d-lg-block">
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <ul class="site-menu js-clone-nav d-none d-lg-block">
          <li ><a href="index.php">Home</a></li>
          <li><a href="Magasin.php">Store</a></li>
          <li class="active"><a href="about.php">Blog</a></li>
          <li  class="has-children">
            <a href="#">Consultations</a>
            <ul class="dropdown">
              <li><a class="active" href="add_consultation.php">Add consultation</a></li>
              <li><a class="active" href="listCFront.php">List consultation</a></li> 
          </li>
        </ul>
       

        <li class="has-children">
            <a href="#">Donation</a>
            <ul class="dropdown">
              <li><a class="active" href="addDon.php">Donate</a></li>
          </li>
        </ul>
        </li>
        
        </li>
        <li class="has-children">
            <a href="#">Reclamation</a>
            <ul class="dropdown">
            <li><a class="active" href="addReclamation.php">Make a complaint</a></li>
            <li><a class="active" href="listReponseF.php">List Responses</a></li>
          </li>
        </ul>
          <li class="has-children">
            <a href="#">Settings</a>
            <ul class="dropdown">
              <li><a class="active" href="deconnexion.php">Deconnexion</a></li>
              <li><a class="active" href="editProfile.php">Edit profil</a></li>

              
          </li>
         
        
      </nav>
    </div>
    <div class="icons">
      
      <a href="panier.php" class="icons-btn d-inline-block bag">
        <span class="icon-shopping-bag"></span>
        <span class="number">3</span>
      </a>
      <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
          class="icon-menu"></span></a>
    </div>
  </div>
</div>
</div>

<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0">
        <a href="index.php">Home</a> <span class="mx-2 mb-0">/</span>
        <a href="about.php">blog</a>
      </div>
    </div>
  </div>
</div>
      
    </div>
  
    <div class="blog-post">
      <h2>Cancer</h2>
      <img src="./imageb/cancer.png" alt="image 1">
      <p class="post-meta">Posted on November 14, 2023</p>
      <p>Maladie provoquée par la transformation de cellules qui deviennent anormales et prolifèrent de façon excessive.
        Ces cellules déréglées finissent par former une masse qu'on appelle tumeur maligne.
        Les cellules cancéreuses ont tendance à envahir les tissus voisins et à se détacher de la tumeur.</p>
      <p>CONSIEL:</p>
      <p>Il est recommandé de ne pas fumer,
        de modérer sa consommation d'alcool,
        d'avoir une alimentation diversifiée et équilibrée,
        de surveiller son poids, de pratiquer une activité physique régulière et d'éviter l'exposition aux rayonnements
        UV.</p>
      <a href="https://www.e-cancer.fr/Dictionnaire/C/cancer">Read More</a>
      


    </div>

    <div class="blog-post">
      <h2>diabet</h2>
      <img src="./imageb/diabet.png" alt="image2">
      <p class="post-meta">Posted on November 15, 2023</p>
      <p>Le diabète est une maladie chronique qui se déclare lorsque le pancréas ne produit pas suffisamment d'insuline,
        ou lorsque l'organisme n'est pas capable d'utiliser efficacement l'insuline qu'il produit.</p>
      <p>CONSIEL:</p>
      <pre> #1 Mesurez régulièrement votre glycémie. ...
        #2 Mangez équilibré ...
        #3 Pratiquez une activité physique régulière et adaptée. ...
        #4 Améliorez la qualité de votre sommeil. ...
        #5 Réalisez fréquemment des examens de suivi avec votre médecin.</pre>

      <a href="https://www.federationdesdiabetiques.org/information/diabete">Read More</a>



    </div>

    <div class="blog-post">
      <h2>HYPER TENTION</h2>
      <img src="./imageb/tension.png" alt="image 3">
      <p class="post-meta">Posted on November 16, 2023</p>
      <p>L'hypertension (pression artérielle élevée) correspond à une pression trop élevée dans les vaisseaux sanguins
        (140/90 mmHg ou plus).
        Elle est fréquente mais peut être grave si elle n'est pas traitée.
        Les personnes souffrant d'hypertension artérielle peuvent ne pas ressentir de symptômes</p>
      <p>CONSIEL:</p>
      <pre>            Les mesures hygiénodiététiques en cas d'hypertension artérielle (HTA)
            régulariser son poids en cas de surpoids,
            mieux équilibrer son régime alimentaire et limiter sa consommation de sel,
            augmenter ses dépenses physiques et pratiquer une activité physique régulière et adaptée à sa condition physique.</pre>
      <a href="https://www.vidal.fr/maladies/coeur-circulation-veines/hypertension-arterielle/prevention.html">Read
        More</a>


     
    </div>
    <div class="blog-post">
      <h2>CONSIEL pour etre en bien sante :</h2>
      <img src="/imageb/bien etre.jpg" alt="">
      <p class="post-meta">Posted on November 16, 2023</p>
      <pre>Surveiller son alimentation. L'alimentation joue un rôle fondamental dans le bien-être et la santé. ...
            Pratiquer une activité physique régulière. ...
            Boire plus d'eau. ...
            Mieux dormir. ...
            Prendre le temps de se détendre. ...
            Sortir et voir du monde. ...
            Avoir une attitude positive. ...
            Éviter le tabac.</pre>
      <a href="https://www.vidal.fr/maladies/coeur-circulation-veines/hypertension-arterielle/prevention.html">Read
        More</a>


    </div>
    <form  method="POST">
        <table>
          <tr>
            <td><label for="selectedBlog">Select Blog:</label></td>
            <td>
              <select id="selectedBlog" name="selectedBlog">
                <?php foreach ($blogs as $blog): ?>
                  <option value="<?php echo $blog['id']; ?>">
                    <?php echo $blog['title']; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="comment">Comment :</label></td>
            <td>
              <input type="text" id="comment" name="comment" />
              <span id="erreurComment" style="color: red"></span>
            </td>
          </tr>
          <tr>
            <td><label for="name">Name :</label></td>
            <td>
              <input type="text" id="name" name="name" />
              <span id="erreurName" style="color: red"></span>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <input type="submit" value="Save">
              <input type="reset" value="Reset">
            </td>
          </tr>
        </table>
        <input type="hidden" name="blogref" value="<?php echo $blog['id']; ?>">
      </form>
    <?php
    // Get the selected blog ID from the form
    $selectedBlogID = isset($_GET['blog_id']) ? $_GET['blog_id'] : '';

    $c = new BlogC();
    $tab = $c->listeBlogsandComments();

    // Define the bad words
    $badWords = ['fuck', 'nigga', 'retard'];

    // Display the form with the dropdown
    echo "<form method='get' action=''>";
    echo "<label for='blog_id'>Select Blog ID:</label>";
    echo "<select name='blog_id' id='blog_id'>";
    echo "<option value=''>Select Blog ID</option>";

    // Assuming $blogIDs is an array containing all available blog IDs
    $blogIDs = [1, 2, 3, 4, 5]; // Replace with your actual blog IDs
    
    foreach ($blogIDs as $blogID) {
      echo "<option value='$blogID'>$blogID</option>";
    }

    echo "</select>";
    echo "<input type='submit' value='Show Blog'>";
    echo "</form>";

    // Display the result based on the selected blog ID
    foreach ($tab as $blog) {
      if ($selectedBlogID !== '' && $blog['id'] != $selectedBlogID) {
        continue; // Skip blogs that don't match the selected ID
      }

      // Censor bad words in blog title and content
      $censoredTitle = censorBadWords($blog['title'], $badWords);
      $censoredContent = censorBadWords($blog['content'], $badWords);

      echo "<div class='blog-container'>";
      echo "<h2>Blog ID: " . $blog['id'] . "</h2>";
      echo "<p class='blog-title'><strong>Title:</strong> " . $censoredTitle . "</p>";
      echo "<p class='blog-content'><strong>Content:</strong> " . $censoredContent . "</p>";

      echo "<div class='comments-container'>";
      echo "<p class='comments-title'><strong>Comments:</strong></p>";

      if (!empty($blog['comments'])) {
        echo "<ul class='comment-list'>";
        foreach ($blog['comments'] as $comment) {
          // Censor bad words in comments
          $censoredComment = censorBadWords($comment['comment'], $badWords);

          echo "<li class='comment'>";
          echo "<p><strong>Comment ID:</strong> " . $comment['id'] . "</p>";
          echo "<p><strong>Comment:</strong> " . $censoredComment . "</p>";
          echo "<p><strong>Name:</strong> " . $comment['name'] . "</p>";
          echo "</li>";
        }
        echo "</ul>";
      } else {
        echo "<p class='no-comments'>No comments available.</p>";
      }

      echo "</div>"; // Close comments-container
      echo "</div>"; // Close blog-container
    }

    // Function to censor bad words
    function censorBadWords($text, $badWords)
    {
      foreach ($badWords as $badWord) {
        $replacement = str_repeat('*', strlen($badWord));
        $text = str_ireplace($badWord, $replacement, $text);
      }
      return $text;
    }
    ?>



    

    <footer class="site-footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">

            <div class="block-7">
              <h3 class="footer-heading mb-4">About <strong class="text-primary">SPT </strong></h3>
              <p >Welcome to SPT Your Trusted Healthcare Hub
              At SPT, we are more than just a website 
              we are your dedicated health companion. SPT stands for
                [Santé pour tous in french], embodying our commitment to providing a Seamless, 
                Personalized, and Trustworthy healthcare experience.</p>
            </div>

          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Navigation</h3>
            <ul class="list-unstyled">
              <li><a href="#">Shop</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Reclamation</a></li>
              <li><a href="#">Consultation</a></li>
            </ul>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                <li class="phone"><a href="tel://21621022633">+216 21 022 633</a></li>
                <li class="email">SPT@gmail.com</li>
              </ul>
            </div>


          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank"
                class="text-primary"> To SPT</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>

        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

  <!-- Code injected by live-server -->
  <script>
    // <![CDATA[  <-- For SVG support
    if ('WebSocket' in window) {
      (function () {
        function refreshCSS() {
          var sheets = [].slice.call(document.getElementsByTagName("link"));
          var head = document.getElementsByTagName("head")[0];
          for (var i = 0; i < sheets.length; ++i) {
            var elem = sheets[i];
            var parent = elem.parentElement || head;
            parent.removeChild(elem);
            var rel = elem.rel;
            if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
              var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
              elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
            }
            parent.appendChild(elem);
          }
        }
        var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
        var address = protocol + window.location.host + window.location.pathname + '/ws';
        var socket = new WebSocket(address);
        socket.onmessage = function (msg) {
          if (msg.data == 'reload') window.location.reload();
          else if (msg.data == 'refreshcss') refreshCSS();
        };
        if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
          console.log('Live reload enabled.');
          sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
        }
      })();
    }
    else {
      console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
    }
    // ]]>
  </script>
  <script src="./js/blog (1).js"></script>

</body>

</html>