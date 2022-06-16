<?php

class TopicListDisplay
{
    public static function display($topicList) {
        if(is_array($topicList)) {
            foreach($topicList as $topic): ?>
                <div class="topic" id="<?php echo $topic->getFilename() ?>" onclick="setPOST('<?php echo $topic->getFilename() ?>')">
                    <div class="author">
                        <?php echo $topic->getAuthor(); ?>
                    </div>
                    <div class="name">
                        <?php echo $topic->getName(); ?>
                    </div>
                </div>
            <?php endforeach;
        }
    }
}
?>