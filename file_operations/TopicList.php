<?php

class TopicList {
    private $filename = __DIR__ . "\\..\\files\\topics.csv";
    private $fileSeparator = ";";
    private $topics = array();

    public function __construct()
    {
        $handle = fopen($this->filename, "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $line = str_replace(array("\n", "\r"), '', $line);
                $splitted = explode($this->fileSeparator, trim($line));
                if(sizeof($splitted) == 3) {
                    $topic = new Topic($splitted[0], $splitted[1], trim($splitted[2]));
                    $this->addTopic($topic);
                }
            }

            fclose($handle);
        }
    }

    public function getTopics()
    {
        return $this->topics;
    }

    public function addTopic($topic) {
        $this->topics[$topic->getFilename()] = $topic;
    }

    public function addTopicAndSaveToFile($topic) {
        $this->addTopic($topic);
        $handle = fopen($this->filename, "a");
        if($handle) {
            $line = $topic->getName() . $this->fileSeparator . $topic->getAuthor() . $this->fileSeparator . $topic->getFilename() . "\n";
            fwrite($handle, $line);
            fclose($handle);
        }
    }

}