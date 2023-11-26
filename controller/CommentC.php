<?php

include_once '../config.php'; // Assuming you have a config.php file

class CommentC
{

    public function listComments()
    {
        $sql = "SELECT * FROM tcomment";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteComment($id)
    {
        $sql = "DELETE FROM tcomment WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addComment($comment)
{
    $sql = "INSERT INTO tcomment (comment, name, blogref) VALUES (:comment, :name, :blogref)";
    $db = Config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'comment' => $comment->getComment(),
            'name' => $comment->getName(),
            'blogref' => $comment->getBlogRef(), // Add the blogref parameter
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    function showComment($id)
    {
        $sql = "SELECT * FROM tcomment WHERE id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $comment = $query->fetch();
            return $comment;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateComment($comment, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE tcomment SET 
                    comment = :comment, 
                    name = :name
                WHERE id = :id'
            );

            $query->execute([
                'id' => $id,
                'comment' => $comment->getComment(),
                'name' => $comment->getName(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
