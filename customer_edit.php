<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

if (!isset($_GET['id'])) {
    header("Location: customer.php");
    exit();
}

$id = (int)$_GET['id'];

$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Customer not found.");
}

$row = $result->fetch_assoc();

if (isset($_POST['update'])) {

    $fullname = clean($_POST['fullname']);
    $username = clean($_POST['username']);
    $email    = clean($_POST['email']);
    $phone    = clean($_POST['phone']);
    $role     = clean($_POST['role']);
    $status   = clean($_POST['status']);

    if (!empty($_POST['password'])) {

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $update = $conn->prepare("
            UPDATE users
            SET fullname=?,
                username=?,
                password=?,
                email=?,
                phone=?,
                role=?,
                status=?
            WHERE id=?
        ");

        $update->bind_param(
            "sssssssi",
            $fullname,
            $username,
            $password,
            $email,
            $phone,
            $role,
            $status,
            $id
        );

    } else {

        $update = $conn->prepare("
            UPDATE users
            SET fullname=?,
                username=?,
                email=?,
                phone=?,
                role=?,
                status=?
            WHERE id=?
        ");

        $update->bind_param(
            "ssssssi",
            $fullname,
            $username,
            $email,
            $phone,
            $role,
            $status,
            $id
        );
    }

    if ($update->execute()) {

        $_SESSION['message'] = "Customer berjaya dikemaskini.";
        $_SESSION['message_type'] = "success";

        header("Location: customer.php");
        exit();

    } else {

        $error = "Update gagal.";

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Edit Customer | SFDC</title>

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

<i class="fas fa-user-edit"></i>

Edit Customer

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

<label>Full Name</label>

<input
type="text"
name="fullname"
class="form-control"
value="<?php echo htmlspecialchars($row['fullname']); ?>"
required>

</div>

<div class="mb-3">

<label>Username</label>

<input
type="text"
name="username"
class="form-control"
value="<?php echo htmlspecialchars($row['username']); ?>"
required>

</div>

<div class="mb-3">

<label>New Password</label>

<input
type="password"
name="password"
class="form-control">

<small class="text-muted">
Kosongkan jika tidak mahu tukar password.
</small>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="<?php echo htmlspecialchars($row['email']); ?>">

</div>

<div class="mb-3">

<label>Phone</label>

<input
type="text"
name="phone"
class="form-control"
value="<?php echo htmlspecialchars($row['phone']); ?>">

</div>

<div class="mb-3">

<label>Role</label>

<select name="role" class="form-select">

<option value="admin"
<?php if($row['role']=="admin") echo "selected"; ?>>
Admin
</option>

<option value="staff"
<?php if($row['role']=="staff") echo "selected"; ?>>
Staff
</option>

</select>

</div>

<div class="mb-3">

<label>Status</label>

<select name="status" class="form-select">

<option value="ACTIVE"
<?php if($row['status']=="ACTIVE") echo "selected"; ?>>
ACTIVE
</option>

<option value="INACTIVE"
<?php if($row['status']=="INACTIVE") echo "selected"; ?>>
INACTIVE
</option>

</select>

</div>

<button
type="submit"
name="update"
class="btn btn-primary">

<i class="fas fa-save"></i>

Update Customer

</button>

<a href="customer.php"
class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>