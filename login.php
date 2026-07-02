<?php
session_start();

require_once "config/database.php";

// Jika sudah login
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = clean($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND status='ACTIVE'");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Simpan log aktiviti
            $activity = "User {$user['username']} logged in";

            $log = $conn->prepare("INSERT INTO activity_log(activity) VALUES(?)");
            $log->bind_param("s", $activity);
            $log->execute();

            header("Location: dashboard.php");
            exit;

        } else {

            $error = "Invalid username or password.";

        }

    } else {

        $error = "User not found.";

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login | Smart Farming Development Centre</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>

body{

background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);

height:100vh;

display:flex;

justify-content:center;

align-items:center;

font-family:Poppins,sans-serif;

}

.login-card{

width:420px;

border:none;

border-radius:20px;

background:#ffffff;

padding:40px;

box-shadow:0 20px 40px rgba(0,0,0,.25);

}

.logo{

width:90px;

margin-bottom:20px;

}

.btn-login{

background:#198754;

color:white;

width:100%;

padding:12px;

font-weight:bold;

}

.btn-login:hover{

background:#146c43;

color:white;

}

</style>

</head>

<body>

<div class="login-card">

<div class="text-center">

<img src="assets/images/logo.png"
class="logo"
alt="Logo">

<h3>SFDC Login</h3>

<p class="text-muted">

Smart Farming Development Centre

</p>

</div>

<?php if($error!=""): ?>

<div class="alert alert-danger">

<?= $error; ?>

</div>

<?php endif; ?>

<form method="POST">

<div class="mb-3">

<label class="form-label">

Username

</label>

<input
type="text"
name="username"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">

Password

</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<button
type="submit"
class="btn btn-login">

<i class="fas fa-right-to-bracket"></i>

Login

</button>

</form>

<hr>

<div class="text-center">

<a href="index.php">

<i class="fas fa-arrow-left"></i>

Back to Homepage

</a>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>