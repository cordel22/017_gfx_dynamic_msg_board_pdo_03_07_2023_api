<?php
// update_thread.php

//  TODO, instead of the header html just the php part of it above
//  include('restfulphp/headerapi.php');
//  include('includes/header.html');
require_once('pdo.php');


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the thread ID and updated subject from the form
    $tid = $_POST['tid'];
    $subject = $_POST['subject'];
echo 'zaciname debubububug';
echo 'zaciname debubububug';
echo $_POST['subject'];
    // Validate the inputs (you can add more validation if needed)
    if (empty($tid) || empty($subject)) {
        //  TODO, make the ech messge dislay somewhere
        //  echo 'Invalid inputs. Please provide a valid thread ID and subject.';
        header('Location: readApi.php?tid=' . $tid);
        exit;
    }

    // Perform the necessary database operations to update the thread with the new subject
    // Make sure to properly handle database connections and queries
 /*
    // Example using PDO:
    try {
       
        $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', 'your_username', 'your_password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
*/
        // Update the thread subject in the database
        $stmt = $pdo->prepare('UPDATE threads SET subject = :subject WHERE thread_id = :tid');
        $stmt->execute(['subject' => $subject, 'tid' => $tid]);

        // Redirect back to readApi.php with the updated thread ID
        header('Location: readApi.php?tid=' . $tid);
        exit;
/*
    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
        exit;
    }
    */
} else {
    // If the form is not submitted, redirect back to the main page or display an error message
    header('Location: forumapi.php'); // Replace index.php with the appropriate filename or URL
    exit;
}