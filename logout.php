<?php
// =====================================================
// SMART FARMING DEVELOPMENT CENTRE (SFDC)
// LOGOUT
// =====================================================

session_start();

require_once "config/database.php";

// Simpan log aktiviti jika pengguna masih login
if (isset($_SESSION['username'])) {

    $activity = $_SESSION['username'] . " logged out";

    $stmt = $conn->prepare("INSERT INTO activity_log(activity) VALUES(?)");
    $stmt->bind_param("s", $activity);
    $stmt->execute();
    $stmt->close();
}

// Kosongkan semua session
$_SESSION = [];

// Musnahkan session
session_destroy();

// Padam cookie session jika ada
if (ini_get("session.use_cookies")) {

    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Redirect ke login
header("Location: login.php?logout=success");
exit;
?>