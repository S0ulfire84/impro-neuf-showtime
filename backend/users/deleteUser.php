<?php
// Connect to the database
$db = new SQLite3('../database.db');

$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;


// Delete the user from the database
$db->exec("DELETE FROM users WHERE id = '$id'");

?>