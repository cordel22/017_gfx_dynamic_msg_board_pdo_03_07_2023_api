
<?php # Script 17.7 - post.php
//  This page handles the message post.
//  It also displays the form if creating a new thread.
//  include('includes/header.html');

//  TODO, instead of the header html just the php part of it above
include('restfulphp/headerapi.php');
//  include('includes/post_form.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //  Handle the form.

  //  Language ID is in the session.
  //  Validate thread ID ($tid), which may not be present:
  if (isset($_POST['tid']) && filter_var($_POST['tid'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
    $tid = $_POST['tid'];
  } else {
    $tid = FALSE;
  }

  //  If there's no thread ID, a subject must be provided:
  if (!$tid && empty($_POST['subject'])) {
    //  chatgpt
    //  $subject = FALSE;
    //  chatgpt
    //  TODO echo!!!
    //  echo '<p>Please enter a subject for this post.</p>';
    $error = array(
      'message' => 'Please enter a subject for this post.'
    );
    $errorJson = json_encode($error);
    header('Content-Type: application/json');
    echo $errorJson;
    // Redirect to indexapi.php
    //  header('Location: indexapi.php');
    exit;
  } elseif (!$tid && !empty($_POST['subject'])) {
    $subject = htmlspecialchars(strip_tags($_POST['subject']));
  } else {
    //  Thread ID, no need for subject.
    $subject = TRUE;
  }

  //  Validate the body:
  if (!empty($_POST['body'])) {
    $body = htmlentities($_POST['body']);
  } else {
    //  $body = FALSE;
    //  TODO echo!!!
    //  echo '<p>Please enter a body for this post.</p>';
    $error = array(
      'message' => 'Please enter a body for this post.'
    );
    $errorJson = json_encode($error);
    header('Content-Type: application/json');
    echo $errorJson;
    // Redirect to indexapi.php
    //  header('Location: indexapi.php');
    exit;
  }
  if ($subject && $body) {
    //  OK!

    //  Add the message to the database...

    if (!$tid) {
      //  Create a new thread.
      /* 
        //  https://stackoverflow.com/questions/3716373/real-escape-string-and-pdo
        //  Use prepared statements. Those keep the data and syntax apart, which removes the need for escaping MySQL data. See e.g. this tutorial. */
      require_once('./misc/newthread.php');

      //  if (mysqli_affected_rows($dbc) == 1) {
      //  https://stackoverflow.com/questions/10522520/pdo-were-rows-affected-during-execute-statement
      //  if ($r->rowCount() == 1) {
      if ($stmt->rowCount() == 1) {
        //  $tid = mysqli_insert_id($dbc);
        //  https://stackoverflow.com/questions/9753720/what-is-equivalent-of-mysql-insert-id-using-prepared-statement
        //  if ($r) {
        //  rowCount() is the most useless method in all database APIs. And your code is a perfect example of that.
        //  https://stackoverflow.com/questions/56738038/fatal-error-uncaught-error-call-to-a-member-function-rowcount-on-bool
        $tid = $pdo->lastInsertId();
      } else {
        //  TODO change the echo to JSON export and read it in indexapi.php under import table
        //  echo '<p>Your post could not be handled due to a system error.</p>';
        // Create an array for the error message
          $error = array(
            'message' => 'Your post could not be handled due to a system error.'
          );

          // Convert the error message array to JSON
          $errorJson = json_encode($error);

          // Set the response header to indicate JSON content
          header('Content-Type: application/json');

          // Echo the JSON error message
          echo $errorJson;

          // Redirect to indexapi.php
          //  header('Location: indexapi.php');
          exit;

      }
    } //  No $tid.

    if ($tid) {
      //  Add this to the replies table:
      
      require_once('./misc/add2repliestable.php');
      

      //  $r =mysqli_query($dbc, $q);

      //  success or fail condition
      require_once('./misc/successfail.php');

      //  chatgpt
      // Send the confirmation message as JSON
      //  TODO: chatgpt do you actually ever get back here from successfail.php..?
      $confirmation = array(
        'message' => 'Your post has been successfully submitted.'
    );
    $confirmationJson = json_encode($confirmation);
    header('Content-Type: application/json');
    echo $confirmationJson;
    exit;
      
    //  chatgpt

    } //  Valid $tid.
  } else {

    $error = array(
      'message' => 'Please enter a subject and body for this post.'
    );
    $errorJson = json_encode($error);
    header('Content-Type: application/json');
    echo $errorJson;
    exit;

    /*  this code seems duplicated, lower
    //  wtch out, you re in a json type file, change it!!!
    // Indicate the encoding:
   header ('Content-Type: text/html; charset=UTF-8');
    //  Include the form:
    include('includes/post_form.php');
    */
  }
} else {


  //  chtgpt

  //  include('includes/post_form.php');

  //  chatgpt

    // Invalid request method
    $error = array(
      'message' => 'Invalid request method. As in not POST, so jyst GET displays here from post.php'
    );
    $errorJson = json_encode($error);
    header('Content-Type: application/json');
    echo $errorJson;
    exit;
  //   do you need this? looks like it was in the indexapi already anyway

  //  TODO:   maybe some other files will need the form from here..?


  //  wtch out, you re in a json type file, change it!!!
  // Indicate the encoding:
  //  header ('Content-Type: text/html; charset=UTF-8');
  //  Display the form:
  //  include('includes/post_form.php');
  
}



//  include('includes/footer.html');
