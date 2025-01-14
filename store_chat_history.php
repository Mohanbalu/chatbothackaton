<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    $user_id = $conn->real_escape_string($data['user_id']);
    $user_input = $conn->real_escape_string($data['user_input']);
    $bot_response = $conn->real_escape_string($data['bot_response']);
    $timestamp = date('Y-m-d H:i:s');

    $stmt = $conn->prepare("INSERT INTO chat_history (user_id, user_input, bot_response, timestamp) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $user_input, $bot_response, $timestamp);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }

    $stmt->close();
}

$conn->close();
?>
