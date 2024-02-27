<?php 

require('fpdf/fpdf.php'); 

class PDF extends FPDF {

    // Page header 
    function Header() {
        // Add logo to page 
        // $this->Image('gfg1.png',10,8,33); 

        // Set font family to Arial bold  
        $this->SetFont('Arial','B',20); 

        // Get the data from the query string
        $tugas = $_GET['tugas'];
        $deskripsi = $_GET['deskripsi'];
        $deadline = $_GET['deadline'];
        $prioritas = $_GET['prioritas'];
        $status = $_GET['status'];

        // Move to the right 
        $this->Cell(80); 

        // Header 
        $this->Cell(50,10,'Detail Tugas'); 
        // $this->Ln();
        // $this->Cell(50,10,'Description: ' . $deskripsi,1,0,'C'); 
        // $this->Ln();
        // $this->Cell(50,10,'Deadline: ' . $deadline,1,0,'C'); 
        // $this->Ln();
        // $this->Cell(50,10,'Priority: ' . $prioritas,1,0,'C'); 
        // $this->Ln();
        // $this->Cell(50,10,'Status: ' . $status,1,0,'C'); 
        $this->Ln(20); 
    } 

    // Page footer 
    function Footer() { 
        // Position at 1.5 cm from bottom 
        $this->SetY(-15); 

        // Arial italic 8 
        $this->SetFont('Arial','I',8); 

        // Page number 
        // $this->Cell(0,10,'Page ' . 
        //     $this->PageNo() . '/{nb}',0,0,'C'); 
    } 
} 

$tugas = $_GET['tugas'];
$deskripsi = $_GET['deskripsi'];
$deadline = $_GET['deadline'];
$prioritas = $_GET['prioritas'];
$status = $_GET['status'];

// Instantiation of FPDF class 
$pdf = new PDF(); 

// Define alias for number of pages 
$pdf->AliasNbPages(); 
$pdf->AddPage(); 
$pdf->SetFont('Times','',14); 

// Add the task details
$pdf->Cell(0, 10, 'Tugas: ' . $tugas, 0, 1); 
$pdf->Cell(0, 10, 'Deskripsi: ' . $deskripsi, 0, 1); 
$pdf->Cell(0, 10, 'Deadline: ' . $deadline, 0, 1); 
$pdf->Cell(0, 10, 'Prioritas: ' . $prioritas, 0, 1); 
$pdf->Cell(0, 10, 'Status: ' . $status, 0, 1); 

$pdf->Output(); 

?>

?>
