<?php
require_once "../controller/Livraisonc.php";

$LivraisonC = new LivraisonC();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['id_liv']) && isset($_POST['search']))
    {
        $codeD = $_POST['id_liv'];
        $list = $LivraisonC ->affichedons($codeD);
    }
}











?>