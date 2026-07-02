<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

if (!isset($_GET['id'])) {
    header("Location: harvest.php");
    exit();
}

$id = (int)$_GET['id'];

$stmt = $conn->prepare("SELECT * FROM harvest WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Harvest record not found.");
}

$row = $result->fetch_assoc();

if (isset($_POST['update'])) {

    $customer_name = clean($_POST['customer_name']);
    $phone         = clean($_POST['phone']);
    $weight        = (float)$_POST['weight'];
    $price         = (float)$_POST['price_per_kg'];
    $status        = clean($_POST['status']);
    $harvest_date  = $_POST['harvest_date'];

    $amount = $weight * $price;

    $update = $conn->prepare("
        UPDATE harvest SET
        customer_name=?,
        phone=?,
        weight=?,
        price_per_kg=?,
        amount=?,
        status=?,
        harvest_date=?
        WHERE id=?
    ");

    $update->bind_param(
        "ssdddssi",
        $customer_name,
        $phone,
        $weight,
        $price,
        $amount,
        $status,
        $harvest_date,
        $id
    );

    if ($update->execute()) {

        $_SESSION['message'] = "Harvest updated successfully.";
        $_SESSION['message_type'] = "success";

        header("Location: harvest.php");
        exit();

    } else {

        $error = "Update failed.";

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Edit Harvest | SFDC</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet"
href="assets/css/dashboard.css">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>

<i class="fas fa-edit"></i>

Edit Harvest

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
value="<?php echo htmlspecialchars($row['customer_name']); ?>"
required>

</div>

<div class="mb-3">

<label>Phone Number</label>

<input
type="text"
name="phone"
class="form-control"
value="<?php echo htmlspecialchars($row['phone']); ?>"
required>

</div>

<div class="mb-3">

<label>Weight (KG)</label>

<input
type="number"
step="0.01"
name="weight"
class="form-control"
value="<?php echo $row['weight']; ?>"
required>

</div>

<div class="mb-3">

<label>Price Per KG (RM)</label>

<input
type="number"
step="0.01"
name="price_per_kg"
class="form-control"
value="<?php echo $row['price_per_kg']; ?>"
required>

</div>

<div class="mb-3">

<label>Harvest Date</label>

<input
type="date"
name="harvest_date"
class="form-control"
value="<?php echo $row['harvest_date']; ?>"
required>

</div>

<div class="mb-3">

<label>Status</label>

<select
name="status"
class="form-select">

<option value="BOOKING" <?php if($row['status']=="BOOKING") echo "selected"; ?>>
BOOKING
</option>

<option value="PAID" <?php if($row['status']=="PAID") echo "selected"; ?>>
PAID
</option>

</select>

</div>

<button
type="submit"
name="update"
class="btn btn-primary">

<i class="fas fa-save"></i>

Update Harvest

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