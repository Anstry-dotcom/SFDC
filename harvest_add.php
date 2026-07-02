<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

if (isset($_POST['save'])) {

    $customer_name = clean($_POST['customer_name']);
    $phone         = clean($_POST['phone']);
    $weight        = (float)$_POST['weight'];
    $price         = (float)$_POST['price_per_kg'];
    $status        = clean($_POST['status']);
    $harvest_date  = $_POST['harvest_date'];

    $amount = $weight * $price;

    $stmt = $conn->prepare("
        INSERT INTO harvest
        (customer_name, phone, weight, price_per_kg, amount, status, harvest_date)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "ssdddss",
        $customer_name,
        $phone,
        $weight,
        $price,
        $amount,
        $status,
        $harvest_date
    );

    if ($stmt->execute()) {

        $_SESSION['message'] = "Harvest successfully added.";
        $_SESSION['message_type'] = "success";

        header("Location: harvest.php");
        exit();

    } else {

        $error = "Failed to save harvest.";

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Add Harvest | SFDC</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet"
href="assets/css/dashboard.css">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>

<i class="fas fa-seedling"></i>

Add Harvest

</h3>

</div>

<div class="card-body">

<?php if(isset($error)){ ?>

<div class="alert alert-danger">

<?php echo $error; ?>

</div>

<?php } ?>

<form method="POST">

<div class="mb-3">

<label>Customer Name</label>

<input
type="text"
name="customer_name"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Phone Number</label>

<input
type="text"
name="phone"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Harvest Weight (KG)</label>

<input
type="number"
step="0.01"
name="weight"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Price Per KG (RM)</label>

<input
type="number"
step="0.01"
name="price_per_kg"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Harvest Date</label>

<input
type="date"
name="harvest_date"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Status</label>

<select
name="status"
class="form-select">

<option value="BOOKING">BOOKING</option>

<option value="PAID">PAID</option>

</select>

</div>

<button
type="submit"
name="save"
class="btn btn-success">

<i class="fas fa-save"></i>

Save Harvest

</button>

<a href="harvest.php" class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>