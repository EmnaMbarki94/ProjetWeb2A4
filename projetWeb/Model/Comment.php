<?php
class Comment {
    private $id;
    private $comment;
    private $name;
    private $blogref;

    public function __construct($id, $comment, $name, $blogref) {
        $this->id = $id;
        $this->comment = $comment;
        $this->name = $name;
        $this->blogref = $blogref;
    }

    public function getId() {
        return $this->id;
    }

    public function getComment() {
        return $this->comment;
    }

    public function getName() {
        return $this->name;
    }

    public function getBlogRef() {
        return $this->blogref;
    }
}
?>
