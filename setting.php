<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

$username = $_SESSION['username'] ?? "Administrator";

// Simpan perubahan
if(isset($_POST['save'])){

    $system_name = clean($_POST['system_name']);
    $system_email = clean($_POST['system_email']);
    $phone = clean($_POST['phone']);
    $address = clean($_POST['address']);

    mysqli_query($conn,"
    UPDATE settings SET
    system_name='$system_name',
    system_email='$system_email',
    phone='$phone',
    address='$address'
    WHERE id=1
    ");

    $_SESSION['message']="Settings updated successfully.";
    header("Location: setting.php");
    exit();
}

$data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM settings WHERE id=1"));
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>System Settings | SFDC</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet" href="assets/css/dashboard.css">

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

<li><a href="dashboard.php"><i class="fas fa-gauge-high"></i> Dashboard</a></li>

<li><a href="booking.php"><i class="fas fa-calendar-check"></i> Booking</a></li>

<li><a href="harvest.php"><i class="fas fa-seedling"></i> Harvest</a></li>

<li><a href="customer.php"><i class="fas fa-users"></i> Customer</a></li>

<li><a href="feedback.php"><i class="fas fa-comments"></i> Feedback</a></li>

<li><a href="analytics.php"><i class="fas fa-chart-line"></i> Analytics</a></li>

<li><a href="weather.php"><i class="fas fa-cloud-sun"></i> Weather</a></li>

<li><a href="iot.php"><i class="fas fa-microchip"></i> IoT</a></li>

<li><a href="camera.php"><i class="fas fa-video"></i> Camera</a></li>

<li><a href="report.php"><i class="fas fa-file-lines"></i> Report</a></li>

<li class="active">
<a href="setting.php">
<i class="fas fa-gear"></i>
Settings
</a>
</li>

<li><a href="logout.php"><i class="fas fa-right-from-bracket"></i> Logout</a></li>

</ul>

</div>

<div class="main">

<nav class="topbar">

<h3>System Settings</h3>

<div>

Welcome,

<strong><?php echo htmlspecialchars($username); ?></strong>

</div>

</nav>

<div class="container-fluid mt-4">

<?php if(isset($_SESSION['message'])){ ?>

<div class="alert alert-success">

<?php
echo $_SESSION['message'];
unset($_SESSION['message']);
?>

</div>

<?php } ?>

<div class="card shadow">

<div class="card-header bg-success text-white">

<h4>

<i class="fas fa-gear"></i>

System Configuration

</h4>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>System Name</label>

<input
type="text"
name="system_name"
class="form-control"
value="<?php echo htmlspecialchars($data['system_name']); ?>"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="system_email"
class="form-control"
value="<?php echo htmlspecialchars($data['system_email']); ?>">

</div>

<div class="mb-3">

<label>Phone</label>

<input
type="text"
name="phone"
class="form-control"
value="<?php echo htmlspecialchars($data['phone']); ?>">

</div>

<div class="mb-3">

<label>Address</label>

<textarea
name="address"
class="form-control"
rows="4"><?php echo htmlspecialchars($data['address']); ?></textarea>

</div>

<button
type="submit"
name="save"
class="btn btn-success">

<i class="fas fa-save"></i>

Save Settings

</button>

</form>

</div>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>