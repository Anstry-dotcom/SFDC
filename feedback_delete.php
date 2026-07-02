<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

// Semak ID
if (!isset($_GET['id'])) {

    $_SESSION['message'] = "Invalid feedback ID.";
    $_SESSION['message_type'] = "danger";

    header("Location: feedback.php");
    exit();
}

$id = (int) $_GET['id'];

// Semak feedback wujud
$check = $conn->prepare("SELECT id FROM feedback WHERE id=?");
$check->bind_param("i", $id);
$check->execute();
$result = $check->get_result();

if ($result->num_rows == 0) {

    $_SESSION['message'] = "Feedback not found.";
    $_SESSION['message_type'] = "danger";

    header("Location: feedback.php");
    exit();
}

// Padam feedback
$stmt = $conn->prepare("DELETE FROM feedback WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {

    $_SESSION['message'] = "Feedback deleted successfully.";
    $_SESSION['message_type'] = "success";

} else {

    $_SESSION['message'] = "Failed to delete feedback.";
    $_SESSION['message_type'] = "danger";

}

header("Location: feedback.php");
exit();
?>