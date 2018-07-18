<?php
session_start();
require_once '../../model/fpdf/fpdf.php';
include_once '../../model/Cliente.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

$pdf->Cell(18, 10, '', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'REPORTE DE COCHES', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 8, 'ID', 0,0, 'C');
$pdf->Cell(30, 8, 'Id Categoría', 0,0, 'C');
$pdf->Cell(30, 8, 'Descripción', 0,0, 'C');
$pdf->Cell(30, 8, 'Fecha de Adquisición', 0,0, 'C');
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
if (isset($_SESSION['lista_coche'])) {
    $registro = unserialize($_SESSION['lista_coche']);
    foreach ($registro as $dato) {
        $pdf->Cell(15, 6, $dato->getId_coche(), 0,0, 'C');
        $pdf->Cell(30, 6, $dato->getId_tipo(), 0,0, 'C');
        $pdf->Cell(30, 6, $dato->getDescripcion_coche(), 0,0, 'C');
        $pdf->Cell(30, 6, $dato->getFecha_adquisicion(), 0,0, 'C');
        $pdf->Ln(5);
    }
    $pdf->Ln(10);
} else {
    
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(114, 8, '', 0);
$pdf->Output();
?>