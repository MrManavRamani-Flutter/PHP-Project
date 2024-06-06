<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Builder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Resume Builder</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['user_id'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="users/dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users/logout.php">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="users/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users/register.php">Register</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
