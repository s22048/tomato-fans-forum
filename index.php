<?php

require_once("./file_operations/Topic.php");
require_once("./file_operations/TopicList.php");
require_once("./file_operations/TopicReader.php");
require_once("./file_operations/TopicWriter.php");
require_once("./file_operations/Post.php");
require_once("./display/TopicListDisplay.php");
require_once("./display/TopicDisplay.php");
require_once("./new_topic_button.php");

$topicReader = new TopicReader();
$topicWriter = new TopicWriter();
$topicList = new TopicList();
$topics = $topicList->getTopics();

if(is_array($topics) || is_object($topics)) {
    foreach($topics as $topic) {
        $topicReader->read($topic);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style/main-style.css">
    <script src="./utilities.js" type="text/javascript"></script>
    <script src="./emoji/emojiHandler.js" type="text/javascript"></script>
</head>
<body>

<div class="header" onclick="emptyPost()">
    <h1>Forum fanów pomidorów</h1>
</div>

<div class="content">
    <?php
        if(isset($_POST['current_topic'])) {
            $topic_filename = $_POST['current_topic'];

            if(is_array($topics) || is_object($topics)) {
                $topic = $topics[$topic_filename];
                if(isset($_POST['post_author']) && isset($_POST['post_content'])) {
                    $author = $_POST['post_author'];
                    $postContent = $_POST['post_content'];
                    setcookie('nickname', $author, time() + 10000);
                    $date = date('d-m-Y H:i', time());
                    $post = new Post($author, $postContent, $date);
                    $topic->addPost($post);
                    $topicWriter->saveToFile($topic);
                }
                TopicDisplay::display($topic);
                include ('new_post_form.php');
            }
        } else if(isset($_POST['topic_author']) && isset($_POST['topic_name']) && isset($_POST['topic_content'])) {
            $author = $_POST['topic_author'];
            $topicName = $_POST['topic_name'];
            $topicContent = $_POST['topic_content'];
            setcookie('nickname', $author, time() + 10000);
            $topic = new Topic($topicName, $author, null);
            $date = date('d-m-Y H:i', time());
            $post = new Post($author, $topicContent, $date);
            $topic->addPost($post);
            $topics[] = $topic;
            $topicList->addTopicAndSaveToFile($topic);
            $topicWriter->saveToFile($topic);

            $filename = $topic->getFilename();
            createGoToNewTopicButton($filename);

        } else if(isset($_POST['create_new_topic'])) {
            include('new_topic_form.php');
        } else {
            TopicListDisplay::display($topics);
            include ('new_topic_button.html');
        }
        ?>
</div>
</body>
</html>