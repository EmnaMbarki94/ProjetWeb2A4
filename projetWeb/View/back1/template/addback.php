
    <?php
    foreach ($comments as $comment) {
    ?>
        <tr>
            <td><?= $comment['id']; ?></td>
            <td><?= $comment['comment']; ?></td>
            <td><?= $comment['name']; ?></td>
            <td align="center">
                <form method="POST" action="updateComment.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?= $comment['id']; ?> name="id">
                    <input type="hidden" value=<?= $comment['name']; ?> name="name">
                </form>
            </td>
            <td>
                <a href="deleteComment.php?id=<?= $comment['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
