<?php



// Create two objects
$object1 = array(
    "id" => 1,
    "name" => "Object 1"
);

$object2 = array(
    "id" => 2,
    "name" => "Object 2"
);

// Put the objects into an array
$objectsArray = array($object1, $object2);

// Convert the array to JSON format
$jsonData = json_encode($objectsArray);

// Set the response headers
header("Content-Type: application/json");

// Display the JSON data
echo $jsonData;



