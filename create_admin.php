<?php
// =====================================================
// SMART FARMING DEVELOPMENT CENTRE (SFDC)
// CREATE DEFAULT ADMIN
// Jalankan SEKALI sahaja kemudian padam fail ini
// =====================================================

require_once "config/database.php";

// Maklumat Admin
$fullname = "Administrator";
$username = "admin";
$password = "admin123";
$email = "admin@sfdc.com";
$phone = "0123456789";
$role = "admin";

// Semak sama ada admin sudah wujud
$check = $conn->prepare("SELECT id FROM users WHERE username = ?");
$check->bind_param("s", $username);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {

    echo "<h2 style='color:orange;'>⚠ Akaun admin sudah wujud.</h2>";
    echo "<p>Username : <b>admin</b></p>";
    echo "<p>Tiada data baru dimasukkan.</p>";

    exit;
}

// Hash password
$hash = password_hash($password, PASSWORD_DEFAULT);

// Simpan ke database
$stmt = $conn->prepare("
INSERT INTO users
(
    fullname,
    username,
    password,
    email,
    phone,
    role,
    status
)
VALUES
(
    ?,?,?,?,?,?,
    'ACTIVE'
)
");

$stmt->bind_param(
    "ssssss",
    $fullname,
    $username,
    $hash,
    $email,
    $phone,
    $role
);

if ($stmt->execute()) {

    echo "<!DOCTYPE html>";

    echo "<html>";

    echo "<head>";

    echo "<title>Admin Created</title>";

    echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css' rel='stylesheet'>";

    echo "</head>";

    echo "<body class='bg-light'>";

    echo "<div class='container mt-5'>";

    echo "<div class='card shadow'>";

    echo "<div class='card-body'>";

    echo "<h2 class='text-success'>✅ Admin berjaya dicipta.</h2>";

    echo "<hr>";

    echo "<p><strong>Username :</strong> admin</p>";

    echo "<p><strong>Password :</strong> admin123</p>";

    echo "<p class='text-danger mt-4'>";

    echo "⚠ Demi keselamatan, padam fail <b>create_admin.php</b> selepas ini.";

    echo "</p>";

    echo "<a href='login.php' class='btn btn-success'>Pergi ke Login</a>";

    echo "</div>";

    echo "</div>";

    echo "</div>";

    echo "</body>";

    echo "</html>";

} else {

    echo "Ralat : " . $conn->error;

}

$stmt->close();
$conn->close();

?>