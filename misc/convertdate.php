

<?php

//  Convert the date if the user is logged in:

if (isset($_SESSION['user_tz'])) {
    $posted = "CONVERT_TZ(p.posted_on, 'UTC', '{$_SESSION['user_tz']}')";
  } else {
    $posted = 'p.posted_on';
  }



