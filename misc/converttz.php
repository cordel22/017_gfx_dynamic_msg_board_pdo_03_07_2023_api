<?php
//  If the user is logged in and has chosen a time zone,
//  use that to convert the dates and times:

if (isset($_SESSION['user_tz'])) {
    $first = "CONVERT_TZ(p.posted_on, 'UTC', '{$_SESSION['user_tz']}')";
    $last = "CONVERT_TZ(p.posted_on, 'UTC', '{$_SESSION['user_tz']}')";
  } else {
    $first = 'p.posted_on';
    $last = 'p.posted_on';
  }

  
  