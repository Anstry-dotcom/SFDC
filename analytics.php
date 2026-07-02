<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

$username = $_SESSION['username'] ?? "Administrator";

// Total Harvest
$totalHarvest = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT IFNULL(SUM(weight),0) total FROM harvest")
)['total'];

// Total Revenue
$totalRevenue = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT IFNULL(SUM(amount),0) total FROM harvest")
)['total'];

// Total Booking
$totalBooking = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) total FROM bookings")
)['total'];

// Total Feedback
$totalFeedback = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) total FROM feedback")
)['total'];

// Harvest Chart
$months=[];
$weights=[];

$q = mysqli_query($conn, "
SELECT
MONTH(harvest_date) AS month_no,
DATE_FORMAT(MIN(harvest_date), '%b') AS month,
SUM(weight) AS total
FROM harvest
GROUP BY MONTH(harvest_date)
ORDER BY month_no
");

while($r=mysqli_fetch_assoc($q)){
    $months[]=$r['month'];
    $weights[]=$r['total'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Analytics | SFDC</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet"
href="assets/css/dashboard.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

<div class="wrapper">

<div class="sidebar">

<div class="logo-area">

<img src="assets/images/logo.png" width="70">

<h3>SFDC</h3>

<p>Smart Farming</p>

</div>

<hr>

<ul class="menu">

<li>
<a href="dashboard.php">
<i class="fas fa-gauge-high"></i>
Dashboard
</a>
</li>

<li>
<a href="booking.php">
<i class="fas fa-calendar-check"></i>
Booking
</a>
</li>

<li>
<a href="harvest.php">
<i class="fas fa-seedling"></i>
Harvest
</a>
</li>

<li>
<a href="customer.php">
<i class="fas fa-users"></i>
Customer
</a>
</li>

<li>
<a href="feedback.php">
<i class="fas fa-comments"></i>
Feedback
</a>
</li>

<li class="active">
<a href="analytics.php">
<i class="fas fa-chart-line"></i>
Analytics
</a>
</li>

<li>
<a href="logout.php">
<i class="fas fa-right-from-bracket"></i>
Logout
</a>
</li>

</ul>

</div>

<div class="main">

<nav class="topbar">

<h3>Analytics Dashboard</h3>

<div>

Welcome,

<strong><?php echo htmlspecialchars($username); ?></strong>

</div>

</nav>

<div class="container-fluid mt-4">

<div class="row">

<div class="col-md-3">

<div class="card text-bg-success mb-4">

<div class="card-body text-center">

<h6>Total Harvest</h6>

<h2><?php echo number_format($totalHarvest,2); ?> KG</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-bg-primary mb-4">

<div class="card-body text-center">

<h6>Total Revenue</h6>

<h2>RM <?php echo number_format($totalRevenue,2); ?></h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-bg-warning mb-4">

<div class="card-body text-center">

<h6>Total Bookings</h6>

<h2><?php echo $totalBooking; ?></h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-bg-danger mb-4">

<div class="card-body text-center">

<h6>Total Feedback</h6>

<h2><?php echo $totalFeedback; ?></h2>

</div>

</div>

</div>

</div>

<div class="card shadow">

<div class="card-header">

Harvest Analytics

</div>

<div class="card-body">

<canvas id="harvestChart" height="100"></canvas>

</div>

</div>

</div>

</div>

</div>

<script>

new Chart(document.getElementById("harvestChart"),{

type:'line',

data:{

labels:<?php echo json_encode($months); ?>,

datasets:[{

label:'Harvest (KG)',

data:<?php echo json_encode($weights); ?>,

borderColor:'#198754',

backgroundColor:'rgba(25,135,84,.2)',

fill:true,

tension:.4

}]

},

options:{

responsive:true,

plugins:{

legend:{

display:true

}

}

}

});

</script>

</body>
</html>