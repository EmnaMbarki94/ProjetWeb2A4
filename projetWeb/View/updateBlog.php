<?php

include '../Controller/BlogC.php'; // Assuming you have a BlogC class
include '../Model/Blog.php'; // Assuming you have a Blog class

$error = "";

// create blog
$blog = null;

// create an instance of the controller
$blogC = new BlogC();

if (
    isset($_POST["title"]) &&
    isset($_POST["content"]) &&
    isset($_POST["id"])
) {
    if (
        !empty($_POST['title']) &&
        !empty($_POST["content"]) &&
        !empty($_POST["id"])
    ) {
        $blog = new Blog(
            $_POST['id'],
            $_POST['title'],
            $_POST['content']
        );

        $blogC->updateBlog($blog, $_POST['id']);
        header('Location: listBlogs.php');
    } else {
        $error = "Missing information";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Update</title>
</head>

<body>
    <button><a href="listBlogs.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $blog = $blogC->showBlog($_POST['id']);
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="id">Id Blog :</label></td>
                    <td>
                        <input type="text" id="id" name="id" value="<?php echo $_POST['id'] ?>" readonly />
                        <span id="erreurId" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="title">Title :</label></td>
                    <td>
                        <input type="text" id="title" name="title" value="<?php echo $blog['title'] ?>" />
                        <span id="erreurTitle" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="content">Content :</label></td>
                    <td>
                        <input type="text" id="content" name="content" value="<?php echo $blog['content'] ?>" />
                        <span id="erreurContent" style="color: red"></span>
                    </td>
                </tr>

                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>
