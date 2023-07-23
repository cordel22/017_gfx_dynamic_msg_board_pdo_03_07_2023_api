<?php # Script 17.4 - forum.php
//  This page shows the threads in  forum.
//  TODO: the redirect crashes the async
//  To redirect from "index.php" to "indexapi.php" when the page loads in the browser, you can use PHP's header() function. However, to ensure that "index.php" remains accessible for synchronous JavaScript calls, you need to add a condition to the redirection.
//  You can use the $_SERVER['HTTP_ACCEPT'] header to check if the request is coming from JavaScript (Ajax) or a regular browser request. When JavaScript makes a synchronous XMLHttpRequest, it typically sends the header "application/json, text/javascript, /; q=0.01" in the "HTTP_ACCEPT" field.
// Check if the request is from JavaScript (Ajax)

// $isAjaxRequest = isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'json') !== false;
// if (!$isAjaxRequest) {
//   // Redirect to indexapi.php if the request is not from JavaScript (Ajax)
//   header('Location: forumapi.php');
//   exit;
// }

// Continue with the regular content of index.php for synchronous JavaScript calls.
// Your PHP code to interact with the database and serve the content for synchronous requests goes here.
//  TODO, instead of the header html just the php part of it above
include('restfulphp/headerapi.php');


//  Retrieve all the messages in this forum...

//  If the user is logged in and has chosen a time zone,
//  use that to convert the dates and times:
require_once('./misc/converttz.php');

//  The query for retrieving all the threads in this forum, along with the original user,
//  when the thread was first posted, when it was last replied to, and how many replies it's had:
require_once('./misc/allthreadsdatesnumreplies.php');

//  u dont need to show nothing from this module i guesss...
//  echo the json form of response, but maybe add it to one big json object or array
//  echo json_encode($stmt);

//  ob_start();
//  forum table
require_once('./misc/forumtable.php');
//  guess this table will be put into json and needs frontend!
//  $forumTableJSON = ob_get_clean();

/*
// Build the data structure for the response
$data = [
    'forum_table' => json_decode($forumTableJSON, true),
    'threads' => $stmt
];

// Convert the data to JSON format
$jsonResponse = json_encode($data);

// Echo the JSON-encoded response
echo $jsonResponse;
*/

// Build the data structure for the response
/*
$data = [
    'forum_table' => $jsonExportArr
  ];
  */
  // Convert the data to JSON format

  
  $jsonResponse = json_encode($jsonExportArr);

  // Echo the JSON-encoded response
  echo $jsonResponse;

//  Include the HTML footer file:
//  TODO, nateraz zavadza
//  include('includes/footer.html');
