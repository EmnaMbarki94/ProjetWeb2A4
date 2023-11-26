<?php
// Importations nécessaires
include '../Controller/BlogC.php'; // Assuming you have a BlogC class
include '../model/Blog.php'; // Assuming you have a Blog class

$error = "";

// create blog
$blog = null;

// create an instance of the controller
$blogC = new BlogC();

if (
    isset($_POST["title"]) &&
    isset($_POST["content"])
) {
    if (
        !empty($_POST['title']) &&
        !empty($_POST["content"])
    ) {
        $blog = new Blog(
            null,
            $_POST['title'],
            $_POST['content']
        );

        $blogC->addBlog($blog);
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
    <title>Blog</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        #error {
            color: red;
            margin-bottom: 10px;
        }

        input[type="submit"],
        input[type="reset"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50; /* Green color */
            color: white;
            margin-right: 5px;
        }

        input[type="reset"] {
            background-color: #808080; /* Grey color */
            color: white;
        }
    </style>
</head>

<body>
    <div>
        <a href="listBlogs.php">Back to list</a>
        <hr>

        <div id="error">
            <?php echo $error; ?>
        </div>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="title">Title:</label></td>
                    <td>
                        <input type="text" id="title" name="title" />
                        <span id="erreurTitle" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="content">Content:</label></td>
                    <td>
                        <input type="text" id="content" name="content" />
                        <span id="erreurContent" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Save">
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
