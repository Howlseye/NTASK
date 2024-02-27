<?php
require('fpdf/fpdf.php');

class PDF extends FPDF {
    function Header() {
        $this->Image('../assets/icons/logo-itam.png', 10, 4, 0, 20);
        $this->SetFont('Arial','B',20);
        $this->Cell(0,10,'                                                                     Detail Tugas',0,1,'C');
        $this->Ln(10);
        $this->Line(10, $this->GetY(), 200, $this->GetY());
        $this->Ln(10);
    }
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function ChapterTitle($title) {
        $this->Line(10, $this->GetY(), 200, $this->GetY());
        $this->Ln(5);
        $this->SetFont('Arial','B',15);
        $this->Cell(0,5,$title,0,0.1,'L');
        $this->Ln(5);
        $this->Line(10, $this->GetY(), 200, $this->GetY());
        $this->Ln(10);
    }
    function ChapterBody($text) {
        $this->SetFont('Arial','',13);
        $this->Cell(0,10,$text,0,0.1,'L');
        $this->Ln(5);
    }
}

// Get the query parameters from the URL
$tugas = $_GET['tugas'];
$deskripsi = $_GET['deskripsi'];
$deadline = $_GET['deadline'];
$dibuat = $_GET['dibuat'];
$prioritas = $_GET['prioritas'];
$status = $_GET['status'];

// Instantiation of FPDF class
$pdf = new PDF();

// Define alias for number of pages
$pdf->AliasNbPages();

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial','',12);

// Add chapter title
// $pdf->ChapterTitle('----------------------------------------------------------------------------------------------------------------------------');
// $pdf->ChapterTitle('Detail Tugas');

// Add chapter body

$pdf->ChapterBody('Nama Tugas       :       '.$tugas);
$pdf->ChapterBody('Deskripsi             :       '.$deskripsi);
$pdf->ChapterBody('Prioritas               :       '.$prioritas);
if($status == 'Selesai') {
    $pdf->SetTextColor(51, 204, 51);
} else if($status == 'Belum Selesai'){
    $pdf->SetTextColor(230, 0, 0);
}
$pdf->ChapterBody('Status                  :       '.$status);
$pdf->SetTextColor(0, 0, 0);
$pdf->Ln(10);

// $pdf->ChapterTitle('----------------------------------------------------------------------------------------------------------------------------');
$pdf->ChapterTitle('Rincian Tugas');
// $pdf->ChapterTitle('----------------------------------------------------------------------------------------------------------------------------');

$pdf->ChapterBody('Tanggal Pembuatan        :       '.$dibuat);
$pdf->SetTextColor(230, 0, 0);
$pdf->ChapterBody('Tenggat Waktu                :       '.$deadline);

// Output the document
$pdf->Output();
?>