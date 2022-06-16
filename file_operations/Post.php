<?php

class Post
{
    private $author;
    private $content;
    private $time;

    public function __construct($author, $content, $time)
    {
        $this->author = $author;
        $this->content = $content;
        $this->time = $time;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function __toString()
    {
        return "author: " . $this->author . ", content: " . $this->content . ", time: " . $this->time;
    }
}