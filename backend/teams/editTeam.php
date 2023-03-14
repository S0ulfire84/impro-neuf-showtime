<?php
// Connect to the database
$db = new SQLite3('../database.db');

$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;
$teamName = $data->teamName;
$teamDescription = $data->teamDescription;
$teamCaptainName = $data->teamCaptainName;
$teamCaptainEmail = $data->teamCaptainEmail;
$teamMemberNames = $data->teamMemberNames;
$teamImage = $data->teamImage;

// Echo received data
echo $teamName;
echo $teamDescription;
echo $teamCaptainName;
echo $teamCaptainEmail;
echo $teamMemberNames;
echo $teamImage;

// Edit the team in the database
$db->exec("UPDATE teams SET teamName = '$teamName', teamDescription = '$teamDescription', teamCaptainName = '$teamCaptainName', teamCaptainEmail = '$teamCaptainEmail', teamMemberNames = '$teamMemberNames', teamImage = '$teamImage' WHERE id = '$id'");
?>