<?php # Script 17.5 - read.php
//  This page shows the messages in  thread.
//  premature reincarnation
//  include('includes/header.html');

//  TODO, instead of the header html just the php part of it above
include('restfulphp/headerapi.php');


//  Check for a thread ID...

$tid = FALSE;
if (isset($_GET['tid']) && filter_var($_GET['tid'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
  //  Create a shorthand version of the thread ID:
  $tid = $_GET['tid'];

  //  Convert the date if the user is logged in:
  require_once('./misc/convertdate.php');

  //  Run the query:
  require_once('./misc/checkthreadidquery.php');
//  here comes the $row_count from

  
  //  if (!(mysqli_num_rows($r) > 0)) {
  if (!($row_count > 0)) {
    $tid = FALSE;   //  Invalid thread ID!
  }
} //    End of isset($_GET['tid']) IF.

$readExportArray = [];

if ($tid) {
  //  Get the messages in this thread...
  $printed = FALSE; //  Flag variable.

  $readExportArray[] = ['tid' => $tid];

  //  Fetch each:
  //  while ($messages = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
  while ($messages = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //  Only need to print the subject once!
    if (!$printed) {
      //  echo "<h2>{$messages['subject']}<h2>\n";
      //  dd the subject for JSON export
      $readExportArray[] = ['subject' => $messages['subject']];
      $printed = TRUE;
    }

    //  Print the message:  asi ani nie
    //  echo "<p>{$messages['username']} ({$messages['posted']})<br />{$messages['message']}</p><br />\n";
    $readExportArray[] = [
      'username' => $messages['username'],
      'posted' => $messages['posted'],
      'message' => $messages['message']
    ];
  } //  End of WHILE loop.

    // Convert the data to JSON format
    $jsonResponse = json_encode($readExportArray);

    // Echo the JSON-encoded response
    echo $jsonResponse;

  //  TODO move this to frontend
  //  Show the form to post a message:
  //  include('includes/post_form.php');
} else {
  //  Invalid thread ID!
  //  echo '<p>This page has been accessed in error.</p>';
  $jsonResponse = json_encode("This page has been accessed in error.");

    // Echo the JSON-encoded response
    echo $jsonResponse;
}

//  include('includes/footer.html');