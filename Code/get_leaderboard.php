<?php
$host = 'localhost';
$username = 'id21253754_ratemydog';
$password = 'DBDog12!';
$database = 'id21253754_dogdata';

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT * FROM leaderboard ORDER BY score DESC"; 
$result = $mysqli->query($query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$mysqli->close();

header('Content-Type: application/json');
echo json_encode($data);
?>
