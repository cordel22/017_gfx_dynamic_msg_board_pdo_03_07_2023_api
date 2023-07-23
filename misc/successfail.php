<?php
//  success or fail condition
if ($stmt->rowCount() == 1) {
    //  echo '<p>Your post has been entered.</p>';
    //  json
    $sux = array(
      'message' => 'Your post has been entered.'
    );

    // Convert the error message array to JSON
    header('Content-Type: application/json');
    $suxJson = json_encode($sux);

    // Set the response header to indicate JSON content
    //  header('Content-Type: application/json');

    // Echo the JSON error message
    echo $suxJson;

    // Redirect to indexapi.php
    //  header('Location: indexapi.php');
    exit;

  } else {
    //  echo '<p>Your post could not be handled due to a system error.</p>';
     //  json
     $error = array(
      'message' => 'Your post could not be handled due to a system error..'
    );

    // Convert the error message array to JSON
    header('Content-Type: application/json');
    $serrorJson = json_encode($error);

    // Set the response header to indicate JSON content
    //  header('Content-Type: application/json');

    // Echo the JSON error message
    echo $serrorJson;

    // Redirect to indexapi.php
    //  header('Location: indexapi.php');
    exit;
  }


