<?php
include('../includes/header.php');
include('../includes/auth.php');
requireLogin();

include('../includes/db.php');

$userId = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM resumes WHERE user_id = ?");
$stmt->execute([$userId]);
$resumes = $stmt->fetchAll();
?>

<div class="container">
    <h2 class="mt-5">My Resumes</h2>
    <a href="build_resume.php" class="btn btn-success mb-3">Create New Resume</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Theme</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resumes as $resume): ?>
                <tr>
                    <td><?php echo $resume['title']; ?></td>
                    <td><?php echo $resume['theme']; ?></td>
                    <td><?php echo $resume['created_at']; ?></td>
                    <td><?php echo $resume['updated_at']; ?></td>
                    <td>
                        <a href="build_resume.php?resume_id=<?php echo $resume['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="download.php?resume_id=<?php echo $resume['id']; ?>" class="btn btn-secondary">Download PDF</a>
                        <a href="delete_resume.php?resume_id=<?php echo $resume['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include('../includes/footer.php');
?>
