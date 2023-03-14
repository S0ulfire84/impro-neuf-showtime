<?php
// Connect to the database
$db = new SQLite3('../database.db');

$json = file_get_contents('php://input');
$data = json_decode($json);

$name = $data->name;
$email = $data->email;
$password = password_hash($data->password, PASSWORD_DEFAULT);
$role = $data->role;

// Insert the user into the database
$db->exec("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
?>