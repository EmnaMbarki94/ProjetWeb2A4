<?php
include "../controller/BlogC.php"; // Assuming you have a BlogC class

$c = new BlogC();
$tab = $c->listBlogs();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Blogs</title>
    <style>
        body {
            text-align: center;
            margin: auto;
            background-image:url("./front/imageb/logoprojet.png");
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
    <h1>List of blogs</h1>
    <h2>
        <a class="button" href="addBlog.php">Add blog</a>
    </h2>

    <table>
        <tr>
            <th>Id Blog</th>
            <th>Title</th>
            <th>Content</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php
        foreach ($tab as $blog) {
        ?>
            <tr>
                <td><?= $blog['id']; ?></td>
                <td><?= $blog['title']; ?></td>
                <td><?= $blog['content']; ?></td>
                <td>
                    <form method="POST" action="updateBlog.php">
                        <input class="button" type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $blog['id']; ?> name="id">
                    </form>
                </td>
                <td>
                    <a class="button" href="deleteBlog.php?id=<?php echo $blog['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
