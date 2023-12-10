<?php
include "../Controller/BlogC.php"; // Assuming you have a BlogC class
?>

<style>
    .blog-container {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px;
    }

    .blog-title {
        font-size: 1.2em;
        margin-bottom: 5px;
    }

    .blog-content {
        margin-bottom: 10px;
    }

    .comments-container {
        margin-top: 10px;
    }

    .comments-title {
        font-weight: bold;
    }

    .comment-list {
        list-style-type: none;
        padding: 0;
    }

    .comment {
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 10px;
    }

    .no-comments {
        font-style: italic;
    }
</style>

<?php
$c = new BlogC();
$tab = $c->listeBlogsandComments();

// Display the result
foreach ($tab as $blog) {
    echo "<div class='blog-container'>";
    echo "<h2>Blog ID: " . $blog['id'] . "</h2>";
    echo "<p class='blog-title'><strong>Title:</strong> " . $blog['title'] . "</p>";
    echo "<p class='blog-content'><strong>Content:</strong> " . $blog['content'] . "</p>";
    
    echo "<div class='comments-container'>";
    echo "<p class='comments-title'><strong>Comments:</strong></p>";
    
    if (!empty($blog['comments'])) {
        echo "<ul class='comment-list'>";
        foreach ($blog['comments'] as $comment) {
            echo "<li class='comment'>";
            echo "<p><strong>Comment ID:</strong> " . $comment['id'] . "</p>";
            echo "<p><strong>Comment:</strong> " . $comment['comment'] . "</p>";
            echo "<p><strong>Name:</strong> " . $comment['name'] . "</p>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p class='no-comments'>No comments available.</p>";
    }

    echo "</div>"; // Close comments-container
    echo "</div>"; // Close blog-container
}
?>
