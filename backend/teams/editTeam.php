<?php
// Connect to the database
$db = new SQLite3('../database.db');

// Get the team name, description, captain name, captain email, member names, member emails, and image from the POST request as a JSON object

$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;
$teamName = $data->teamName;
$teamDescription = $data->teamDescription;
$teamCaptainName = $data->teamCaptainName;
$teamCaptainEmail = $data->teamCaptainEmail;
$teamMemberNames = $data->teamMemberNames;
$teamImage = $data->teamImage;

// $teamName = $_POST['teamName'];
// $teamDescription = $_POST['teamDescription'];
// $teamCaptainName = $_POST['teamCaptainName'];
// $teamCaptainEmail = $_POST['teamCaptainEmail'];
// $teamMemberNames = $_POST['teamMemberNames'];

// Get the image from the POST request
// $teamImage = $_FILES['teamImage'];

// Echo received data
echo $teamName;
echo $teamDescription;
echo $teamCaptainName;
echo $teamCaptainEmail;
echo $teamMemberNames;
echo $teamImage;

// Edit the team in the database
$db->exec("UPDATE teams SET teamName = '$teamName', teamDescription = '$teamDescription', teamCaptainName = '$teamCaptainName', teamCaptainEmail = '$teamCaptainEmail', teamMemberNames = '$teamMemberNames', teamImage = '$teamImage' WHERE id = '$id'");


//$db->exec("INSERT INTO teams (teamName, teamDescription, teamCaptainName, teamCaptainEmail, teamMemberNames, teamImage) VALUES ('$teamName', '$teamDescription', '$teamCaptainName', '$teamCaptainEmail', '$teamMemberNames', '$teamImage')");
?>