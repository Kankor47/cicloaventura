<?php
session_start();
require_once '../../model/fpdf/fpdf.php';
include_once '../../model/Empleado.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

$pdf->Cell(18, 10, '', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'REPORTE DE EMPLEADOS', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 8, 'ID', 0,0, 'C');
$pdf->Cell(30, 8, 'Cédula', 0,0, 'C');
$pdf->Cell(30, 8, 'Nombre', 0,0, 'C');
$pdf->Cell(30, 8, 'Dirección', 0,0, 'C');
$pdf->Cell(30, 8, 'Teléfono', 0,0, 'C');
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
if (isset($_SESSION['lista_empleado'])) {
    $registro = unserialize($_SESSION['lista_empleado']);
    foreach ($registro as $dato) {
        $pdf->Cell(15, 6, $dato->getId(), 0,0, 'C');
        $pdf->Cell(30, 6, $dato->getCedula(), 0,0, 'C');
        $pdf->Cell(30, 6, $dato->getNombres(), 0,0, 'C');
        $pdf->Cell(30, 6, $dato->getDireccion(), 0,0, 'C');
        $pdf->Cell(30, 6, $dato->getTelefono(), 0,0, 'C');
        $pdf->Ln(5);
    }
    $pdf->Ln(10);
} else {
    
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(114, 8, '', 0);
$pdf->Output();
?>
