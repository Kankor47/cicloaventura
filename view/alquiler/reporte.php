<?php
session_start();
require_once '../../model/fpdf/fpdf.php';
include_once '../../model/AlquilerCompleto.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

$pdf->Cell(18, 10, '', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'REPORTE DE ALQUILER', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(10, 8, 'ID', 0,0, 'C');
$pdf->Cell(15, 8, 'Id Cliente', 0,0, 'C');
$pdf->Cell(25, 8, 'Cliene', 0,0, 'C');
$pdf->Cell(15, 8, 'Id Empleado', 0,0, 'C');
$pdf->Cell(25, 8, 'Empleado', 0,0, 'C');
$pdf->Cell(15, 8, 'Id Coche', 0,0, 'C');
$pdf->Cell(25, 8, 'Coche', 0,0, 'C');
$pdf->Cell(25, 8, 'Tiempo de Inicio', 0,0, 'C');
$pdf->Cell(25, 8, 'Tiempo de Fin', 0,0, 'C');
$pdf->Cell(25, 8, 'Valor', 0,0, 'C');
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
if (isset($_SESSION['lista_completo'])) {
    $registro = unserialize($_SESSION['lista_completo']);
    foreach ($registro as $dato) {
        $pdf->Cell(10, 6, $dato->getId_alqui(), 0, 0, 'C');
        $pdf->Cell(15, 6, $dato->getId_cli(), 0, 0, 'C');
        $pdf->Cell(25, 6, $dato->getNombre_cli(), 0, 0, 'C');
        $pdf->Cell(15, 6, $dato->getId_emp(), 0, 0, 'C');
        $pdf->Cell(25, 6, $dato->getNombre_emp(), 0, 0, 'C');
        $pdf->Cell(15, 6, $dato->getId_coche(), 0, 0, 'C');
        $pdf->Cell(25, 6, $dato->getDesc_coche(), 0, 0, 'C');
        $pdf->Cell(25, 6, $dato->getTiempo_ini(), 0, 0, 'C');
        $pdf->Cell(25, 6, $dato->getTiempo_fin(), 0, 0, 'C');
        $pdf->Cell(25, 6, $dato->getValor(), 0, 0, 'C');
        $pdf->Ln(5);
    }
    $pdf->Ln(10);
} else {
    
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(114, 8, '', 0);
$pdf->Output();
?>
