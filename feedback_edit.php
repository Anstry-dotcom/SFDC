<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

if (!isset($_GET['id'])) {
    header("Location: feedback.php");
    exit();
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM feedback WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Feedback not found.");
}

$row = $result->fetch_assoc();

if (isset($_POST['update'])) {

    $name    = clean($_POST['name']);
    $email   = clean($_POST['email']);
    $message = clean($_POST['message']);

    $update = $conn->prepare("
        UPDATE feedback
        SET name=?,
            email=?,
            message=?
        WHERE id=?
    ");

    $update->bind_param(
        "sssi",
        $name,
        $email,
        $message,
        $id
    );

    if ($update->execute()) {

        $_SESSION['message'] = "Feedback updated successfully.";
        $_SESSION['message_type'] = "success";

        header("Location: feedback.php");
        exit();

    } else {

        $error = "Failed to update feedback.";

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Edit Feedback | SFDC</title>

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

<h4>

<i class="fas fa-edit"></i>

Edit Feedback

</h4>

</div>

<div class="card-body">

<?php if(isset($error)){ ?>

<div class="alert alert-danger">

<?php echo $error; ?>

</div>

<?php } ?>

<form method="POST">

<div class="mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
value="<?php echo htmlspecialchars($row['name']); ?>"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="<?php echo htmlspecialchars($row['email']); ?>"
required>

</div>

<div class="mb-3">

<label>Feedback</label>

<textarea
name="message"
class="form-control"
rows="5"
required><?php echo htmlspecialchars($row['message']); ?></textarea>

</div>

<button
type="submit"
name="update"
class="btn btn-primary">

<i class="fas fa-save"></i>

Update Feedback

</button>

<a href="feedback.php" class="btn btn-secondary">

<i class="fas fa-arrow-left"></i>

Back

</a>

</form>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>