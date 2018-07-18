<?php
session_start();
require_once '../../model/fpdf/fpdf.php';
include_once '../../model/Mantenimiento.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

$pdf->Cell(18, 10, '', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'REPORTE DE MANTENIMIENTO', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 8, 'ID', 0,0, 'C');
$pdf->Cell(30, 8, 'Id Coche', 0,0, 'C');
$pdf->Cell(30, 8, 'Id Tipo', 0,0, 'C');
$pdf->Cell(30, 8, 'Daño', 0,0, 'C');
$pdf->Cell(30, 8, 'Estado', 0,0, 'C');
$pdf->Cell(30, 8, 'Fecha de Ingreso', 0,0, 'C');
$pdf->Cell(30, 8, 'Fecha de Salida', 0,0, 'C');
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
if (isset($_SESSION['lista_mantenimiento'])) {
    $registro = unserialize($_SESSION['lista_mantenimiento']);
    foreach ($registro as $dato) {
        $pdf->Cell(15, 6, $dato->getId(), 0,0, 'C');
        $pdf->Cell(30, 6, $dato->getId_coche(), 0,0, 'C');
        $pdf->Cell(30, 6, $dato->getId_tipo(), 0,0, 'C');
        $pdf->Cell(30, 6, $dato->getDano(), 0,0, 'C');
        $pdf->Cell(30, 6, $dato->getEstado(), 0,0, 'C');
        $pdf->Cell(30, 6, $dato->getIngreso(), 0,0, 'C');
        $pdf->Cell(30, 6, $dato->getSalida(), 0,0, 'C');
        $pdf->Ln(5);
    }
    $pdf->Ln(10);
} else {
    
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(114, 8, '', 0);
$pdf->Output();
?>
