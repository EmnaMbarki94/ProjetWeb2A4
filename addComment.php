<?php
// Import necessary files
include '../Controller/CommentC.php'; // Assuming you have a CommentC class
include '../model/Comment.php'; // Assuming you have a Comment class
include_once '../Controller/BlogC.php';
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

        $commentC->addComment($comment);
        header('Location: listComments.php'); // Assuming you have a listComments.php file
    } else {
        $error = "Missing information";
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
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

        select,
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
        <a href="listComments.php">Back to list</a>
        <hr>

        <div id="error">
            <?php echo $error; ?>
        </div>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="selectedBlog">Select Blog:</label></td>
                    <td>
                        <select id="selectedBlog" name="selectedBlog">
                            <?php foreach ($blogs as $blog) : ?>
                                <option value="<?php echo $blog['id']; ?>"><?php echo $blog['title']; ?></option>
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
    </div>
</body>

</html>
