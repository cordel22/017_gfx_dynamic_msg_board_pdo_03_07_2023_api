


<?php

//  Check for a thread ID...
//  Run the query:

$q = "SELECT t.subject, p.message, username, DATE_FORMAT($posted, '%e-%b-%y %l:%i %p') AS
      posted FROM threads AS t LEFT JOIN posts AS p USING (thread_id) INNER JOIN users AS u ON
      p.user_id = u.user_id WHERE t.thread_id = $tid ORDER BY p.posted_on ASC";
  //  $r = mysqli_query($dbc, $q);
  $stmt = $pdo->query($q);
  $row_count = $stmt->rowCount();