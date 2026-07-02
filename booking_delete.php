<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

if (!isset($_GET['id'])) {
    header("Location: booking.php");
    exit();
}

$id = (int) $_GET['id'];

// Semak sama ada rekod wujud
$check = mysqli_query($conn, "SELECT id FROM bookings WHERE id = $id");

if (mysqli_num_rows($check) == 0) {
    $_SESSION['message'] = "Booking tidak dijumpai.";
    $_SESSION['message_type'] = "danger";
    header("Location: booking.php");
    exit();
}

// Padam rekod
$sql = "DELETE FROM bookings WHERE id = $id";

if (mysqli_query($conn, $sql)) {

    $_SESSION['message'] = "Booking berjaya dipadam.";
    $_SESSION['message_type'] = "success";

} else {

    $_SESSION['message'] = "Ralat semasa memadam booking.";
    $_SESSION['message_type'] = "danger";

}

header("Location: booking.php");
exit();
?>