<?php
//$absolutePath = $_SERVER['DOCUMENT_ROOT'];
include_once '../config.php';
include_once '../Model/Comment.php';

class CommentC {
    public function listComments() {
        $sql = "SELECT * FROM tcomment";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteComment($id) {
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

    public function addComment($comment) {
        $sql = "INSERT INTO tcomment (comment, name, blogref) VALUES (:comment, :name, :blogref)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'comment' => $comment->getComment(),
                'name' => $comment->getName(),
                'blogref' => $comment->getBlogRef(),
            ]);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function showComment($id) {
        $sql = "SELECT * FROM tcomment WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $comment = $query->fetch();
            return $comment;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function updateComment($comment, $id) {
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
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
