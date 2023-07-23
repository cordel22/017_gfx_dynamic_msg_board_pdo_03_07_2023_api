<?php
// Connect to the database and handle any necessary setup

//  TODO, instead of the header html just the php part of it above
include('restfulphp/headerapi.php');


// Connect to your database here

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tid'])) {
    $tid = $_POST['tid'];

    // Perform the delete operation on the posts table
    $sqlDeletePosts = "DELETE FROM posts WHERE thread_id = :thread_id";
    $stmtDeletePosts = $pdo->prepare($sqlDeletePosts);
    $stmtDeletePosts->execute(array(':thread_id' => $tid));

    // Perform the delete operation on the threads table
    $sqlDeleteThread = "DELETE FROM threads WHERE thread_id = :thread_id";
    $stmtDeleteThread = $pdo->prepare($sqlDeleteThread);
    $stmtDeleteThread->execute(array(':thread_id' => $tid));

    // Check if the delete operations were successful
    $deleteSuccess = $stmtDeletePosts->rowCount() > 0 && $stmtDeleteThread->rowCount() > 0;

    if ($deleteSuccess) {
        // Redirect to forumapi.php if delete was successful
        header("Location: forumapi.php");
        exit();
    } else {
        // Redirect back to readapi.php with the same thread id if delete failed
        header("Location: readapi.php?tid=" . $tid);
        exit();
    }
} else {
    // Invalid request, redirect to an error page or handle it accordingly
    header("Location: error.php");
    exit();
}
?>
