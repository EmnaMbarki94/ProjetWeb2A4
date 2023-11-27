<?php
include '../Controller/reponseC.php';

$c = new reponseC();
$tab = $c->listReponse();

?>
<head>
  <title>Pharmative &mdash; Colorlib Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="Front/front/css/bootstrap.min.css">
  <link rel="stylesheet" href="Front/front/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="Front/front/css/magnific-popup.css">
  <link rel="stylesheet" href="Front/front/css/jquery-ui.css">
  <link rel="stylesheet" href="Front/front/css/owl.carousel.min.css">
  <link rel="stylesheet" href="Front/front/css/owl.theme.default.min.css">


  <link rel="stylesheet" href="Front/front/css/aos.css">

  <link rel="stylesheet" href="Front/front/css/style.css">

</head>

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
    <body>

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
            <a href="index.html" class="js-logo-clone"><strong class="text-primary">Pharma</strong>tive</a>
          </div>
        </div>
        <div class="main-nav d-none d-lg-block">
          <nav class="site-navigation text-right text-md-center" role="navigation">
            <ul class="site-menu js-clone-nav d-none d-lg-block">
              <li ><a href="index.html">Home</a></li>
              <li><a href="shop.html">Store</a></li>
              <li class="has-children">
                <a href="#">Products</a>
                <ul class="dropdown">
                  <li><a href="#">Supplements</a></li>
                  <li class="has-children">
                    <a href="#">Vitamins</a>
                    <ul class="dropdown">
                      <li><a href="#">Supplements</a></li>
                      <li><a href="#">Vitamins</a></li>
                      <li><a href="#">Diet &amp; Nutrition</a></li>
                      <li><a href="#">Tea &amp; Coffee</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Diet &amp; Nutrition</a></li>
                  <li><a href="#">Tea &amp; Coffee</a></li>
                  
                </ul>
              </li>
              <li><a href="about.html">About</a></li>
              <li class="active"><a href="listReponse copy.php">reponse</a></li>
            </ul>
          </nav>
        </div>
        <div class="icons">
          <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
          <a href="cart.html" class="icons-btn d-inline-block bag">
            <span class="icon-shopping-bag"></span>
            <span class="number">2</span>
          </a>
          <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
              class="icon-menu"></span></a>
        </div>
      </div>
    </div>
  </div>


  
<center>
    <h1>List of response </h1>
    <h2>
        <a href="addReponse.php">Add response </a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id reponse</th>
        <th>Reponse</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $reponse) {
    ?>

        <tr>
            <td><?= $reponse['idRep']; ?></td>
            <td><?= $reponse['response']; ?></td>
            <td align="center">
                <form method="POST" action="updateReponse.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $reponse['idRep']; ?> name="idRep">
                </form>
            </td>
            <td>
                <a href="deleteReponse.php?id=<?php echo $reponse['idRep']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
    <script src="Front/front/js/jquery-3.3.1.min.js"></script>
  <script src="Front/front/js/jquery-ui.js"></script>
  <script src="Front/front/js/popper.min.js"></script>
  <script src="Front/front/js/bootstrap.min.js"></script>
  <script src="Front/front/js/owl.carousel.min.js"></script>
  <script src="Front/front/js/jquery.magnific-popup.min.js"></script>
  <script src="Front/front/js/aos.js"></script>

  <script src="Front/front/js/main.js"></script>

</body>
</table>
