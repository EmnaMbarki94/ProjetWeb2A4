<?php
include '../Controller/BlogC.php'; // Assuming you have a BlogC class
$blogC = new BlogC();
$blogC->deleteBlog($_GET["id"]);
header('Location: listBlogs.php');