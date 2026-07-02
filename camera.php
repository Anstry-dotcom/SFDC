<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

$username = $_SESSION['username'] ?? "Administrator";
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Camera Monitoring | SFDC</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet"
href="assets/css/dashboard.css">

</head>

<body>

<div class="wrapper">

<!-- Sidebar -->

<div class="sidebar">

<div class="logo-area">

<img src="assets/images/logo.png" width="70">

<h3>SFDC</h3>

<p>Smart Farming</p>

</div>

<hr>

<ul class="menu">

<li><a href="dashboard.php"><i class="fas fa-gauge-high"></i> Dashboard</a></li>

<li><a href="booking.php"><i class="fas fa-calendar-check"></i> Booking</a></li>

<li><a href="harvest.php"><i class="fas fa-seedling"></i> Harvest</a></li>

<li><a href="customer.php"><i class="fas fa-users"></i> Customer</a></li>

<li><a href="feedback.php"><i class="fas fa-comments"></i> Feedback</a></li>

<li><a href="analytics.php"><i class="fas fa-chart-line"></i> Analytics</a></li>

<li><a href="weather.php"><i class="fas fa-cloud-sun"></i> Weather</a></li>

<li><a href="iot.php"><i class="fas fa-microchip"></i> IoT</a></li>

<li><a href="report.php"><i class="fas fa-file-lines"></i> Report</a></li>

<li class="active">
<a href="camera.php">
<i class="fas fa-video"></i> Camera
</a>
</li>

<li><a href="logout.php"><i class="fas fa-right-from-bracket"></i> Logout</a></li>

</ul>

</div>

<!-- Main -->

<div class="main">

<nav class="topbar">

<h3>Camera Monitoring</h3>

<div>

Welcome,

<strong><?php echo htmlspecialchars($username); ?></strong>

</div>

</nav>

<div class="container-fluid mt-4">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h4>

<i class="fas fa-video"></i>

Live Camera Monitoring

</h4>

</div>

<div class="card-body text-center">

<!-- Tukar URL di bawah kepada IP Camera atau ESP32-CAM -->

<img
src="http://192.168.1.100:81/stream"
class="img-fluid border rounded shadow"
style="max-height:600px;"
alt="Camera Stream">

<p class="mt-3 text-muted">

Camera Status :
<span class="badge bg-success">
ONLINE
</span>

</p>

</div>

</div>

<br>

<div class="row">

<div class="col-md-4">

<div class="card text-bg-primary">

<div class="card-body text-center">

<i class="fas fa-camera fa-3x"></i>

<h5 class="mt-3">

Camera 1

</h5>

<p>

Greenhouse View

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card text-bg-success">

<div class="card-body text-center">

<i class="fas fa-seedling fa-3x"></i>

<h5 class="mt-3">

Farm Area

</h5>

<p>

Crop Monitoring

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card text-bg-warning">

<div class="card-body text-center">

<i class="fas fa-clock fa-3x"></i>

<h5 class="mt-3">

Last Update

</h5>

<p>

<?php echo date("d M Y H:i:s"); ?>

</p>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>