<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

$username = $_SESSION['username'] ?? "Administrator";

$result = mysqli_query($conn, "SELECT * FROM sensors ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>IoT Sensor | SFDC</title>

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

<li class="active">
<a href="iot.php">
<i class="fas fa-microchip"></i> IoT Sensor
</a>
</li>

<li><a href="logout.php"><i class="fas fa-right-from-bracket"></i> Logout</a></li>

</ul>

</div>

<!-- Main -->

<div class="main">

<nav class="topbar">

<h3>IoT Sensor Monitoring</h3>

<div>

Welcome,

<strong><?php echo htmlspecialchars($username); ?></strong>

</div>

</nav>

<div class="container-fluid mt-4">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h4>

<i class="fas fa-microchip"></i>

IoT Sensor Data

</h4>

</div>

<div class="card-body">

<div class="table-responsive">

<table class="table table-bordered table-hover align-middle">

<thead class="table-success">

<tr>

<th>ID</th>

<th>Temperature (°C)</th>

<th>Humidity (%)</th>

<th>Soil Moisture (%)</th>

<th>Water Level (%)</th>

<th>Light Level</th>

<th>Date & Time</th>

</tr>

</thead>

<tbody>

<?php
if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>
<span class="badge bg-danger">
<?php echo $row['temperature']; ?> °C
</span>
</td>

<td>
<span class="badge bg-primary">
<?php echo $row['humidity']; ?> %
</span>
</td>

<td>
<span class="badge bg-success">
<?php echo $row['soil']; ?> %
</span>
</td>

<td>
<span class="badge bg-info">
<?php echo $row['water']; ?> %
</span>
</td>

<td>
<span class="badge bg-warning text-dark">
<?php echo $row['light_level']; ?>
</span>
</td>

<td><?php echo $row['created_at']; ?></td>

</tr>

<?php
}

}else{
?>

<tr>

<td colspan="7" class="text-center">

No sensor data available.

</td>

</tr>

<?php
}
?>

</tbody>

</table>

</div>

</div>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>