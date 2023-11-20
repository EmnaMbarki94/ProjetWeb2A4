<?php
if (isset($_GET['codeD'])) {
    $codeD = $_GET['codeD'];
    
    require_once '../Controller/DonC.php';

    $donController = new donC();
    
    // Delete the organization
    if ($donController->deleteDon($codeD)) {
        header("Location: ListDon.php"); // Redirect to the list of donnation
        exit();
    } else {
        echo "Error deleting the donnation.";
    }
} else {
    echo "donnation codeD not specified.";
}
?>
