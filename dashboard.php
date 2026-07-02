<?php
session_start();
require_once "config/database.php";
if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");

    exit;
}


/*
=========================================
SMART FARMING DEVELOPMENT CENTRE
Ultimate Dashboard v3.0
dashboard.php - PART 1
=========================================
*/

if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "Administrator";
}

$username = $_SESSION['username'];

date_default_timezone_set("Asia/Kuala_Lumpur");
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SFDC Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<link href="assets/css/dashboard.css" rel="stylesheet">

</head>

<body>

<!-- PRELOADER -->

<div id="preloader">

<div class="loader">

<div class="spinner-border text-success"></div>

<p class="mt-3">Loading Dashboard...</p>

</div>

</div>

<!-- WRAPPER -->

<div class="wrapper">

<!-- ========================= -->
<!-- SIDEBAR -->
<!-- ========================= -->

<div class="sidebar">

<div class="logo-area">

<img src="assets/images/logo.png">

<h3>SFDC</h3>

<p>Smart Farming</p>

</div>

<hr>

<ul class="menu">

<li class="active">

<a href="dashboard.php">

<i class="fa-solid fa-gauge-high"></i>

<span>Dashboard</span>

</a>

</li>

<li>

<a href="booking.php">

<i class="fa-solid fa-calendar-check"></i>

<span>Booking</span>

</a>

</li>

<li>

<a href="harvest.php">

<i class="fa-solid fa-seedling"></i>

<span>Harvest</span>

</a>

</li>

<li>

<a href="customer.php">

<i class="fa-solid fa-users"></i>

<span>Customer</span>

</a>

</li>

<li>

<a href="feedback.php">

<i class="fa-solid fa-comments"></i>

<span>Feedback</span>

</a>

</li>

<li>

<a href="analytics.php">

<i class="fa-solid fa-chart-line"></i>

<span>Analytics</span>

</a>

</li>

<li>

<a href="weather.php">

<i class="fa-solid fa-cloud-sun"></i>

<span>Weather</span>

</a>

</li>

<li>

<a href="iot.php">

<i class="fa-solid fa-microchip"></i>

<span>IoT Sensor</span>

</a>

</li>

<li>

<a href="camera.php">

<i class="fa-solid fa-video"></i>

<span>Live Camera</span>

</a>

</li>

<li>

<a href="report.php">

<i class="fa-solid fa-file-lines"></i>

<span>Reports</span>

</a>

</li>

<li>

<a href="setting.php">

<i class="fa-solid fa-gear"></i>

<span>Settings</span>

</a>

</li>

<li>

<a href="logout.php">

<i class="fa-solid fa-right-from-bracket"></i>

<span>Logout</span>

</a>

</li>

</ul>

</div>

<!-- END SIDEBAR -->

<!-- ========================= -->
<!-- MAIN CONTENT -->
<!-- ========================= -->

<div class="main">

<!-- TOP NAVBAR -->

<nav class="topbar">

<div class="left">

<button id="menuBtn">

<i class="fas fa-bars"></i>

</button>

<h2>

Dashboard

</h2>

</div>

<div class="center">

<div class="search-box">

<i class="fas fa-search"></i>

<input
type="text"
placeholder="Search anything...">

</div>

</div>

<div class="right">

<button class="icon-btn">

<i class="fas fa-bell"></i>

<span class="badge bg-danger">

3

</span>

</button>

<button class="icon-btn">

<i class="fas fa-envelope"></i>

<span class="badge bg-success">

2

</span>

</button>

<button class="icon-btn">

<i class="fas fa-moon"></i>

</button>

<div class="profile">

<img
src="assets/images/user.png">

<div>

<h6>

<?php echo $username; ?>

</h6>

<small>

Administrator

</small>

</div>

</div>

</div>

</nav>

<!-- END TOPBAR -->

<!-- PAGE HEADER -->

<section class="page-header">

<div>

<h1>

Welcome Back,

<?php echo $username; ?>

👋

</h1>

<p>

Smart Farming Development Centre Monitoring System

</p>

</div>

<div class="header-right">

<div class="date-card">

<i class="fa-solid fa-calendar-days"></i>

<span>

<?php

echo date("d M Y");

?>

</span>

</div>

<div class="time-card">

<i class="fa-solid fa-clock"></i>

<span id="clock">

00:00:00

</span>

</div>

</div>

</section>

<!-- DASHBOARD CONTENT -->

<div class="container-fluid">

<div class="row">

<!-- PART 2 akan bermula dari sini -->

<!-- KPI CARD 1 -->

<div class="col-xl-3 col-md-6 mb-4">

<div class="dashboard-card">

<div class="card-icon bg-success">

<i class="fas fa-seedling"></i>

</div>

<div class="card-info">

<h6>Total Harvest</h6>

<h2 id="harvestCounter">

116 KG

</h2>

<p>

+12% This Month

</p>

</div>

</div>

</div>

<!-- KPI CARD 2 -->

<div class="col-xl-3 col-md-6 mb-4">

<div class="dashboard-card">

<div class="card-icon bg-primary">

<i class="fas fa-money-bill-wave"></i>

</div>

<div class="card-info">

<h6>Total Revenue</h6>

<h2>

RM911

</h2>

<p>

+RM120 Today

</p>

</div>

</div>

</div>

<!-- KPI CARD 3 -->

<div class="col-xl-3 col-md-6 mb-4">

<div class="dashboard-card">

<div class="card-icon bg-warning">

<i class="fas fa-users"></i>

</div>

<div class="card-info">

<h6>Customers</h6>

<h2>

245

</h2>

<p>

18 New Users

</p>

</div>

</div>

</div>

<!-- KPI CARD 4 -->

<div class="col-xl-3 col-md-6 mb-4">

<div class="dashboard-card">

<div class="card-icon bg-danger">

<i class="fas fa-calendar-check"></i>

</div>

<div class="card-info">

<h6>Bookings</h6>

<h2>

38

</h2>

<p>

5 Pending

</p>

</div>

</div>

</div>

<!-- ===================================================== -->
<!-- SMART SENSOR KPI -->
<!-- ===================================================== -->

<!-- Temperature -->

<div class="col-xl-3 col-md-6 mb-4">

    <div class="dashboard-card sensor-card">

        <div class="card-icon bg-danger">

            <i class="fas fa-temperature-high"></i>

        </div>

        <div class="card-info">

            <h6>Temperature</h6>

            <h2 id="temperatureValue">29°C</h2>

            <small class="text-success">

                <i class="fas fa-arrow-up"></i>

                Stable

            </small>

        </div>

    </div>

</div>

<!-- Humidity -->

<div class="col-xl-3 col-md-6 mb-4">

    <div class="dashboard-card sensor-card">

        <div class="card-icon bg-info">

            <i class="fas fa-droplet"></i>

        </div>

        <div class="card-info">

            <h6>Humidity</h6>

            <h2 id="humidityValue">78%</h2>

            <small class="text-primary">

                Normal

            </small>

        </div>

    </div>

</div>

<!-- Soil Moisture -->

<div class="col-xl-3 col-md-6 mb-4">

    <div class="dashboard-card sensor-card">

        <div class="card-icon bg-success">

            <i class="fas fa-seedling"></i>

        </div>

        <div class="card-info">

            <h6>Soil Moisture</h6>

            <h2 id="soilValue">61%</h2>

            <small class="text-success">

                Excellent

            </small>

        </div>

    </div>

</div>

<!-- Light -->

<div class="col-xl-3 col-md-6 mb-4">

    <div class="dashboard-card sensor-card">

        <div class="card-icon bg-warning">

            <i class="fas fa-sun"></i>

        </div>

        <div class="card-info">

            <h6>Light Intensity</h6>

            <h2 id="lightValue">835 Lux</h2>

            <small>

                Good

            </small>

        </div>

    </div>

</div>

<!-- ===================================================== -->
<!-- WATER & PUMP -->
<!-- ===================================================== -->

<div class="col-lg-6 mb-4">

<div class="glass-card">

<h5>

<i class="fas fa-water text-primary"></i>

Water Tank

</h5>

<div class="progress mt-4" style="height:18px;">

<div
class="progress-bar bg-primary progress-bar-striped progress-bar-animated"
style="width:85%;">

85%

</div>

</div>

<div class="row mt-4">

<div class="col-6">

<h6>

Current Level

</h6>

<h3>

850 L

</h3>

</div>

<div class="col-6 text-end">

<h6>

Capacity

</h6>

<h3>

1000 L

</h3>

</div>

</div>

</div>

</div>

<div class="col-lg-6 mb-4">

<div class="glass-card">

<h5>

<i class="fas fa-faucet text-success"></i>

Pump Status

</h5>

<div class="mt-4">

<div class="d-flex justify-content-between">

<span>Main Pump</span>

<span class="badge bg-success">

ONLINE

</span>

</div>

<hr>

<div class="d-flex justify-content-between">

<span>Irrigation</span>

<span class="badge bg-success">

RUNNING

</span>

</div>

<hr>

<div class="d-flex justify-content-between">

<span>Backup Pump</span>

<span class="badge bg-secondary">

STANDBY

</span>

</div>

</div>

</div>

</div>

<!-- ===================================================== -->
<!-- DEVICE STATUS -->
<!-- ===================================================== -->

<div class="col-lg-12 mb-4">

<div class="glass-card">

<h5>

<i class="fas fa-microchip"></i>

IoT Device Status

</h5>

<table class="table table-dark table-hover mt-4">

<thead>

<tr>

<th>Device</th>

<th>Status</th>

<th>Signal</th>

<th>Battery</th>

<th>Last Update</th>

</tr>

</thead>

<tbody>

<tr>

<td>ESP32 #01</td>

<td>

<span class="badge bg-success">

ONLINE

</span>

</td>

<td>98%</td>

<td>100%</td>

<td>2 sec ago</td>

</tr>

<tr>

<td>ESP32 #02</td>

<td>

<span class="badge bg-success">

ONLINE

</span>

</td>

<td>95%</td>

<td>93%</td>

<td>5 sec ago</td>

</tr>

<tr>

<td>Soil Sensor</td>

<td>

<span class="badge bg-warning">

WARNING

</span>

</td>

<td>72%</td>

<td>80%</td>

<td>8 sec ago</td>

</tr>

<tr>

<td>Weather Station</td>

<td>

<span class="badge bg-success">

ONLINE

</span>

</td>

<td>99%</td>

<td>AC Power</td>

<td>1 sec ago</td>

</tr>

<tr>

<td>Security Camera</td>

<td>

<span class="badge bg-success">

STREAMING

</span>

</td>

<td>100%</td>

<td>AC Power</td>

<td>Live</td>

</tr>

</tbody>

</table>

</div>

</div>

<!-- ===================================================== -->
<!-- LIVE SYSTEM STATUS -->
<!-- ===================================================== -->

<div class="col-lg-4 mb-4">

<div class="glass-card">

<h5>System Health</h5>

<div class="mt-4">

<p>CPU Usage</p>

<div class="progress">

<div class="progress-bar bg-success"
style="width:35%;">

35%

</div>

</div>

<p class="mt-3">Memory</p>

<div class="progress">

<div class="progress-bar bg-info"
style="width:58%;">

58%

</div>

</div>

<p class="mt-3">Network</p>

<div class="progress">

<div class="progress-bar bg-warning"
style="width:82%;">

82%

</div>

</div>

</div>

</div>

</div>

<div class="col-lg-4 mb-4">

<div class="glass-card text-center">

<h5>Farm Status</h5>

<i class="fas fa-leaf fa-5x text-success mt-4 mb-4"></i>

<h2 class="text-success">

Healthy

</h2>

<p>

All sensors operating normally.

</p>

</div>

</div>

<div class="col-lg-4 mb-4">

<div class="glass-card">

<h5>Quick Summary</h5>

<ul class="list-group mt-3">

<li class="list-group-item">

Today's Harvest

<strong class="float-end">

116 KG

</strong>

</li>

<li class="list-group-item">

Bookings

<strong class="float-end">

38

</strong>

</li>

<li class="list-group-item">

Revenue

<strong class="float-end">

RM911

</strong>

</li>

<li class="list-group-item">

Customers

<strong class="float-end">

245

</strong>

</li>

</ul>

</div>

</div>

<!-- ========================================================= -->
<!-- ANALYTICS CHART -->
<!-- ========================================================= -->

<div class="col-lg-8 mb-4">

<div class="glass-card">

<div class="d-flex justify-content-between align-items-center mb-4">

<h5>

<i class="fas fa-chart-line text-success"></i>

Harvest Analytics

</h5>

<select class="form-select w-auto">

<option>Last 7 Days</option>
<option>Last 30 Days</option>
<option>This Year</option>

</select>

</div>

<canvas id="harvestChart" height="120"></canvas>

</div>

</div>

<!-- ========================================================= -->
<!-- LIVE WEATHER -->
<!-- ========================================================= -->

<div class="col-lg-4 mb-4">

<div class="glass-card weather-widget text-center">

<i class="fas fa-cloud-sun fa-4x text-warning mb-3"></i>

<h2>31°C</h2>

<h5>Petaling Jaya</h5>

<p>Partly Cloudy</p>

<hr>

<div class="row text-center">

<div class="col-4">

<i class="fas fa-droplet text-info"></i>

<p class="mt-2">75%</p>

<small>Humidity</small>

</div>

<div class="col-4">

<i class="fas fa-wind text-primary"></i>

<p class="mt-2">9 km/h</p>

<small>Wind</small>

</div>

<div class="col-4">

<i class="fas fa-cloud-rain text-secondary"></i>

<p class="mt-2">15%</p>

<small>Rain</small>

</div>

</div>

</div>

</div>

<!-- ========================================================= -->
<!-- TEMPERATURE CHART -->
<!-- ========================================================= -->

<div class="col-lg-6 mb-4">

<div class="glass-card">

<h5>

<i class="fas fa-temperature-high text-danger"></i>

Temperature Trend

</h5>

<canvas id="temperatureChart" height="120"></canvas>

</div>

</div>

<!-- ========================================================= -->
<!-- HUMIDITY CHART -->
<!-- ========================================================= -->

<div class="col-lg-6 mb-4">

<div class="glass-card">

<h5>

<i class="fas fa-droplet text-info"></i>

Humidity Trend

</h5>

<canvas id="humidityChart" height="120"></canvas>

</div>

</div>

<!-- ========================================================= -->
<!-- LIVE CAMERA -->
<!-- ========================================================= -->

<div class="col-lg-8 mb-4">

<div class="glass-card">

<div class="d-flex justify-content-between">

<h5>

<i class="fas fa-video text-danger"></i>

Live Farm Camera

</h5>

<span class="badge bg-danger">

LIVE

</span>

</div>

<div class="camera-box mt-3">

<img src="assets/images/farm-camera.jpg"
class="img-fluid rounded">

</div>

</div>

</div>

<!-- ========================================================= -->
<!-- DIGITAL CLOCK -->
<!-- ========================================================= -->

<div class="col-lg-4 mb-4">

<div class="glass-card text-center">

<h5>

Current Time

</h5>

<h1 id="digitalClock">

00:00:00

</h1>

<hr>

<h4 id="todayDate">

Loading...

</h4>

</div>

</div>

<!-- ========================================================= -->
<!-- HARVEST CALENDAR -->
<!-- ========================================================= -->

<div class="col-lg-6 mb-4">

<div class="glass-card">

<h5>

<i class="fas fa-calendar-days text-success"></i>

Upcoming Harvest

</h5>

<table class="table table-borderless table-hover mt-3">

<tr>

<td>05 Jul</td>

<td>Eggplant Harvest</td>

<td>

<span class="badge bg-success">

Ready

</span>

</td>

</tr>

<tr>

<td>08 Jul</td>

<td>Lettuce Harvest</td>

<td>

<span class="badge bg-warning">

Growing

</span>

</td>

</tr>

<tr>

<td>12 Jul</td>

<td>Chili Harvest</td>

<td>

<span class="badge bg-primary">

Scheduled

</span>

</td>

</tr>

<tr>

<td>15 Jul</td>

<td>Tomato Harvest</td>

<td>

<span class="badge bg-info">

Monitoring

</span>

</td>

</tr>

</table>

</div>

</div>

<!-- ========================================================= -->
<!-- ACTIVITY TIMELINE -->
<!-- ========================================================= -->

<div class="col-lg-6 mb-4">

<div class="glass-card">

<h5>

<i class="fas fa-clock-rotate-left"></i>

Recent Activity

</h5>

<div class="timeline mt-4">

<div class="timeline-item">

<i class="fas fa-check-circle text-success"></i>

<span>

Harvest completed successfully.

</span>

</div>

<hr>

<div class="timeline-item">

<i class="fas fa-bell text-warning"></i>

<span>

New booking received.

</span>

</div>

<hr>

<div class="timeline-item">

<i class="fas fa-seedling text-success"></i>

<span>

Soil moisture updated.

</span>

</div>

<hr>

<div class="timeline-item">

<i class="fas fa-cloud text-primary"></i>

<span>

Weather synchronized.

</span>

</div>

<hr>

<div class="timeline-item">

<i class="fas fa-user text-info"></i>

<span>

New customer registered.

</span>

</div>

</div>

</div>

</div>

<!-- ========================================================= -->
<!-- QUICK ACTION -->
<!-- ========================================================= -->

<div class="col-lg-12">

<div class="glass-card">

<div class="row text-center">

<div class="col">

<a href="booking.php" class="btn btn-success">

<i class="fas fa-calendar-plus"></i>

New Booking

</a>

</div>

<div class="col">

<a href="harvest.php" class="btn btn-primary">

<i class="fas fa-seedling"></i>

Harvest

</a>

</div>

<div class="col">

<a href="report.php" class="btn btn-warning">

<i class="fas fa-file-lines"></i>

Report

</a>

</div>

<div class="col">

<a href="camera.php" class="btn btn-danger">

<i class="fas fa-video"></i>

Camera

</a>

</div>

<div class="col">

<a href="setting.php" class="btn btn-dark">

<i class="fas fa-gear"></i>

Settings

</a>

</div>

</div>

</div>

</div>

<!-- ========================================================= -->
<!-- END ROW -->
<!-- ========================================================= -->

</div>

</div>

<!-- ========================================================= -->
<!-- CUSTOMER & BOOKING SECTION -->
<!-- ========================================================= -->

<div class="row mt-4">

<!-- CUSTOMER TABLE -->

<div class="col-lg-7 mb-4">

<div class="glass-card">

<div class="d-flex justify-content-between align-items-center mb-3">

<h5>

<i class="fas fa-users text-primary"></i>

Latest Customers

</h5>

<a href="customer.php" class="btn btn-success btn-sm">

View All

</a>

</div>

<div class="table-responsive">

<table class="table table-dark table-hover align-middle">

<thead>

<tr>

<th>ID</th>

<th>Name</th>

<th>Phone</th>

<th>Status</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<tr>

<td>#1001</td>

<td>Ahmad Ali</td>

<td>012-3456789</td>

<td>

<span class="badge bg-success">

Active

</span>

</td>

<td>

<button class="btn btn-primary btn-sm">

View

</button>

</td>

</tr>

<tr>

<td>#1002</td>

<td>Siti Nur</td>

<td>013-2233445</td>

<td>

<span class="badge bg-warning">

Pending

</span>

</td>

<td>

<button class="btn btn-primary btn-sm">

View

</button>

</td>

</tr>

<tr>

<td>#1003</td>

<td>Daniel</td>

<td>019-3344556</td>

<td>

<span class="badge bg-success">

Active

</span>

</td>

<td>

<button class="btn btn-primary btn-sm">

View

</button>

</td>

</tr>

<tr>

<td>#1004</td>

<td>Farah</td>

<td>011-7788990</td>

<td>

<span class="badge bg-danger">

Inactive

</span>

</td>

<td>

<button class="btn btn-primary btn-sm">

View

</button>

</td>

</tr>

</tbody>

</table>

</div>

</div>

</div>

<!-- BOOKING SUMMARY -->

<div class="col-lg-5 mb-4">

<div class="glass-card">

<h5>

<i class="fas fa-calendar-check text-success"></i>

Today's Booking

</h5>

<div class="booking-box">

<div class="booking-item">

<div>

<h6>Eggplant</h6>

<small>Customer Booking</small>

</div>

<span class="badge bg-success">

Completed

</span>

</div>

<hr>

<div class="booking-item">

<div>

<h6>Lettuce</h6>

<small>Customer Booking</small>

</div>

<span class="badge bg-warning">

Pending

</span>

</div>

<hr>

<div class="booking-item">

<div>

<h6>Chili</h6>

<small>Online Booking</small>

</div>

<span class="badge bg-primary">

Processing

</span>

</div>

<hr>

<div class="booking-item">

<div>

<h6>Tomato</h6>

<small>Walk-in</small>

</div>

<span class="badge bg-info">

Ready

</span>

</div>

</div>

</div>

</div>

<!-- ========================================================= -->
<!-- FEEDBACK -->
<!-- ========================================================= -->

<div class="col-lg-6 mb-4">

<div class="glass-card">

<h5>

<i class="fas fa-star text-warning"></i>

Latest Feedback

</h5>

<div class="feedback-item mt-4">

<img src="assets/images/user.png" class="avatar">

<div>

<h6>Nur Aisyah</h6>

★★★★★

<p>

Excellent quality vegetables.

</p>

</div>

</div>

<hr>

<div class="feedback-item">

<img src="assets/images/user.png" class="avatar">

<div>

<h6>Hakim</h6>

★★★★☆

<p>

Fast delivery and fresh harvest.

</p>

</div>

</div>

<hr>

<div class="feedback-item">

<img src="assets/images/user.png" class="avatar">

<div>

<h6>John</h6>

★★★★★

<p>

Highly recommended.

</p>

</div>

</div>

</div>

</div>

<!-- ========================================================= -->
<!-- REVENUE SUMMARY -->
<!-- ========================================================= -->

<div class="col-lg-6 mb-4">

<div class="glass-card">

<h5>

<i class="fas fa-money-bill-wave text-success"></i>

Revenue Summary

</h5>

<table class="table table-borderless mt-3">

<tr>

<td>Today</td>

<td class="text-end">

RM120

</td>

</tr>

<tr>

<td>This Week</td>

<td class="text-end">

RM640

</td>

</tr>

<tr>

<td>This Month</td>

<td class="text-end">

RM911

</td>

</tr>

<tr>

<td>Total Sales</td>

<td class="text-end text-success">

RM15,320

</td>

</tr>

</table>

<canvas id="revenuePie" height="180"></canvas>

</div>

</div>

<!-- ========================================================= -->
<!-- NOTIFICATION -->
<!-- ========================================================= -->

<div class="col-lg-12 mb-4">

<div class="glass-card">

<div class="d-flex justify-content-between">

<h5>

<i class="fas fa-bell text-warning"></i>

System Notifications

</h5>

<button class="btn btn-outline-warning btn-sm">

Mark All Read

</button>

</div>

<div class="notification-list mt-4">

<div class="alert alert-success">

New harvest successfully recorded.

</div>

<div class="alert alert-info">

Weather synchronized successfully.

</div>

<div class="alert alert-warning">

Soil moisture sensor requires inspection.

</div>

<div class="alert alert-danger">

Backup battery remaining 20%.

</div>

</div>

</div>

</div>

<!-- ========================================================= -->
<!-- DASHBOARD FOOTER -->
<!-- ========================================================= -->

<div class="col-lg-12">

<footer class="glass-card text-center">

<h5>

Smart Farming Development Centre

</h5>

<p>

TVETMARA Smart Agriculture Monitoring System

</p>

<hr>

<div class="row">

<div class="col">

<i class="fab fa-facebook fa-lg"></i>

</div>

<div class="col">

<i class="fab fa-instagram fa-lg"></i>

</div>

<div class="col">

<i class="fab fa-youtube fa-lg"></i>

</div>

<div class="col">

<i class="fab fa-whatsapp fa-lg"></i>

</div>

</div>

<p class="mt-3 mb-0">

© 2026 Smart Farming Development Centre

</p>

</footer>

</div>

<!-- CLOSE ROW -->
</div>

<!-- CLOSE CONTAINER -->
</div>

<!-- CLOSE MAIN -->
</div>

<!-- CLOSE WRAPPER -->

<!-- ========================================================= -->
<!-- JAVASCRIPT LIBRARIES -->
<!-- ========================================================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script src="assets/js/dashboard.js"></script>

<script>

AOS.init({
    duration:1000,
    once:true
});

</script>

<!-- ========================================================= -->
<!-- LIVE DIGITAL CLOCK -->
<!-- ========================================================= -->

<script>

function updateClock(){

const now = new Date();

document.getElementById("clock").innerHTML =
now.toLocaleTimeString();

const option = {

weekday:'long',

year:'numeric',

month:'long',

day:'numeric'

};

const today = document.getElementById("todayDate");

if(today){

today.innerHTML = now.toLocaleDateString('en-GB',option);

}

const clock2 = document.getElementById("digitalClock");

if(clock2){

clock2.innerHTML = now.toLocaleTimeString();

}

}

setInterval(updateClock,1000);

updateClock();

</script>

<!-- ========================================================= -->
<!-- SIDEBAR TOGGLE -->
<!-- ========================================================= -->

<script>

const menuBtn = document.getElementById("menuBtn");

if(menuBtn){

menuBtn.onclick=function(){

document.querySelector(".sidebar").classList.toggle("collapse");

document.querySelector(".main").classList.toggle("expand");

}

}

</script>

<!-- ========================================================= -->
<!-- PRELOADER -->
<!-- ========================================================= -->

<script>

window.addEventListener("load",function(){

setTimeout(function(){

document.getElementById("preloader").style.opacity="0";

setTimeout(function(){

document.getElementById("preloader").style.display="none";

},600);

},800);

});

</script>

<!-- ========================================================= -->
<!-- DARK MODE -->
<!-- ========================================================= -->

<script>

const darkBtn=document.querySelector(".fa-moon");

if(darkBtn){

darkBtn.onclick=function(){

document.body.classList.toggle("dark-mode");

}

}

</script>

<!-- ========================================================= -->
<!-- COUNTER ANIMATION -->
<!-- ========================================================= -->

<script>

const counters=document.querySelectorAll(".counter");

counters.forEach(counter=>{

counter.innerText='0';

const update=()=>{

const target=+counter.getAttribute('data-target');

const c=+counter.innerText;

const inc=target/80;

if(c<target){

counter.innerText=Math.ceil(c+inc);

setTimeout(update,25);

}else{

counter.innerText=target;

}

}

update();

});

</script>

<!-- ========================================================= -->
<!-- HARVEST CHART -->
<!-- ========================================================= -->

<script>

const harvest=document.getElementById("harvestChart");

if(harvest){

new Chart(harvest,{

type:'line',

data:{

labels:['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],

datasets:[{

label:'Harvest (KG)',

data:[35,45,55,70,62,88,116],

borderColor:'#00E676',

backgroundColor:'rgba(0,230,118,.20)',

fill:true,

tension:.4

}]

},

options:{

responsive:true,

plugins:{legend:{display:true}}

}

});

}

</script>

<!-- ========================================================= -->
<!-- TEMPERATURE CHART -->
<!-- ========================================================= -->

<script>

const temp=document.getElementById("temperatureChart");

if(temp){

new Chart(temp,{

type:'bar',

data:{

labels:['8AM','10AM','12PM','2PM','4PM','6PM'],

datasets:[{

label:'Temperature',

data:[26,27,29,31,30,28],

backgroundColor:'#ff5252'

}]

}

});

}

</script>

<!-- ========================================================= -->
<!-- HUMIDITY CHART -->
<!-- ========================================================= -->

<script>

const humidity=document.getElementById("humidityChart");

if(humidity){

new Chart(humidity,{

type:'line',

data:{

labels:['8AM','10AM','12PM','2PM','4PM','6PM'],

datasets:[{

label:'Humidity',

data:[81,79,77,74,76,78],

borderColor:'#29B6F6',

fill:false,

tension:.5

}]

}

});

}

</script>

<!-- ========================================================= -->
<!-- REVENUE PIE -->
<!-- ========================================================= -->

<script>

const revenue=document.getElementById("revenuePie");

if(revenue){

new Chart(revenue,{

type:'doughnut',

data:{

labels:['Eggplant','Lettuce','Tomato','Chili'],

datasets:[{

data:[35,25,20,20],

backgroundColor:[

'#00C853',

'#2979FF',

'#FF9100',

'#D500F9'

]

}]

}

});

}

</script>

<!-- ========================================================= -->
<!-- SENSOR SIMULATION -->
<!-- ========================================================= -->

<script>

setInterval(function(){

document.getElementById("temperatureValue").innerHTML=(28+Math.floor(Math.random()*4))+"°C";

document.getElementById("humidityValue").innerHTML=(70+Math.floor(Math.random()*15))+"%";

document.getElementById("soilValue").innerHTML=(55+Math.floor(Math.random()*20))+"%";

document.getElementById("lightValue").innerHTML=(700+Math.floor(Math.random()*300))+" Lux";

},5000);

</script>

<!-- ========================================================= -->
<!-- SWEETALERT DEMO -->
<!-- ========================================================= -->

<script>

function systemOnline(){

Swal.fire({

icon:'success',

title:'Smart Farming System',

text:'All IoT Devices Connected Successfully',

timer:2000,

showConfirmButton:false

});

}

setTimeout(systemOnline,1200);

</script>

<!-- ========================================================= -->
<!-- FOOTER -->
<!-- ========================================================= -->
   class="btn btn-danger"
   onclick="return confirm('Adakah anda pasti ingin log keluar?');">
   <i class="fas fa-sign-out-alt"></i>
   Logout
</a>
</body>

</html>