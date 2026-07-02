<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

$username = $_SESSION['username'] ?? "Administrator";

$result = mysqli_query($conn, "SELECT * FROM weather ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Weather | SFDC</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet" href="assets/css/dashboard.css">

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

<li class="active">
<a href="weather.php">
<i class="fas fa-cloud-sun"></i> Weather
</a>
</li>

<li><a href="logout.php"><i class="fas fa-right-from-bracket"></i> Logout</a></li>

</ul>

</div>

<!-- Main -->

<div class="main">

<nav class="topbar">

<h3>Weather Monitoring</h3>

<div>

Welcome,

<strong><?php echo htmlspecialchars($username); ?></strong>

</div>

</nav>

<div class="container-fluid mt-4">

<div class="row">

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<div class="col-lg-4 mb-4">

<div class="card shadow text-center">

<div class="card-body">

<i class="fas fa-cloud-sun fa-4x text-warning mb-3"></i>

<h2>

<?php echo $row['temperature']; ?> °C

</h2>

<h5>

<?php echo htmlspecialchars($row['condition_name']); ?>

</h5>

<hr>

<p>

<i class="fas fa-droplet text-primary"></i>

Humidity :
<strong>

<?php echo $row['humidity']; ?> %

</strong>

</p>

<p>

<i class="fas fa-wind text-success"></i>

Wind :
<strong>

<?php echo $row['wind']; ?> km/h

</strong>

</p>

<p class="text-muted">

<?php echo $row['created_at']; ?>

</p>

</div>

</div>

</div>

<?php

}

}else{

?>

<div class="col-12">

<div class="alert alert-warning">

No weather data found.

</div>

</div>

<?php

}

?>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>