<?php
include '../Controller/CommentC.php'; // Assuming you have a CommentC class
$commentC = new CommentC();
$commentC->deleteComment($_GET["id"]);
header('Location: listComments.php'); // Assuming you have a listComments.php file
