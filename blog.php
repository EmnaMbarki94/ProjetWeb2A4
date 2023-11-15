<?php

$servername = "localhost"; // Your MySQL server name
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "blog"; // Your MySQL database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form for adding a blog post is submitted
if (isset($_POST['addPost'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Insert data into the 'posts' table
    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "Added Post: Title - $title, Content - $content";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Check if the form for updating a blog post is submitted
if (isset($_POST['updatePost'])) {
    $postId = $_POST['updateId'];
    $newContent = $_POST['updateContent'];

    // Update data in the 'posts' table
    $sql = "UPDATE posts SET content='$newContent' WHERE id='$postId'";

    if ($conn->query($sql) === TRUE) {
        echo "Updated Post ID $postId with new content: $newContent";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Check if the form for deleting a blog post is submitted
if (isset($_POST['deletePost'])) {
    $postIdToDelete = $_POST['deleteId'];

    // Delete data from the 'posts' table
    $sql = "DELETE FROM posts WHERE id='$postIdToDelete'";

    if ($conn->query($sql) === TRUE) {
        echo "Deleted Post ID: $postIdToDelete";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();

?>
