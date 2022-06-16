<!--form.html-->

<form method="post" action="index.php" xmlns="http://www.w3.org/1999/html">

    <div class="form">

        <label>Nowy temat </label><br/>

        <label>Twój nick: </label><br/>

        <input type="text" name="topic_author" <?php
        if(isset($_COOKIE['nickname'])) {
            echo 'value="' . $_COOKIE['nickname'] . '"';
        } ?> required/><br/>

        <label>Tytuł: </label><br/>

        <textarea class="text" cols="80" rows ="2" name="topic_name" required></textarea><br/>

        <label>Treść: </label><br/>

        <textarea class="text" cols="80" rows ="10" name="topic_content" required></textarea><br/>

        <input type="submit" value="załóż temat"/>

    </div>

</form>