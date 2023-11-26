<?php

include_once '../config.php';

class BlogC
{

    public function listeBlogsandComments()
{
    try {
        $conn = Config::getConnexion();

        // Fetch blogs and their corresponding comments
        $sql = "SELECT tblog.id AS blog_id, title, content, tcomment.id AS comment_id, comment, name
                FROM tblog
                LEFT JOIN tcomment ON tblog.id = tcomment.blogref
                ORDER BY tblog.id, tcomment.id";

        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result === false) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } else {
            // Fetch the data
            $blogs = array();

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $blogId = $row['blog_id'];

                // If it's a new blog, create a new entry in the $blogs array
                if (!isset($blogs[$blogId])) {
                    $blogs[$blogId] = array(
                        'id' => $blogId,
                        'title' => $row['title'],
                        'content' => $row['content'],
                        'comments' => array()
                    );
                }

                // Add comments to the current blog entry
                if (!empty($row['comment_id'])) {
                    $blogs[$blogId]['comments'][] = array(
                        'id' => $row['comment_id'],
                        'comment' => $row['comment'],
                        'name' => $row['name']
                    );
                }
            }

            // Return the result
            return array_values($blogs);
        }
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

    
    public function listBlogs()
    {
        $sql = "SELECT * FROM tblog";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteBlog($id)
    {
        $sql = "DELETE FROM tblog WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addBlog($blog)
    {
        $sql = "INSERT INTO tblog (title, content) VALUES (:title, :content)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'title' => $blog->getTitle(),
                'content' => $blog->getContent(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showBlog($id)
    {
        $sql = "SELECT * FROM tblog WHERE id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $blog = $query->fetch();
            return $blog;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateBlog($blog, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE tblog SET 
                    title = :title, 
                    content = :content
                WHERE id = :id'
            );
            
            $query->execute([
                'id' => $id,
                'title' => $blog->getTitle(),
                'content' => $blog->getContent(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
