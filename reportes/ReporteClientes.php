<?php
require_once './fpdf183/fpdf.php';
require_once './modelos/ClienteModel.php';

$clienteModel = new ClienteModel();
$clientes = $clienteModel->listarClientes();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

// Título
$pdf->Cell(0, 10, 'Reporte de Clientes', 0, 1, 'C');
$pdf->Ln(5);

// Encabezado de tabla
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 8, 'ID', 1);
$pdf->Cell(40, 8, 'Nombre', 1);
$pdf->Cell(40, 8, 'Email', 1);
$pdf->Cell(25, 8, 'Teléfono', 1);
$pdf->Cell(30, 8, 'Estado', 1);
$pdf->Ln();

// Cuerpo de tabla
$pdf->SetFont('Arial', '', 10);
foreach ($clientes as $cliente) {
    $pdf->Cell(10, 8, $cliente->getIdCliente(), 1);
    $pdf->Cell(40, 8, utf8_decode($cliente->getNombre()), 1);
    $pdf->Cell(40, 8, utf8_decode($cliente->getEmail()), 1);
    $pdf->Cell(25, 8, $cliente->getTelefono(), 1);
    $pdf->Cell(30, 8, $cliente->getEstado(), 1);
    $pdf->Ln();
}

$pdf->Output();
