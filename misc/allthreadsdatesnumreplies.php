<?php
//  The query for retrieving all the threads in this forum, along with the original user,
//  when the thread was first posted, when it was last replied to, and how many replies it's had:


$q = "SELECT t.thread_id, t.subject, username, COUNT(post_id) - 1 AS responses,
  MAX(DATE_FORMAT($last, '%e-%b-%y %l:%i %p')) AS last, MIN(DATE_FORMAT($first, '%e-%b-%y %l:%i %p')) 
  AS first FROM threads AS t INNER JOIN posts AS p USING (thread_id) INNER JOIN users AS u ON 
  t.user_id = u.user_id WHERE t.lang_id = {$_SESSION['lid']} GROUP BY (p.thread_id) ORDER BY last DESC";

$stmt = $pdo->query($q);
