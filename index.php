<?php
require('fpdf186/fpdf.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];

    generateCertificate($name);

}

function generateCertificate($name)
{
    $backgroundImage = 'certificate.jpg';
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->Image($backgroundImage, 30, 0, 150, 170);

    $pdf->SetFont('Arial', 'I', 30);

    // Output dynamic name
    $pdf->SetXY(10, 70);
    $pdf->Cell(0, 10, $name, 0, 0, 'C');

    // Output PDF
    $saveNameAs = str_replace(' ', '_', $name);
    $pdfFileName = 'certificate_' . $saveNameAs . '.pdf';
    $pdf->Output($pdfFileName, 'I');


}

?>