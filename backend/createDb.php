<?php
// Create the SQLite 3 database in this folder and name it "database.db"
$db = new SQLite3('database.db');

// Create the table "users" if it doesn't exist
$db->exec('CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY, name TEXT, email TEXT, password TEXT)');

// Create the table "teams" if it doesn't exist, which consists of an ID, team name, team description, team captain's name and email, and team members' names and blob of the team image
$db->exec('CREATE TABLE IF NOT EXISTS teams (id INTEGER PRIMARY KEY, teamName TEXT, teamDescription TEXT, teamCaptainName TEXT, teamCaptainEmail TEXT, teamMemberNames TEXT, teamImage BLOB)');

// Create the table "settings" if it doesn't exist, which consists of an ID, the name of the setting, and the value of the setting
$db->exec('CREATE TABLE IF NOT EXISTS settings (id INTEGER PRIMARY KEY, settingName TEXT, settingValue TEXT)');
?>