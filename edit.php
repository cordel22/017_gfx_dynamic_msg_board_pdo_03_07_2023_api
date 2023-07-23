<?php

//  TODO, instead of the header html just the php part of it above
include('restfulphp/headerapi.php');


    $tid = $_POST['tid'];

    // Perform necessary database queries and operations for editing the thread

    // Redirect back to readapi.php?tid=<thread_id> after editing
    header("Location: readapi.php?tid=$tid");
    exit;
?>