<?php
      //  Add this to the replies table:
$sql = "INSERT INTO posts (thread_id, user_id, message, posted_on) VALUES (:thread_id, :user_id, :message,  UTC_TIMESTAMP())";;
      
      $stmt = $pdo->prepare($sql);
      $r = $stmt->execute(array(
        ':thread_id' => $tid,
        ':user_id' => $_SESSION['user_id'],
        ':message' => $body //,
        
      ));


