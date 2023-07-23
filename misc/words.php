<?php
$q = "SELECT * FROM words WHERE lang_id = {$_SESSION['lid']}";

$stmt = $pdo->query($q);

$row_count = $stmt -> rowCount();  
if ($row_count == 0) {
  //  Invalid language ID!
  //  Use the default language:
  $_SESSION['lid'] = 1; //  Default.
  $q = "SELECT * FROM words WHERE lang_id = {$_SESSION['lid']}";

  $stmt = $pdo->query($q);
}

//  Fetch the results into a variable:

$words = $stmt->fetch(PDO::FETCH_ASSOC);

//  Free the results:

$stmt->closeCursor();