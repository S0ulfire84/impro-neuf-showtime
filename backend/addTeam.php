<?php
// Connect to the database
$db = new SQLite3('database.db');

// Get the team name, description, captain name, captain email, member names, member emails, and image from the POST request
$teamName = $_POST['teamName'];
$teamDescription = $_POST['teamDescription'];
$teamCaptainName = $_POST['teamCaptainName'];
$teamCaptainEmail = $_POST['teamCaptainEmail'];
$teamMemberNames = $_POST['teamMemberNames'];

// Get the image from the POST request
$teamImage = $_FILES['teamImage'];

// Insert the team into the database
$db->exec("INSERT INTO teams (teamName, teamDescription, teamCaptainName, teamCaptainEmail, teamMemberNames, teamImage) VALUES ('$teamName', '$teamDescription', '$teamCaptainName', '$teamCaptainEmail', '$teamMemberNames', '$teamImage')");
?>