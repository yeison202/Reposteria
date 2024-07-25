<?php
require('fpdf/fpdf.php');

$pdf = new FPDF(); //'p','mm', array(90,180) // orientacion, unidad de medida y tamano personalizado de la pagina
$pdf->AddPage(); //'L','letter', 0 // orientacion, tipo a tamano, rotacion en multiplos de 90 grados
$pdf->SetFont('Arial', 'B', 18); //tip ofuente, efecto de texto, tamano de texto
$pdf->Image('logotipoabuelapng.png', 10, 10, 30, 0); // El último parámetro '0' significa que el alto se ajusta automáticamente al ancho
$pdf->Cell(0, 10, 'Reposteria "La Dona"', 0, 1, 'C'); //largo de la celda, ancho, texto, bordes, continuidad de linea, ubicacion
//Presentacion
$pdf->SetFont('Arial', '', 10); //tip ofuente, efecto de texto, tamano de texto
$pdf->Cell(0, 5, ' Carrera 18 con calles 37 y 38', 0, 1, 'C');
$pdf->Cell(0, 5, 'Barquisimeto 3001, Lara.', 0, 1, 'C');
$pdf->Cell(0, 5, 'Tlfn: +58-(412) 0292946', 0, 1, 'C');
$pdf->Cell(0, 5, '', 'B', 1, 'C');

// Datos de Factura
$pdf->SetFont('Arial', 'BI', 10);
$pdf->Cell(0, 2); // Espacio en blanco
$pdf->Ln(); // Avanza a la siguiente línea después del espacio en blanco

$pdf->Cell(15, 5, 'Cliente:', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(70, 5, 'xx nombre xx', 0, 0, 'L');

$pdf->SetFont('Arial', 'BI', 10);
$pdf->Cell(50, 5, 'Nro. de Orden:', 0, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(55, 5, 'xx nro xx', 0, 1, 'R');

$pdf->SetFont('Arial', 'BI', 10);
$pdf->Cell(135, 5, 'Fecha:', 0, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(55, 5, 'xx xx xxxx', 0, 1, 'R', '');

$pdf->Cell(0, 3, '', 'B', 1, 'C');

//Productos
$pdf->Cell(0, 3); // Espacio en blanco
$pdf->Ln();

$pdf->SetFillColor(173, 216, 230); // Establece el color de fondo en celeste (RGB: 173, 216, 230)
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(63, 5, 'CANT', 0, 0, 'C', 1);
$pdf->Cell(63, 5, 'DESCCIPCION:', 0, 0, 'C', 1);
$pdf->Cell(63, 5, 'PRECIO', 0, 1, 'C', 1);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(63, 5, 'xxXXXXxx', 0, 0, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(63, 5, 'xxXXXXXxx', 0, 0, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(63, 5, 'xxXXXXXxx', 0, 1, 'C');

$pdf->Output();
?>