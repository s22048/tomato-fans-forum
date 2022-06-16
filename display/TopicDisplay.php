<?php

class TopicDisplay
{
    public static function display($topic) {

        $filename = $topic->getFilename();
        $name = $topic->getName();
        $posts = $topic->getPosts();
        $author = $topic->getAuthor();
        ?>

        <div class="topic">
            <div class="author">
                <?php echo $topic->getAuthor(); ?>
            </div>
            <div class="name">
                <?php echo $topic->getName(); ?>
            </div>
        </div>

        <?php
        if(is_array($posts)) {
            foreach($posts as $post): ?>
                <div class="post">
                    <div class="author">
                        <?php echo $post->getAuthor(); ?>
                        </br>
                        <?php echo $post->getTime(); ?>
                    </div>
                    <div class="content">
                        <?php echo $post->getContent(); ?>
                    </div>
                </div>
            <?php endforeach;
        }
    }

}
?>