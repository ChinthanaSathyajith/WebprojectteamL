<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedback = trim($_POST['feedback_text']);

    if (!empty($feedback)) {
        require_once 'db_connect.php';

        $stmt = $conn->prepare("INSERT INTO feedback (user_id, feedback_text) VALUES (?, ?)");
        $stmt->bind_param("is", $_SESSION['user_id'], $feedback);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}

header("Location: feedback.php");
exit();
