

<?php
include('reporteGeneral.php');

$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Courier', 'BI', 15); 
$pdf->Cell(0, 10, 'TOTAL DE VENTAS', 0, 1, 'C'); // Espacio en blanco
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

// Consulta los detalles de venta desde la base de datos
$query = "SELECT Id_cliente, id, fecha, total FROM compra";
$result = $mysqli->query($query);

// Variables para el total general
$totalGeneral = 0;

// Encabezados de la tabla
$pdf->SetFont('Courier', 'B', 12);
$pdf->SetFillColor(173, 216, 230);
$pdf->Cell(30, 10, 'Codigo', 0, 0, 'C', 1);
$pdf->Cell(60, 10, 'Cliente', 0, 0, 'C', 1);
$pdf->Cell(70, 10, 'Fecha', 0, 0, 'C', 1);
$pdf->Cell(30, 10, 'Total', 0, 0, 'C', 1);
$pdf->Ln();

$pdf->SetFont('Courier', '', 12);

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(30, 5, $row['id'], 0, 0, 'C');
    $pdf->Cell(60, 5, $row['Id_cliente'], 0, 0, 'C');
    $pdf->Cell(70, 5, $row['fecha'], 0, 0, 'C');
    $pdf->Cell(30, 5, $row['total'].'$', 0, 1, 'C');
    $totalGeneral += $row['total']; // Suma al total general

    $pdf->Ln();
}

// Linea
$pdf->Cell(0, 3, '', 'B', 1, 'C');

// Total general
$pdf->SetFont('Courier', 'B', 12);
$pdf->Cell(170, 10, 'Total General:', 0, 0, 'R');
$pdf->Cell(20, 10, $totalGeneral.'$', 0, 1, 'C');


$pdf->Output();
?>
