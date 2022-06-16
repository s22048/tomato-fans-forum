<!--form.html-->

<form name="new_post_form" method="post" action="index.php" xmlns="http://www.w3.org/1999/html">

    <div class="form">

        <label> <b> Dodaj odpowiedź </b> </label><br/>

        <label>Twój nick: </label><br/>

        <input type="text" name="post_author" <?php
        if(isset($_COOKIE['nickname'])) {
            echo 'value="' . $_COOKIE['nickname'] . '"';
        } ?> required/><br/>

        <label>Treść: </label><br/>

        <textarea class="text" cols="80" rows ="10" name="post_content" required></textarea><br/>

        <input type="hidden" name="current_topic" <?php
        if(isset($_POST['current_topic'])) {
            echo 'value="' . $_POST['current_topic'] . '"';
        } ?>/>

        <div type="buttons_container">
            <button type="button" class="button" onclick="showHideEmojis()">emoji</button>
            <input type="submit" value="odpowiedz" required/>
        </div>
        <div id="emoji_container"></div>
    </div>

</form>