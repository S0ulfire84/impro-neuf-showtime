<?php
// Create the SQLite 3 database in this folder and name it "database.db"
$db = new SQLite3('database.db');

// Create the table "users" if it doesn't exist
$db->exec('CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY, name TEXT, email TEXT, password TEXT, role TEXT)');

// Create the table "teams" if it doesn't exist, which consists of an ID, team name, team description, team captain's name and email, and team members' names and blob of the team image
$db->exec('CREATE TABLE IF NOT EXISTS teams (id INTEGER PRIMARY KEY, teamName TEXT, teamDescription TEXT, teamCaptainName TEXT, teamCaptainEmail TEXT, teamMemberNames TEXT, teamImage BLOB)');

// Add example data to the "teams" table
// $db->exec('INSERT INTO teams (teamName, teamDescription, teamCaptainName, teamCaptainEmail, teamMemberNames, teamImage) VALUES ("Team 1", "This is a description of Team 1", "Captain 1", "pepe@lala.com", "Member 1, Member 2, Member 3", "image.png")');
// $db->exec('INSERT INTO teams (teamName, teamDescription, teamCaptainName, teamCaptainEmail, teamMemberNames, teamImage) VALUES ("Team 2", "This is a description of Team 2", "Captain 2", "pepe@lala.com", "Member 1, Member 2, Member 3", "image.png")');
// $db->exec('INSERT INTO teams (teamName, teamDescription, teamCaptainName, teamCaptainEmail, teamMemberNames, teamImage) VALUES ("Team 3", "This is a description of Team 3", "Captain 3", "pepe@lala.com", "Member 1, Member 2, Member 3", "image.png")');
// $db->exec('INSERT INTO teams (teamName, teamDescription, teamCaptainName, teamCaptainEmail, teamMemberNames, teamImage) VALUES ("Team 4", "This is a description of Team 4", "Captain 4", "pepe@lala.com", "Member 1, Member 2, Member 3", "image.png")');

// Create the table "settings" if it doesn't exist, which consists of an ID, the name of the setting, and the value of the setting
$db->exec('CREATE TABLE IF NOT EXISTS settings (id INTEGER PRIMARY KEY, settingName TEXT, settingValue TEXT)');

// Echo the success message
echo "Database created successfully!";
?>