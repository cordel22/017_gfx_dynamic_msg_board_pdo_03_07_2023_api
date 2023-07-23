<?php
# Script 17.1 - header.html before, this is for json restful api
/*  This script...
 *  - starts the HTML template.
 *  - indicates the encoding using header().
 *  - starts the session.
 *  - gets the language-specific words from the database.
 *  - lists the available languages.
 */
 // Indicate the encoding JSON!!!:
 header ('Content-Type: application/json; charset=UTF-8');
 // Start the session:
 require_once('./misc/sess.php');
 // Need the database connection:
 // beware of the proper location of the mysqli_connect!!!
 // require ('mysqli_connect.php');
 require ('pdo.php');

 // Check for a new language ID...
 // Then store the language ID in the session:
 require_once('./misc/lang.php');


  //  Get the words for this language:
  require_once('./misc/words.php');
  //    here comes $words from



