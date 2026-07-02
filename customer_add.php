<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

if(isset($_POST['save'])){

    $fullname = clean($_POST['fullname']);
    $username = clean($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = clean($_POST['email']);
    $phone = clean($_POST['phone']);
    $role = clean($_POST['role']);

    // Semak username
    $check = $conn->prepare("SELECT id FROM users WHERE username=?");
    $check->bind_param("s",$username);
    $check->execute();
    $check->store_result();

    if($check->num_rows>0){

        $error="Username sudah digunakan.";

    }else{

        $stmt=$conn->prepare("INSERT INTO users(fullname,username,password,email,phone,role,status)
        VALUES(?,?,?,?,?,?,'ACTIVE')");

        $stmt->bind_param(
            "ssssss",
            $fullname,
            $username,
            $password,
            $email,
            $phone,
            $role
        );

        if($stmt->execute()){

            $_SESSION['message']="Customer berjaya ditambah.";
            $_SESSION['message_type']="success";

            header("Location: customer.php");
            exit();

        }else{

            $error="Gagal menyimpan data.";

        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Add Customer | SFDC</title>

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

<i class="fas fa-user-plus"></i>

Add New Customer

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
required>

</div>

<div class="mb-3">

<label>Username</label>

<input
type="text"
name="username"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control">

</div>

<div class="mb-3">

<label>Phone</label>

<input
type="text"
name="phone"
class="form-control">

</div>

<div class="mb-3">

<label>Role</label>

<select
name="role"
class="form-select">

<option value="staff">Staff</option>
<option value="admin">Admin</option>

</select>

</div>

<button
type="submit"
name="save"
class="btn btn-success">

<i class="fas fa-save"></i>

Save Customer

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