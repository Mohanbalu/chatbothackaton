<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    if ($new_password !== $confirm_new_password) {
        echo "New passwords do not match.";
        exit();
    }

    // Check if email exists in the database
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        die("Execute failed: " . $stmt->error);
    }

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($current_password, $user['password'])) {
            // Update password
            $hashed_new_password = password_hash($new_password, PASSWORD_BCRYPT);

            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
            if (!$stmt) {
                die("Prepare failed: " . $conn->error);
            }

            $stmt->bind_param("ss", $hashed_new_password, $email);
            if ($stmt->execute()) {
                echo "Password updated successfully.";
            } else {
                echo "Error updating password: " . $stmt->error;
            }
        } else {
            echo "Current password is incorrect.";
        }
    } else {
        echo "No account found with that email address.";
    }

    $stmt->close();
    $conn->close();
}
?>
