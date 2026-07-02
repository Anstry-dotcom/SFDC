<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

if (!isset($_GET['id'])) {
    header("Location: customer.php");
    exit();
}

$id = (int) $_GET['id'];

// Elakkan admin memadam akaun sendiri
if ($id == $_SESSION['user_id']) {

    $_SESSION['message'] = "Anda tidak boleh memadam akaun sendiri.";
    $_SESSION['message_type'] = "danger";

    header("Location: customer.php");
    exit();
}

// Semak sama ada user wujud
$check = $conn->prepare("SELECT id FROM users WHERE id=?");
$check->bind_param("i", $id);
$check->execute();
$result = $check->get_result();

if ($result->num_rows == 0) {

    $_SESSION['message'] = "Customer tidak dijumpai.";
    $_SESSION['message_type'] = "danger";

    header("Location: customer.php");
    exit();
}

// Delete customer
$stmt = $conn->prepare("DELETE FROM users WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {

    $_SESSION['message'] = "Customer berjaya dipadam.";
    $_SESSION['message_type'] = "success";

} else {

    $_SESSION['message'] = "Gagal memadam customer.";
    $_SESSION['message_type'] = "danger";

}

header("Location: customer.php");
exit();
?>