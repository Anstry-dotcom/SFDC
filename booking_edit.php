<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

if (!isset($_GET['id'])) {
    header("Location: booking.php");
    exit();
}

$id = (int)$_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM bookings WHERE id=$id");

if (mysqli_num_rows($result) == 0) {
    die("Booking not found.");
}

$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {

    $customer_name = mysqli_real_escape_string($conn,$_POST['customer_name']);
    $phone         = mysqli_real_escape_string($conn,$_POST['phone']);
    $crop          = mysqli_real_escape_string($conn,$_POST['crop']);
    $quantity      = (int)$_POST['quantity'];
    $booking_date  = $_POST['booking_date'];
    $status        = $_POST['status'];

    $sql = "UPDATE bookings SET

        customer_name='$customer_name',
        phone='$phone',
        crop='$crop',
        quantity='$quantity',
        booking_date='$booking_date',
        status='$status'

        WHERE id=$id";

    if(mysqli_query($conn,$sql)){

        header("Location: booking.php");
        exit();

    }else{

        $error="Failed to update booking.";

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Booking</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet"
href="assets/css/dashboard.css">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>

<i class="fas fa-edit"></i>

Edit Booking

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

<label class="form-label">

Customer Name

</label>

<input
type="text"
name="customer_name"
class="form-control"
value="<?php echo htmlspecialchars($row['customer_name']); ?>"
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
value="<?php echo htmlspecialchars($row['phone']); ?>"
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

<?php

$crops = [
"Tomato",
"Chili",
"Lettuce",
"Eggplant",
"Cucumber",
"Corn"
];

foreach($crops as $crop){

$selected = ($row['crop']==$crop) ? "selected" : "";

echo "<option value='$crop' $selected>$crop</option>";

}

?>

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
value="<?php echo $row['quantity']; ?>"
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
value="<?php echo $row['booking_date']; ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">

Status

</label>

<select
name="status"
class="form-select">

<?php

$statusList = [
"Pending",
"Approved",
"Completed",
"Cancelled"
];

foreach($statusList as $status){

$selected = ($row['status']==$status) ? "selected" : "";

echo "<option value='$status' $selected>$status</option>";

}

?>

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
name="update"
class="btn btn-primary">

<i class="fas fa-save"></i>

Update Booking

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