<?php
define ('FPDF_FONTPATH', 'fpdf181/font/');
require ('fpdf181/fpdf.php');

class PDF extends FPDF{

// Page footer
    public function Footer(){
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'OBS.: Os campos em vazio não foram preenchidos. Página '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
?>