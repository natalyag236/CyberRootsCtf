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

// Start session and get logged-in username
session_start();
if (!isset($_SESSION['username'])) {
    echo json_encode(['success' => false, 'message' => 'You must be logged in to submit a flag.']);
    exit;
}
$loggedInUser = $_SESSION['username'];

// Retrieve the submitted flag
$flag_completed = $_POST['flag_completed'];

// Set score for the flag completion (you can adjust this as needed)
$score = 10;

// Insert or update leaderboard with the user's flag and score
$sql = "INSERT INTO leaderboard (username, flag_completed, score)
        VALUES ('$loggedInUser', '$flag_completed', $score)
        ON DUPLICATE KEY UPDATE 
            flag_completed = CONCAT(flag_completed, ',', VALUES(flag_completed)),
            score = score + VALUES(score),
            timestamp = CURRENT_TIMESTAMP";

if ($conn->query($sql) === TRUE) {
    // Fetch updated leaderboard data
    $result = $conn->query("SELECT username, 
                                   COUNT(DISTINCT flag_completed) AS flagsCompleted, 
                                   SUM(score) AS score 
                            FROM leaderboard 
                            GROUP BY username 
                            ORDER BY score DESC");
    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    echo json_encode(['success' => true, 'message' => "Flag '$flag_completed' submitted successfully by $loggedInUser!", 'users' => $users]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $sql . '<br>' . $conn->error]);
}

$conn->close();
?>