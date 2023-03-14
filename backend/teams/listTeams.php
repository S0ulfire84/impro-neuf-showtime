<?php
// Connect to the database
$db = new SQLite3('../database.db');

// Get the teams from the database
$teams = $db->query('SELECT id, teamName, teamDescription, teamCaptainName, teamCaptainEmail, teamMemberNames, teamImage FROM teams');

echo '[';

$first = true;
while ($team = $teams->fetchArray()) {
    if ($first) {
        $first = false;
    } else {
        echo ',';
    }
    // Output the team in JSON format
    // echo json_encode($team);
    echo "{";
    echo '"id": ' . $team['id'] . ',';
    echo '"teamName": "' . $team['teamName'] . '",';
    echo '"teamDescription": "' . $team['teamDescription'] . '",';
    echo '"teamCaptainName": "' . $team['teamCaptainName'] . '",';
    echo '"teamCaptainEmail": "' . $team['teamCaptainEmail'] . '",';
    echo '"teamMemberNames": "' . $team['teamMemberNames'] . '",';
    echo '"teamImage": "' . $team['teamImage'] . '"';
    echo "}";
}
echo ']';
// Output the teams in JSON format as an array of objects


// Output the teams in JSON format
// echo json_encode();
?>