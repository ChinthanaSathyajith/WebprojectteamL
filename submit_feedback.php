<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['feedback_text'])) {
    $user_id = $_SESSION['user_id'];
    $feedback_text = trim($_POST['feedback_text']);

    $stmt = $conn->prepare("INSERT INTO feedback (user_id, feedback_text) VALUES (?, ?)");
    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }
    $stmt->bind_param("is", $user_id, $feedback_text);

    if ($stmt->execute()) {
        header("Location: feedback.php?success=1");
        exit();
    } else {
        die('Execute failed: ' . $stmt->error);
    }
} else {
    die('Invalid request or empty feedback.');
}
?>

<?php ob_start(); ?>

<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success text-center">Thank you for your feedback!</div>
<?php elseif (isset($_GET['error'])): ?>
    <div class="alert alert-danger text-center">There was an error submitting your feedback. Please try again.</div>
<?php endif; ?>
