const emojis = ["🙂", "😉", "🍅", "😆", "🤣", "🙃", "😂", "😇", "😎", "🧐", "😍", "😘", "🤩", "😝", "🤗", "😐", "😒", "😪",
    "🥵", "🥶", "😕", "😱", "😠", "😈", "👍", "💪", "😥", "😢", "🙁"];

function showHideEmojis() {
    let emojiContainer = document.getElementById('emoji_container');
    if(emojiContainer.innerHTML === "") {
        for(let emoji of emojis) {
            showEmoji(emoji);
        }
    } else {
        emojiContainer.innerHTML = "";
    }
}

function showEmoji(emoji) {
    let div = document.createElement('div');
    div.classList.add("emoji");
    div.innerHTML = emoji;
    div.addEventListener('click', function() {
        useEmoji(emoji);
    });
    document.getElementById('emoji_container').appendChild(div);
}
function useEmoji(emoji) {
    document.new_post_form.post_content.value += emoji;
}

