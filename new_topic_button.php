<?php
    function createGoToNewTopicButton($filename) {
        echo '<form method="post" action="index.php" xmlns="http://www.w3.org/1999/html">
                          <div>
                            <label>Nowy temat został utworzony!</label>
                            <input type="hidden" name="current_topic" value="' . $filename . '"/>
                            <input type="submit" value="idź do nowego tematu" />
                          </div>
                        </form>';
    }
?>