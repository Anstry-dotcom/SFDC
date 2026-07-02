<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

$username = $_SESSION['username'] ?? "Administrator";

// Statistik
$totalHarvest = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT IFNULL(SUM(weight),0) total FROM harvest"))['total'];

$totalRevenue = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT IFNULL(SUM(amount),0) total FROM harvest"))['total'];

$totalBooking = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) total FROM bookings"))['total'];

$totalFeedback = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) total FROM feedback"))['total'];

// Data
$harvest = mysqli_query($conn,"SELECT * FROM harvest ORDER BY id DESC");
$booking = mysqli_query($conn,"SELECT * FROM bookings ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Report | SFDC</title>

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

<li class="active">
<a href="report.php">
<i class="fas fa-file-lines"></i>
Report
</a>
</li>

<li><a href="logout.php"><i class="fas fa-right-from-bracket"></i> Logout</a></li>

</ul>

</div>

<!-- Main -->

<div class="main">

<nav class="topbar">

<h3>System Report</h3>

<div>

Welcome,

<strong><?php echo htmlspecialchars($username); ?></strong>

</div>

</nav>

<div class="container-fluid mt-4">

<div class="row">

<div class="col-md-3">

<div class="card text-bg-success">

<div class="card-body text-center">

<h6>Total Harvest</h6>

<h2><?php echo number_format($totalHarvest,2); ?> KG</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-bg-primary">

<div class="card-body text-center">

<h6>Total Revenue</h6>

<h2>RM <?php echo number_format($totalRevenue,2); ?></h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-bg-warning">

<div class="card-body text-center">

<h6>Total Booking</h6>

<h2><?php echo $totalBooking; ?></h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-bg-danger">

<div class="card-body text-center">

<h6>Total Feedback</h6>

<h2><?php echo $totalFeedback; ?></h2>

</div>

</div>

</div>

</div>

<br>

<div class="card shadow mb-4">

<div class="card-header bg-success text-white">

Harvest Report

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-success">

<tr>

<th>ID</th>

<th>Customer</th>

<th>Weight</th>

<th>Amount</th>

<th>Status</th>

<th>Date</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($harvest)){ ?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= htmlspecialchars($row['customer_name']); ?></td>

<td><?= $row['weight']; ?> KG</td>

<td>RM <?= number_format($row['amount'],2); ?></td>

<td><?= $row['status']; ?></td>

<td><?= $row['harvest_date']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<div class="card shadow">

<div class="card-header bg-primary text-white">

Booking Report

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-primary">

<tr>

<th>ID</th>

<th>Customer</th>

<th>Crop</th>

<th>Quantity</th>

<th>Status</th>

<th>Date</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($booking)){ ?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= htmlspecialchars($row['customer_name']); ?></td>

<td><?= htmlspecialchars($row['crop']); ?></td>

<td><?= $row['quantity']; ?> KG</td>

<td><?= $row['status']; ?></td>

<td><?= $row['booking_date']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<div class="mt-3">

<button onclick="window.print()" class="btn btn-success">

<i class="fas fa-print"></i>

Print Report

</button>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>