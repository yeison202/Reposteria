<?php
include('reporteGeneral.php');

$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Courier', 'BI', 15); 
$pdf->Cell(0, 10, 'PRODUCTOS EN STOCK', 0, 1, 'C'); // Espacio en blanco
$pdf->Cell(0, 2, '', 'B', 1, 'C');

$pdf->Ln(); // Avanza a la siguiente línea después del espacio en blanco

// Conecta a tu base de datos
$server = '127.0.0.1';
$user = 'root';
$pass = '';
$bd = 'inicio';

$mysqli = new mysqli($server, $user, $pass, $bd);

if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}

// Consulta los detalles de la base de datos
$query = "SELECT id, titulo, precio, descuento  FROM productos";
$result = $mysqli->query($query);

// Encabezados de la tabla
$pdf->SetFont('Courier', 'B', 12);
$pdf->SetFillColor(182, 149, 192);
$pdf->Cell(20, 10, 'CODIGO', 0, 0, 'C', 1);
$pdf->Cell(95, 10, 'TITULO', 0, 0, 'C', 1);
$pdf->Cell(30, 10, 'PRECIO', 0, 0, 'C', 1);
$pdf->Cell(25, 10, 'DESCUENTO', 0, 0, 'C', 1);
$pdf->Cell(20, 10, 'P.FINAL', 0, 0, 'C', 1);

$pdf->Ln();

$pdf->SetFont('Courier', '', 12);

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(20, 5, $row['id'], 0, 0, 'C');
    $pdf->Cell(95, 5, $row['titulo'], 0, 0, 'L');
    $pdf->Cell(30, 5, $row['precio'].'$', 0, 0, 'C');
    $pdf->Cell(25, 5, $row['descuento'].'%', 0, 0, 'C');
    if($row['descuento']>0){
        $descuentos = ($row['precio']*$row['descuento'])/100;
        $pdf->Cell(20, 5, $row['precio']-$descuentos.'$', 0, 1, 'C');

    }else{
        $pdf->Cell(20, 5, $row['precio'].'$', 0, 1, 'C');
    }


    $pdf->Ln();
}
// Linea
$pdf->Cell(0, 3, '', 'B', 1, 'C');

$pdf->Output();
?>
