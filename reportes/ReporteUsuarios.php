<?php
require('../fpdf/fpdf.php');
require('../modelos/UsuarioModel.php');

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}

// Solo admin puede generar el reporte
if ($_SESSION['usuario']['rol'] !== 'Administrador') {
    echo "Acceso denegado.";
    exit;
}

$usuarioModel = new UsuarioModel();
$usuarios = $usuarioModel->obtenerTodos();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Reporte de Usuarios', 0, 1, 'C');
$pdf->Ln(5);

// Encabezados
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 10, 'ID', 1);
$pdf->Cell(30, 10, 'Usuario', 1);
$pdf->Cell(50, 10, 'Email', 1);
$pdf->Cell(30, 10, 'Nombre', 1);
$pdf->Cell(30, 10, 'Apellido', 1);
$pdf->Cell(30, 10, 'Rol', 1);
$pdf->Ln();

// Datos
$pdf->SetFont('Arial', '', 10);
foreach ($usuarios as $u) {
    $pdf->Cell(10, 10, $u->getIdUsuario(), 1);
    $pdf->Cell(30, 10, $u->getUsername(), 1);
    $pdf->Cell(50, 10, $u->getEmail(), 1);
    $pdf->Cell(30, 10, $u->getNombre(), 1);
    $pdf->Cell(30, 10, $u->getApellido(), 1);
    $pdf->Cell(30, 10, $u->getRol(), 1);
    $pdf->Ln();
}

$pdf->Output();
