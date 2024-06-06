<?php
include('../includes/header.php');
include('../includes/auth.php');
requireLogin();

include('../includes/db.php');
$resumeId = $_GET['resume_id'] ?? null;
$userId = $_SESSION['user_id'];
$resume = null;

if ($resumeId) {
    $stmt = $pdo->prepare("SELECT * FROM resumes WHERE id = ? AND user_id = ?");
    $stmt->execute([$resumeId, $userId]);
    $resume = $stmt->fetch();
    if (!$resume) {
        die("Invalid resume ID");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $theme = $_POST['theme'];

    if ($resumeId) {
        $stmt = $pdo->prepare("UPDATE resumes SET title = ?, theme = ?, updated_at = NOW() WHERE id = ? AND user_id = ?");
        $stmt->execute([$title, $theme, $resumeId, $userId]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO resumes (user_id, title, theme) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $title, $theme]);
        $resumeId = $pdo->lastInsertId();
    }

    header("Location: dashboard.php");
}
?>

<div class="container">
    <h2 class="mt-5"><?php echo $resumeId ? 'Edit Resume' : 'Create Resume'; ?></h2>
    <form method="POST" action="">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo $resume['title'] ?? ''; ?>" required>
        </div>
        <div class="form-group">
            <label>Theme</label>
            <input type="text" name="theme" class="form-control" value="<?php echo $resume['theme'] ?? ''; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary"><?php echo $resumeId ? 'Update' : 'Create'; ?></button>
    </form>
</div>

<?php
include('../includes/footer.php');
?>
