<?php
//  Display links based upon login status:

if (isset($_SESSION['user_id'])) {
    //  If this is the forum page, add  a link for posting new threads:
    if (basename($_SERVER['PHP_SELF']) == 'forum.php') {
      echo '<a href="post.php" class="navlink">' . $words['new_thread'] . '</a><br />';
    }

    //  Add the logout link:
    echo '<a href="logout.php" class="navlink">'
      . $words['logout'] . '</a><br />';
  } else {
    //  Register and login links:
    echo '<a href="register.php" class="navlink">' . $words['register'] . '</a><br />
    <a href="login.php" class-"navlink">' . $words['login'] . '</a><br />';
  }