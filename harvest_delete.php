<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

if (!isset($_GET['id'])) {
    header("Location: harvest.php");
    exit();
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("DELETE FROM harvest WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {

    $_SESSION['message'] = "Harvest deleted successfully.";
    $_SESSION['message_type'] = "success";

} else {

    $_SESSION['message'] = "Failed to delete harvest.";
    $_SESSION['message_type'] = "danger";

}

header("Location: harvest.php");
exit();
?>