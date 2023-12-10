
<?php
include '../Controller/consultationC.php';
include '../Model/consultation.php';

$c = new ConsultationC();

var_dump('hello');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the rating and consultation ID from the POST data
    $rating = $_POST['rating'];
    $consultationID = $_POST['id'];
    var_dump($rating);
    $c->updateRate($rating,$consultationID);
   
}

?>