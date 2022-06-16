<?php

class Topic
{
    private $filename;
    private $name;
    private $posts;
    private $author;

    public function __construct($name, $author, $filename)
    {
        $this->name = $name;
        $this->author = $author;
        $this->posts = array();
        if($filename == null) {
            $this->filename = uniqid() . ".csv";
        } else {
            $this->filename = $filename;
        }
    }

    public function getFilename()
    {
        return $this->filename;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPosts()
    {
        return $this->posts;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function addPost($post) {
        $this->posts[] = $post;
    }

    public function addPosts($posts) {
        if(is_array($posts) || is_object($posts)) {
            foreach($posts as $post) {
                $this->addPost($post);
            }
        }
    }

    public function setPosts($posts) {
        if(is_array($posts)) {
            $this->posts = $posts;
        }
    }

    public function __toString()
    {
        return "name: $this->name, author: $this->author, filename: $this->filename";
    }


}