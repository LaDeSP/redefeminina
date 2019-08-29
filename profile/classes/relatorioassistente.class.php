<?php
//define ('FPDF_FONTPATH', 'fpdf181/font/');
include_once 'autoload.php';
class RelatorioAssistente{
    private $objetos;

    public function __construct($objetos){
        $this->objetos = $objetos;
    }

    public function getObjetos(){
        return $this->objetos;
    }

    public function setObjetos($objetos){
        $this->objetos = $objetos;
    }

    public function gerarPDF(){
        $pdf = new FPDF('P', 'cm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);

        $pdf->Cell(10, 1, "Nome" , 1, 0, 'L');
        $pdf->Cell(5, 1, "CPF", 1, 0, 'L');
        $pdf->Cell(5, 1, "Sexo", 1, 1, 'L');
       /* foreach ($this->objetos as $paciente){
            $pdf->Cell(10, 1, $paciente->nome, 1, 0, 'L');
            $pdf->Cell(5, 1, $paciente->cpf, 1, 0, 'L');
            $pdf->Cell(5, 1, $paciente->sexo, 1, 1, 'L');
            echo $paciente->nome_paciente;
        }*/
        ob_clean();
        $pdf->Output();
    }

}