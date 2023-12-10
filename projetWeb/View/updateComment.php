<?php
include '../Controller/CommentC.php'; // Assuming you have a CommentC class
include '../Model/Comment.php'; // Assuming you have a Comment class

$error = "";

// create comment
$comment = null;

// create an instance of the controller
$commentC = new CommentC();

if (
    isset($_POST["comment"]) &&
    isset($_POST["id"]) &&
    isset($_POST["name"])
) {
    if (
        !empty($_POST['comment']) &&
        !empty($_POST["id"]) &&
        !empty($_POST["name"])
    ) {
        $comment = new Comment(
            $_POST['id'],
            $_POST['comment'],
            $_POST['name']
        );

        $commentC->updateComment($comment, $_POST['id']);
        header('Location: listComments.php');
    } else {
        $error = "Missing information";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Update</title>
</head>

<body>
    <button><a href="listComments.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $comment = $commentC->showComment($_POST['id']);
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="id">Id Comment :</label></td>
                    <td>
                        <input type="text" id="id" name="id" value="<?php echo $_POST['id'] ?>" readonly />
                        <span id="erreurId" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="comment">Comment :</label></td>
                    <td>
                        <input type="text" id="comment" name="comment" value="<?php echo $comment['comment'] ?>" />
                        <span id="erreurComment" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="name">Name :</label></td>
                    <td>
                        <input type="text" id="name" name="name" value="<?php echo $comment['name'] ?>" readonly />
                        <span id="erreurName" style="color: red"></span>
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
