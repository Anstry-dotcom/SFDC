<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once "config/database.php";

if (isset($_POST['submit'])) {

    $name    = clean($_POST['name']);
    $email   = clean($_POST['email']);
    $message = clean($_POST['message']);

    $stmt = $conn->prepare("INSERT INTO feedback(name,email,message) VALUES(?,?,?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {

        $_SESSION['message'] = "Feedback added successfully.";
        $_SESSION['message_type'] = "success";

        header("Location: feedback.php");
        exit();

    } else {

        $error = "Failed to save feedback.";

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Add Feedback | SFDC</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet" href="assets/css/dashboard.css">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h4>
<i class="fas fa-star"></i>
Add Feedback
</h4>

</div>

<div class="card-body">

<?php if(isset($error)): ?>

<div class="alert alert-danger">
<?= $error; ?>
</div>

<?php endif; ?>

<form method="POST">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Feedback</label>
<textarea name="message" class="form-control" rows="5" required></textarea>
</div>

<button type="submit" name="submit" class="btn btn-success">
<i class="fas fa-save"></i>
Save Feedback
</button>

<a href="feedback.php" class="btn btn-secondary">
<i class="fas fa-arrow-left"></i>
Back
</a>

</form>

</div>

</div>

</div>

</body>
</html>