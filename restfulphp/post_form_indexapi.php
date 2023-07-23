<?php
if (!isset($words)) {
    header("Location: http://localhost:/indexapi.php");
    exit();
}

if (isset($_SESSION['user_id'])) {
    echo '<form id="postForm" accept-charset="utf-8" autocomplete="off">';
    if (isset($tid) && $tid) {
        echo '<h3>' . $words['post_a_reply'] . '</h3>';
        echo '<input name="tid" type="hidden" value="' . $tid . '" />';
    } else {
        echo '<h3>' . $words['new_thread'] . '</h3>';
        echo '<p><em>' . $words['subject'] . '</em>: <input name="subject" type="text" size="60" maxlengh="100" /></p>';
    }
    echo '<p><em>' . $words['body'] . '</em>: <textarea name="body" rows="10" cols="60"></textarea></p>';
    echo '<input type="submit" value="' . $words['submit'] . '" />';
    echo '</form>';
} else {
    echo '<p>You must be logged in to post messages.</p>';
}
?>
