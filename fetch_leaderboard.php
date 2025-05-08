<?php
header('Content-Type: application/json');

// Database connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Cyber Roots CTF";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit;
}

// Fetch leaderboard data
$result = $conn->query("SELECT username, COUNT(flag_completed) AS flagsCompleted, SUM(score) AS score FROM leaderboard GROUP BY username ORDER BY score DESC");
$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

echo json_encode(['success' => true, 'users' => $users]);

$conn->close();
?>