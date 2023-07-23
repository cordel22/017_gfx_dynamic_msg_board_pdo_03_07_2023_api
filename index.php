<?php # Script 17.3 - index.php
//  This is the main page for the site.

//  To redirect from "index.php" to "indexapi.php" when the page loads in the browser, you can use PHP's header() function. However, to ensure that "index.php" remains accessible for synchronous JavaScript calls, you need to add a condition to the redirection.

//  You can use the $_SERVER['HTTP_ACCEPT'] header to check if the request is coming from JavaScript (Ajax) or a regular browser request. When JavaScript makes a synchronous XMLHttpRequest, it typically sends the header "application/json, text/javascript, /; q=0.01" in the "HTTP_ACCEPT" field.

// Check if the request is from JavaScript (Ajax)
$isAjaxRequest = isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'json') !== false;

if (!$isAjaxRequest) {
  // Redirect to indexapi.php if the request is not from JavaScript (Ajax)
  header('Location: indexapi.php');
  exit;
}

// Continue with the regular content of index.php for synchronous JavaScript calls.

// Your PHP code to interact with the database and serve the content for synchronous requests goes here.



//  Include the HTML header:
include('restfulphp/headerapi.php');

//  The content on this page is introducty text
//  pulled from the database, based upon the 
//  selected language:

//  normal export:
//  echo $words['intro'];

//  json export
echo json_encode($words);

//  Include the HTML footer file:
//  include ('includes/footer.html');
