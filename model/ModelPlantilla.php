<?php

include 'Plantilla.php';
require 'Database.php';

class ModelPlantilla {

    function imprmir()
    {
        $pdo = Database::connect();
        $sql = "select c.ced_cli,c.nom_cli,c.tel_cli,c.dic_cli,c.email_cli from tbl_cliente c";
        $resultado = $pdo->query($sql);

        $pdf = new Plantilla();
        $pdf->AliasPages();
        $pdf->AddPage();
        $pdf->SetFillColor();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 6, 'Cédula', 1, 0, 'C', 1);
        $pdf->Cell(50, 6, 'Nombres', 1, 0, 'C', 1);
        $pdf->Cell(70, 6, 'Teléfono', 1, 0, 'C', 1);
        $pdf->Cell(70, 6, 'Dirección', 1, 0, 'C', 1);
        $pdf->Cell(50, 6, 'E-Mail', 1, 1, 'C', 1);

        while ($row = $resultado->fetch_assoc()) {
            $pdf->Cell(50, 6, $row['ced_cli'], 1, 0, 'C', 1);
            $pdf->Cell(50, 6, $row['nom_cli'], 1, 0, 'C', 1);
            $pdf->Cell(70, 6, $row['tel_cli'], 1, 0, 'C', 1);
            $pdf->Cell(70, 6, $row['dic_cli'], 1, 0, 'C', 1);
            $pdf->Cell(50, 6, $row['email_cli'], 1, 1, 'C', 1);
        }
        $pdf->Output();
    }
}
