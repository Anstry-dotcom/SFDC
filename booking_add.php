<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

if(isset($_POST['submit'])){

    $customer_name = mysqli_real_escape_string($conn,$_POST['customer_name']);
    $phone         = mysqli_real_escape_string($conn,$_POST['phone']);
    $crop          = mysqli_real_escape_string($conn,$_POST['crop']);
    $quantity      = (int)$_POST['quantity'];
    $booking_date  = $_POST['booking_date'];
    $status        = $_POST['status'];

    $sql = "INSERT INTO bookings
    (
        customer_name,
        phone,
        crop,
        quantity,
        booking_date,
        status
    )
    VALUES
    (
        '$customer_name',
        '$phone',
        '$crop',
        '$quantity',
        '$booking_date',
        '$status'
    )";

    if(mysqli_query($conn,$sql)){

        header("Location: booking.php");
        exit();

    }else{

        $error = "Failed to save booking.";

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Booking</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet"
href="assets/css/dashboard.css">

</head>

<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>

<i class="fas fa-calendar-plus"></i>

Add New Booking

</h3>

</div>

<div class="card-body">

<?php
if(isset($error)){
?>

<div class="alert alert-danger">

<?php echo $error; ?>

</div>

<?php
}
?>

<form method="POST">

<div class="mb-3">

<label class="form-label">

Customer Name

</label>

<input
type="text"
name="customer_name"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">

Phone Number

</label>

<input
type="text"
name="phone"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">

Crop

</label>

<select
name="crop"
class="form-select"
required>

<option value="">-- Select Crop --</option>

<option>Tomato</option>

<option>Chili</option>

<option>Lettuce</option>

<option>Eggplant</option>

<option>Cucumber</option>

<option>Corn</option>

</select>

</div>

<div class="mb-3">

<label class="form-label">

Quantity (KG)

</label>

<input
type="number"
name="quantity"
class="form-control"
min="1"
required>

</div>

<div class="mb-3">

<label class="form-label">

Booking Date

</label>

<input
type="date"
name="booking_date"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">

Status

</label>

<select
name="status"
class="form-select">

<option value="Pending">Pending</option>

<option value="Approved">Approved</option>

<option value="Completed">Completed</option>

<option value="Cancelled">Cancelled</option>

</select>

</div>

<div class="d-flex justify-content-between">

<a href="booking.php"
class="btn btn-secondary">

<i class="fas fa-arrow-left"></i>

Back

</a>

<button
type="submit"
name="submit"
class="btn btn-success">

<i class="fas fa-save"></i>

Save Booking

</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>