<?php
// Database connection settings
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

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO feedback (user_id, feedback, resolved) VALUES (?, ?, ?)");
$stmt->bind_param("isi", $user_id, $feedback, $resolved);

// Set parameters and execute
$user_id = $_POST['user_id'];
$feedback = $_POST['feedback'];
$resolved = isset($_POST['resolved']) ? 1 : 0;

if ($stmt->execute()) {
    $response = array('status' => 'success', 'message' => 'Feedback submitted successfully.');
} else {
    $response = array('status' => 'error', 'message' => 'Failed to submit feedback.');
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>
