<?php
include('../includes/header.php');
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $password]);

    header('Location: login.php');
}
?>

<div class="container">
    <h2 class="mt-5">Register</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<?php
include('../includes/footer.php');
?>
