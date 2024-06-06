<?php
require('fpdf/fpdf.php');
include('includes/db.php');

$resumeId = $_GET['resume_id'];

$stmt = $pdo->prepare("SELECT * FROM resumes WHERE id = ?");
$stmt->execute([$resumeId]);
$resume = $stmt->fetch();

if (!$resume) {
    die("Invalid resume ID");
}

// Create instance of the PDF class
$pdf = new FPDF();
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 16);

// Add title
$pdf->Cell(0, 10, $resume['title'], 0, 1, 'C');

// Add sections
$stmt = $pdo->prepare("SELECT * FROM resume_sections WHERE resume_id = ? ORDER BY `order`");
$stmt->execute([$resumeId]);
$sections = $stmt->fetchAll();

foreach ($sections as $section) {
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, $section['section_type'], 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $section['content'], 0, 1);
}

// Output PDF
$pdf->Output();
?>
