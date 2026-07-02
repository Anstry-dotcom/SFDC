<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

$sql = "SELECT * FROM harvest";

if(isset($_GET['search']) && $_GET['search']!=""){

    $search = clean($_GET['search']);

    $sql .= " WHERE customer_name LIKE '%$search%'";

}

$sql .= " ORDER BY id DESC";

$result = mysqli_query($conn,$sql);

$username = $_SESSION['username'] ?? "Administrator";

$totalHarvest = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Harvest Management | SFDC</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet"
href="assets/css/dashboard.css">

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

<li class="active">

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

<a href="logout.php">

<i class="fas fa-right-from-bracket"></i>

Logout

</a>

</li>

</ul>

</div>

<div class="main">

<nav class="topbar">

<h3>Harvest Management</h3>

<div>

Welcome,

<strong><?php echo htmlspecialchars($username); ?></strong>

</div>

</nav>

<div class="container-fluid mt-4">

<?php if(isset($_SESSION['message'])){ ?>

<div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show">

<?php
echo $_SESSION['message'];
unset($_SESSION['message']);
unset($_SESSION['message_type']);
?>

<button class="btn-close" data-bs-dismiss="alert"></button>

</div>

<?php } ?>

<div class="alert alert-success">

<strong>Total Harvest Record :</strong>

<?php echo $totalHarvest; ?>

</div>

<form method="GET" class="mb-3">

<div class="input-group">

<input
type="text"
name="search"
class="form-control"
placeholder="Search customer...">

<button class="btn btn-success">

<i class="fas fa-search"></i>

Search

</button>

</div>

</form>

<div class="d-flex justify-content-between mb-3">

<h2>

<i class="fas fa-seedling text-success"></i>

Harvest List

</h2>

<a href="harvest_add.php" class="btn btn-success">

<i class="fas fa-plus"></i>

New Harvest

</a>

</div>

<div class="card shadow">

<div class="card-body">

<div class="table-responsive">

<table class="table table-bordered table-hover">

<thead class="table-success">

<tr>

<th>ID</th>

<th>Customer</th>

<th>Phone</th>

<th>Weight</th>

<th>Price/KG</th>

<th>Total</th>

<th>Status</th>

<th>Date</th>

<th width="180">Action</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo htmlspecialchars($row['customer_name']); ?></td>

<td><?php echo htmlspecialchars($row['phone']); ?></td>

<td><?php echo $row['weight']; ?> KG</td>

<td>RM <?php echo number_format($row['price_per_kg'],2); ?></td>

<td>RM <?php echo number_format($row['amount'],2); ?></td>

<td>

<?php

$badge="secondary";

if($row['status']=="BOOKING") $badge="warning";

if($row['status']=="PAID") $badge="success";

?>

<span class="badge bg-<?php echo $badge; ?>">

<?php echo $row['status']; ?>

</span>

</td>

<td><?php echo $row['harvest_date']; ?></td>

<td>

<a href="harvest_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">

<i class="fas fa-edit"></i>

</a>

<a href="harvest_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"

onclick="return confirm('Delete this harvest record?')">

<i class="fas fa-trash"></i>

</a>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="9" class="text-center">

No harvest record found.

</td>

</tr>

<?php } ?>

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