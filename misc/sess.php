<?php
session_start();
// For testing purposes:
$_SESSION['user_id'] = 1;
$_SESSION['user_tz'] = 'America/New_York';
// For logging out:
// $_SESSION = array();