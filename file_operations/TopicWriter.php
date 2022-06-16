<?php

class TopicWriter{

    private $fileDirectory = __DIR__ . "\\..\\files\\";
    private $fileSeparator = ";";

    public function saveToFile($topic) {
        $filename = $this->fileDirectory . $topic->getFilename();
        $handle = fopen($filename, "w");

        foreach($topic->getPosts() as $post) {
            $line = $post->getAuthor() . $this->fileSeparator .  $post->getContent() . $this->fileSeparator . $post->getTime() . "\n";
            fwrite($handle, $line);
        }

        fclose($handle);
    }
}