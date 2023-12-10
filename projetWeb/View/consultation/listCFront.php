<?php
require_once('C:/xampp/htdocs/gestionComptes/Controller/consultationC.php');

$c = new ConsultationC();
$tab = $c->listConsultation();
$cabinets=$c->listCabinet();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SPT &mdash; Colorlib Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link  href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="template/fonts/icomoon/style.css">

  <link rel="stylesheet" href="template/css/bootstrap.min.css">
  <link rel="stylesheet" href="template/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="template/css/magnific-popup.css">
  <link rel="stylesheet" href="template/css/jquery-ui.css">
  <link rel="stylesheet" href="template/css/owl.carousel.min.css">
  <link rel="stylesheet" href="template/css/owl.theme.default.min.css">


  <link rel="stylesheet" href="template/css/aos.css">

  <link rel="stylesheet" href="template/css/style.css">





    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Médecin</title>
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
    <style>
        body {
            background-color: #E8F5E9;
            font-family: Arial, sans-serif;
            margin: 0px;
            padding: 0;
        }
        h1 {
            color: #388E3C;
        }
        table {
            width: 80%;
            margin: 50px 0px auto;
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
   
    
   
    .star {
      font-size: 1.5rem;
    }
    .hover {
    color: rgb(255, 196, 0);
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
          <a href="index2.html" class="js-logo-clone"><strong class="text-primary">SPT</strong> santé pour tous</a>
        </div>
      </div>
      <div class="main-nav d-none d-lg-block">
        <nav class="site-navigation text-right text-md-center" role="navigation">
          <ul class="site-menu js-clone-nav d-none d-lg-block">
            <li ><a href="index2.html">Home</a></li>
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
            
            <li class="has-children">
              <a href="#">consultations</a>
              <ul class="dropdown">
                <li><a class="active" href="add_consultation.php">Demande consultation</a></li>
                <li><a class="active" href="listCFront.php">list consultation</a></li>
                  
            </li>
            
            
          </ul>
          <li ><a href="addCabinet.php">ADMIN</a></li>
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
<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="index2.html">Home</a> <span class="mx-2 mb-0">/</span>
            <a href="listCFront.php">list consultations</a><strong class="text-black"></strong>
          </div>
        </div>
      </div>
    </div>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Consultation</th>
        <th>Nom patient</th>
       
        <th>Email patient</th>
        <th>Nom medecin</th>
        <th>symtomes</th>
        <th>Date consultation</th>
        <th>Heure consultation</th>
        <th>Adresse cabinet</th>
        
        <th>update Grade</th>

        
    </tr>


    <?php
    foreach ($tab as $consultation) {
    ?>

        <tr>
            <td><?= $consultation['id_consultation']; ?></td>
            <td><?= $consultation['nom_patient']; ?></td>
            
            
            <td><?= $consultation['email_patient']; ?></td>
            <td><?= $consultation['nom_medecin']; ?></td>
            <td><?= $consultation['symtomes']; ?></td>
            <td><?= $consultation['date_consultation']; ?></td>
            <td><?= $consultation['heure_consultation']; ?></td>
            <td><?= $consultation['adresse_cabinet']; ?></td>
            


            <td id="id_consultation<?= $consultation['id_consultation']; ?>">
                <div class="note-container">
                    <!-- Display the star ratings -->
                    <h6 style="color: #75b239;">Avez-vous apprécié nos consultations ?</h6>
                    <i class="star" data-note="1">&#9733;</i>
                    <i class="star" data-note="2">&#9733;</i>
                    <i class="star" data-note="3">&#9733;</i>
                    <i class="star" data-note="4">&#9733;</i>
                    <i class="star" data-note="5">&#9733;</i>
                    <span class="note">Note:</span>
                </div>
                <form class="rating-form">
                    <!-- Hidden inputs to store consultation and rating information -->
                    <input type="hidden" value="<?= $consultation['id_consultation']; ?>" name="id_consultation">
                    <input type="hidden" class="rating-value" name="rating" value="">
                    <input type="hidden" name="row_index" value="<?= $consultation['id_consultation']; ?>">
                </form>
            </td>
        </tr>
    <?php } ?>
</table>

<script>
    // JavaScript code to handle star ratings
    const consultationRows = document.querySelectorAll('td[id^="id_consultation"]');

    consultationRows.forEach(row => {
        const stars = row.querySelectorAll('.star');

        stars.forEach(star => {
            star.addEventListener('mouseover', selectStars);
            star.addEventListener('mouseleave', unselectStars);
            star.addEventListener('click', activeSelect);
        });
    });

    function selectStars(e) {
        const selectedStar = e.target;
        const starsToHighlight = previousSiblings(selectedStar);
        starsToHighlight.forEach(star => {
            star.classList.add('hover');
        });
    }

    function unselectStars(e) {
        const selectedStar = e.target;
        const starsToUnhighlight = previousSiblings(selectedStar);
        starsToUnhighlight.forEach(star => {
            star.classList.remove('hover');
        });
    }

   

    
    function activeSelect(e) {
    const selectedStar = e.target;
    const ratingValue = selectedStar.getAttribute('data-note');
    const ratingForm = selectedStar.parentElement.nextElementSibling; // Assuming form is the next element
    const ratingInput = ratingForm.querySelector('.rating-value');
    const rowIndexInput = ratingForm.querySelector('input[name="row_index"]');
    ratingInput.value = ratingValue;

    // Get the row index to identify the specific consultation row
    const rowIndex = rowIndexInput.value;

    // Update the stars in the table immediately based on the user's selection
    const stars = ratingForm.parentElement.querySelectorAll('.star');
    stars.forEach(star => {
        star.classList.remove('selected'); // Remove 'selected' class from all stars
        if (star.getAttribute('data-note') <= ratingValue) {
            star.classList.add('selected'); // Add 'selected' class to stars up to the clicked one
        }
    });

    // Update the note based on the selected rating
    const noteElement = ratingForm.parentElement.querySelector('.note');
    noteElement.textContent = `Note: ${ratingValue}`;

    // AJAX request to update the database with the new rating
    const formData = new FormData();
    formData.append('id', rowIndex); 
    formData.append('rating', ratingValue); 
    fetch('updateRating.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            console.log(`Rating ${ratingValue} for consultation row ${rowIndex} updated in the database.`);
            // You can perform additional actions here if needed upon successful update
        } else {
            console.error('Failed to update rating in the database.');
        }
    })
    .catch(error => {
        console.error('Error occurred while updating rating:', error);
    });
   
}
function previousSiblings(element) {
        let siblings = [];
        while (element = element.previousElementSibling) {
            if (element.nodeName === 'I') {
                siblings.push(element);
            }
        }
        return siblings.reverse();
    }
</script>


   
  

    
  <script src="add_consu.js"></script>
  <script src="template/js/jquery-3.3.1.min.js"></script>
  <script src="template/js/jquery-ui.js"></script>
  <script src="template/js/popper.min.js"></script>
  <script src="template/js/bootstrap.min.js"></script>
  <script src="template/js/owl.carousel.min.js"></script>
  <script src="template/js/jquery.magnific-popup.min.js"></script>
  <script src="template/js/aos.js"></script>

  

</body>

   
  
</html>