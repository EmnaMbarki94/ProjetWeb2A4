<?php

class Comment
{
    private ?int $id = null;
    private ?string $comment = null;
    private ?string $name = null;
    private ?int $blogref = null; // Add the blogref property

    public function __construct($id = null, $comment, $name, $blogref = null)
    {
        $this->id = $id;
        $this->comment = $comment;
        $this->name = $name;
        $this->blogref = $blogref;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    // Add the getBlogRef method
    public function getBlogRef()
    {
        return $this->blogref;
    }
}
