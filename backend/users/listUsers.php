<?php
// Connect to the database
$db = new SQLite3('../database.db');

// Get the users from the database
$users = $db->query('SELECT id, name, email, password, role FROM users');

echo '[';

$first = true;
while ($user = $users->fetchArray()) {
    if ($first) {
        $first = false;
    } else {
        echo ',';
    }
    // Output the user in JSON format
    // echo json_encode($user);
    echo "{";
    echo '"id": ' . $user['id'] . ',';
    echo '"name": "' . $user['name'] . '",';
    echo '"email": "' . $user['email'] . '",';
    echo '"role": "' . $user['role'] . '"';
    echo "}";
}
echo ']';
// Output the teams in JSON format as an array of objects


// Output the teams in JSON format
// echo json_encode();
?>