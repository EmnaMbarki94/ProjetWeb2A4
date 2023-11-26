<?php
include "../controller/CommentC.php"; // Assuming you have a CommentC class

$commentC = new CommentC();
$comments = $commentC->listComments(); // Assuming you have a listComments method in CommentC
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Comments</title>
    <style>
        body {
            text-align: center;
            margin: auto;
            font-family: Arial, sans-serif;
        }

        h1, h2 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        a.button {
            display: inline-block;
            padding: 10px 15px;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>List of comments</h1>
    <h2>
        <a class="button" href="addComment.php">Add comment</a>
    </h2>

    <table>
        <tr>
            <th>Id Comment</th>
            <th>Comment</th>
            <th>Name</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php
        foreach ($comments as $comment) {
        ?>
            <tr>
                <td><?= $comment['id']; ?></td>
                <td><?= $comment['comment']; ?></td>
                <td><?= $comment['name']; ?></td>
                <td>
                    <form method="POST" action="updateComment.php">
                        <input class="button" type="submit" name="update" value="Update">
                        <input type="hidden" value=<?= $comment['id']; ?> name="id">
                        <input type="hidden" value=<?= $comment['name']; ?> name="name">
                    </form>
                </td>
                <td>
                    <a class="button" href="deleteComment.php?id=<?= $comment['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
