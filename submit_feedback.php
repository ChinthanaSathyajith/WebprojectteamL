<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedback = trim($_POST['feedback_text']);

    if (!empty($feedback)) {
        $conn = new mysqli("127.0.0.1", "root", "", "db");
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

        $stmt = $conn->prepare("INSERT INTO feedback (user_id, feedback_text) VALUES (?, ?)");
        $stmt->bind_param("is", $_SESSION['user_id'], $feedback);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}

header("Location: feedback.php");
exit();
