<?php

class TopicReader {

    private $fileDirectory = __DIR__ . "\\..\\files\\";
    private $fileSeparator = ";";

    public function read($topic) {
        $filename = $this->fileDirectory . $topic->getFilename();
        if(file_exists($filename)) {
            $handle = fopen($filename, "r");
            $content = array();
            if ($handle) {
                while (($line = fgets($handle)) !== false) {
                    $splitted = explode($this->fileSeparator, $line);
                    if(sizeof($splitted) == 3) {
                        $post = new Post($splitted[0], trim($splitted[1]), trim($splitted[2]));
                        $content[] = $post;
                    }
                }

                fclose($handle);
            }
            $topic->setPosts($content);
        }
    }
}