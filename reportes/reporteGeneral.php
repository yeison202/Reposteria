<?php 
require('fpdf/fpdf.php');

class PDF extends FPDF{

    function Header(){
        $this->AddLink();
        $this->Image('logotipoabuelapng.png', 15, 5, 30, 0, '','http://localhost/proyecto2.1/pagina_inicion.php');
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(80);
        $this->Cell(30, 10, 'Reposteria "La Dona"', 0,1,'C');
        $this->SetFont('Arial', '',10); //tip ofuente, efecto de texto, tamano de texto
        $this->Cell (0, 5, ' Carrera 18 con calles 37 y 38', 0, 1,'C');
        $this->Cell (0, 5, 'Barquisimeto 3001, Lara.', 0, 1,'C'); 
        $this->Cell (0, 5, 'Tlfn: +58-(412) 0292946', 0, 1,'C'); 
        $this->Cell (0, 5, '', 'B', 1,'C');
        $this->ln(3);

    }

    function Footer(){
        $this->SetY(-18);
        $this->SetFont('Arial', 'I', 10);
        $this->Cell (0, 10, 'pagina'.$this->PageNo().' de {nb}', 0, 0,'C'); 

    }
}

?>