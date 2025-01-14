<?php
// submit_resolution.php
include 'config.php';

$data = json_decode(file_get_contents("php://input"));

$resolved = $data->resolved;
$user_id = $data->user_id;

if (isset($resolved) && !empty($user_id)) {
    $stmt = $conn->prepare("UPDATE feedback SET resolved = ? WHERE user_id = ? ORDER BY id DESC LIMIT 1");
    $stmt->bind_param("ii", $resolved, $user_id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false]);
}

$conn->close();
?>
