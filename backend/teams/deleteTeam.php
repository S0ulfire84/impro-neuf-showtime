<?php
// Connect to the database
$db = new SQLite3('../database.db');

// Get the team name, description, captain name, captain email, member names, member emails, and image from the POST request as a JSON object

$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;


// Delete the team from the database
$db->exec("DELETE FROM teams WHERE id = '$id'");

?>