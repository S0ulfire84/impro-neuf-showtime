<?php
// Connect to the database
$db = new SQLite3('database.db');

// Get the teams from the database
$teams = $db->query('SELECT * FROM teams');

// Output the teams in JSON format
echo json_encode($teams->fetchArray());
?>